/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
(function ($) {
    "use strict";

    // Add active state to sidebar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

})(jQuery);

$('.perChecked').click(function () {
    $(this).parents('.parentCheck').find('.childrenCheck').prop('checked', $(this).prop("checked"))
});
$('.perAll').click(function () {
    $(this).parents().find('.childrenCheck, .perChecked').prop('checked', $(this).prop("checked"))
});

CKEDITOR.replace('content');

// $(document).ready(function () {
//     $( "button.delete" ).click(function( event ) {
//         event.preventDefault();
//         Swal.fire({
//             title: 'Bạn có chắc chăn muốn xóa?',
//             text: "Dữ liệu bị xóa sẽ không thể khôi phục lại được!",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'Vâng, Xóa nó!'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 window.location.href = $(this).attr('href');
//             }
//         });
//     });
// });

$(document).ready(function () {
    $('.userRoleMultiple').select2();
    $('.sizeMultiple').select2();
});
