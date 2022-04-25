setTimeout(
    function() { 
        jQuery(".alert_msg").hide(500); 
}, 3000);

var toggleAllCheckbox = (source) => {
    checkboxes = document.getElementsByName("ids[]");
    for(var i=0, n=checkboxes.length;i<n;i++)
    {
        checkboxes[i].checked = source.checked;
    }
}

//toggle sub menu
jQuery(".toggle_submenu").on('click' , function() {
    jQuery(this).next().toggleClass('d-none');
});

jQuery(document).ready(function(){
    jQuery(".btn-clear-filter").click(function(){
        let form = jQuery(this).parents('form');
        form.find("input").val("");
        form.submit();
    });
    jQuery(".filter-form select").change(function(){
        let form = jQuery(this).parents('form');
        form.submit();
    });
    //tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});