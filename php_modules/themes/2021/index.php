<?php defined( 'APP_PATH' ) or die('');

$this->theme->prepareAssets([
    'jquery',
    'js-chart',
    'css-bootstrap',
    'css-frontend',
    'css-fontawesome',
    'css-frontend',
    'js-frontend'
]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  echo $this->render('widgets.frontend.headerConfig'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    $this->theme->echo('css', $this->url) ?> 
    <?php $this->theme->echo('topJs', $this->url) ?>
    <?php $this->theme->echo('inlineCss', $this->url) ?>
</head>
<body>
    <div id="to-top"><i class="fas fa-arrow-up"></i></div>
    <div class="wrap">

        <!-- ----------- header ----------- -->
        <?php  echo $this->render('widgets.frontend.header'); ?>
        <!-- ----------- end header ----------- -->

        <!-- ----------- content ----------- -->
        <section class="wrap-content">
            <?php echo $this->theme->getBody(); ?>
        </section>
        <!-- ----------- end content ----------- -->

        <!-- ----------- footer ----------- -->
        <?php  echo $this->render('widgets.frontend.footer'); ?>
        <!-- ----------- end footer ----------- -->

        <!-- ----------- popup filter ----------- -->
        <?php  echo $this->render('widgets.frontend.popupFilter'); ?>
        <!-- ----------- popup filter ----------- -->

        <!-- ----------- popup filter ----------- -->
        <?php  echo $this->render('widgets.frontend.popupShare'); ?>
        <!-- ----------- popup filter ----------- -->

    </div>
    <?php $this->theme->echo('js', $this->url) ?> 
    <?php $this->theme->echo('inlineJs', $this->url) ?>
</body>
</html>
