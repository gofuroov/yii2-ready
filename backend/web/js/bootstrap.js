/**
 * This code is created by Olimjon Gofurov
 */
$(document).ready(function () {
    //Execute tooltips
    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    /**
     * Active link menu item
     */
    $("#user-menu .nav-item.active a").addClass("active")
    $("#user-menu .nav-item.active").removeClass("active")
})