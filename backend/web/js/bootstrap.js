/**
 * This code is created by Olimjon Gofurov
 */
$(document).ready(function () {
    //Execute tooltips
    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    /**
     * Active link menu item
     */
    $(".nav-item.active a").addClass("active")
    $(".nav-item.active").removeClass("active")

    /**
     * Sidebar menu
     * @type {*|jQuery|HTMLElement}
     */
    let body = $('body')
    let storage = localStorage;
    let condition = storage.getItem('sidebar');

    if (condition === 'open') {
        if (body.hasClass('sidebar-collapse')) {
            body.removeClass('sidebar-collapse');
        }
    } else {
        if (!body.hasClass('sidebar-collapse')) {
            body.addClass('sidebar-collapse');
        }
    }

    //Sidebar toggle
    $('#sidebar-menu').click(function (e) {
        e.preventDefault();
        console.log(Date.now())
        if (body.hasClass('sidebar-collapse')) {
            body.removeClass('sidebar-collapse');
            storage.setItem('sidebar', 'open');
        } else {
            body.addClass('sidebar-collapse');
            storage.setItem('sidebar', 'close');
        }
    });
})