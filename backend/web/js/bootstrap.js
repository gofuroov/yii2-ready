/**
 * This code is created by Olimjon Gofurov
 * This helps to add active class to <a> tag of <li> in yii\widget\Menu
 */
$(document).ready(function () {
    $('a[data-widget="pushmenu"]').click(function (event) {
        let baseUrl = $(this).data('baseurl');
        $.ajax({
            type: "POST",
            url: baseUrl + '/site/sidebar/',
            data: {},
            success: function (data, status) {
                console.log("Sidebar o'zgartirildi!");
            },
            error: function (data, status) {
                alert("Xatolik!");
            },
            dataType: 'html'
        });
    });

    $("body").tooltip({selector: '[data-toggle=tooltip]'});
})