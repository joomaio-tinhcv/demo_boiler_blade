<?php
/**
 * SPT software - Application
 * 
 * @project: https://github.com/smpleader/spt
 * @author: Pham Minh - smpleader
 * @description: Just a basic Application implement mvc
 * 
 */

namespace App\libraries; 

use SPT\App\Instance as AppIns;
use SPT\Extend\Pdo as PdoWrapper;
use SPT\Query;
use SPT\Support\Loader;
use SPT\Support\FncArray;
use SPT\Storage\File\IniType;
use SPT\App\JDIContainer\CMSApp; 
use SPT\User\Instance as UserIns;
use SPT\User\SPT\User;
use SPT\User\SPT\UserEntity; 
use SPT\File;
use SPT\Support\Env;
use SPT\Middleware\Dispatcher as MW;
use SPT\Support\Token;

class appPlg extends CMSApp
{
    public function getController($name)
    {
        $name = explode('-', $name);
        $name[count($name)-1] = ucfirst($name[count($name)-1]);
        $name = implode('\\', $name);
        $controllerName = '\\'. $this->getName('plugins\\'. $this->get('plugin'). '\controllers\\'.$name.'Controller');
        return new $controllerName($this->getContainer());
    }

    public function getName(string $extra='')
    {
        return 'App\\'. $extra;
    }

    public function redirect($url = null, $msg = null)
    {
        if( !empty($msg) )
        {
            $this->session->set('flashMsg', $msg);
        }

        parent::redirect($url);
    }

    public function prepareUser()
    {
        $user = new UserIns( new User());
        $user->init([
            'session' => $this->session,
            'entity' => new UserEntity($this->query)
        ]);
        $this->getContainer()->share('user', $user, true);
    } 

    protected function routing()
    {
        list($todo, $params) = $this->router->parse($this->config, $this->request);

        if(count($params))
        {
            foreach($params as $key => $value)
            {
                $this->set($key, $value);
            }
        }

        if  (is_array($params['middleware']['permission']))
        {
            $permissionList = array_keys($params['middleware']['permission']);
            $permissionParams = $params['middleware']['permission'];
        }
        else
        {
            $permissionList = [];
            $permissionParams = [];
        }

        $try = MW::fire('permission', $permissionList, $permissionParams);

        if (false === $try)
        {
            throw new \Exception('You are not allowed.', 403);
        }

        $try = explode('.', $todo);
        
        if(count($try) == 3)
        {
            return $try;
        }
        else
        {
            throw new \Exception('Not a controller', 500);
        }   
    }

    protected function processRequest()
    {
        try{

            // TODO1: check token security timeout  
            list($plugin, $controllerName, $func) = $this->routing(); 
            $this->set('plugin', strtolower($plugin));

            $middleware = $this->get('middleware', []);
            if  (is_array($middleware['validation']))
            {
                $mwList = array_keys($middleware['validation']);
                $mwParams = $middleware['validation'];
            }
            else
            {
                $mwList = [];
                $mwParams = [];
            }
    
            $try = MW::fire('validation', $mwList, $mwParams);
    
            if (false === $try)
            {
                throw new \Exception('Invalid Request.', 401);
            }

            // create language
            $this->prepareLanguage();

            $controller = $this->getController($controllerName);

            $controller->$func();

            switch($this->get('format', ''))
            {
                case 'html': $controller->toHtml(); break;
                case 'ajax': $controller->toAjax(); break;
                case 'json': $controller->toJson(); break;
            }

        }
        catch (\Exception $e) 
        {
            $this->response('[Error] ' . $e->getMessage(), 500);
        }
    }
}
