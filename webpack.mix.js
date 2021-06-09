let mix = require('laravel-mix');

// Mix admin dependencies
mix.styles([
    'public/assets/admin2/css/selectize.css',
    // 'public/assets/admin2/css/dropzone.css',
    // 'public/assets/admin2/css/cropper.css',
    // 'public/assets/admin2/css/timepicker.css',
    'public/assets/admin2/css/toastr.css',
    'public/assets/admin2/css/fonts.css',
    'public/assets/admin2/css/font-awesome.min.css',
    // 'public/assets/admin2/css/daterangepicker.css',
    'public/assets/admin2/css/datatables-responsive.min.css',
    // 'public/assets/admin2/css/datatables.select.css',
    // 'public/assets/admin2/css/datatables.buttons.bootstrap4.css',
    'public/assets/admin2/css/jquery-confirm.css',
    'public/assets/css/icofont.min.css',
    'public/assets/admin2/css/main.css',
], 'public/css/admin.css')
    .scripts([
        'public/assets/admin2/js/jquery.min.js',
        'public/assets/admin2/js/popper.min.js',
        // 'public/assets/admin2/js/Chart.min.js',
        'public/assets/admin2/js/selectize.js',
        'public/assets/admin2/js/jquery-confirm.js',
        'public/assets/admin2/js/moment.min.js',
        // 'public/assets/admin2/js/daterangepicker.js',
        'public/assets/admin2/js/jquery.dataTables.min.js',
        'public/assets/admin2/js/perfect-scrollbar.jquery.min.js',
        // 'public/assets/admin2/js/slick.min.js',
        'public/assets/admin2/js/util.js',
        'public/assets/admin2/js/toastr.min.js',
        'public/assets/admin2/js/alert.js',
        // 'public/assets/admin2/js/timepicker.min.js',
        // 'public/assets/admin2/js/cropper.js',
        // 'public/assets/admin2/js/jquery-cropper.min.js',
        'public/assets/admin2/js/button.js',
        'public/assets/admin2/js/carousel.js',
        'public/assets/admin2/js/collapse.js',
        'public/assets/admin2/js/dropdown.js',
        'public/assets/admin2/js/modal.js',
        'public/assets/admin2/js/tab.js',
        'public/assets/admin2/js/tooltip.js',
        'public/assets/admin2/js/jquery.cookie.js',
        'public/assets/admin2/js/popover.js',
        // 'public/assets/admin2/js/dropzone.js',
        'public/assets/admin2/js/dataTables.bootstrap4.min.js',
        'public/assets/admin2/js/datatables.select.js',
        'public/assets/admin2/js/datatables-responsive.min.js',
        'public/assets/admin2/js/datatables-responsive-bootstrap4.min.js',
        'public/assets/admin2/js/datatables.buttons.js',
        'public/assets/admin2/js/datatables.bootstrap4.buttons.js',
        'public/assets/admin2/js/customizer.js',
        'public/assets/admin2/js/main.js',
    ], 'public/js/admin.js')
    .version();

mix.copy('public/assets/fonts', 'public/fonts');
