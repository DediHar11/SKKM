    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- <script src="{{asset('admin/app-assets/vendors/js/extensions/swiper.min.js')}}"></script> -->
    <script src="{{asset('admin/app-assets/vendors/js/extensions/dropzone.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->
    
    <!-- BEGIN: Page JS-->
        <script src="{{asset('admin/app-assets/js/scripts/datatables/datatable.js')}}"></script>
    <!-- END: Page JS-->

    
    <!-- <script src="{{asset('admin/app-assets/js/scripts/charts/chart-apex.js')}}"></script> -->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- END: Theme JS -->

    <!-- BEGIN: Page JS-->
    <!-- <script src="{{asset('admin/app-assets/js/scripts/cards/card-statistics.js')}}"></script> -->
    <!-- END: Page JS-->

    <!-- BEGIN: Page JS-->
        <script src="{{asset('admin/app-assets/js/scripts/ui/data-list-view.js')}}"></script>
    <!-- END: Page JS-->

    <!-- <script src="{{asset('admin/app-assets/js/scripts/extensions/swiper.js')}}"></script> -->
    <script>
    var clicked_p = 0;

$(".password-eye").click(function (e) {
    e.preventDefault();

    $(this).toggleClass("password-eye");
    if (clicked_p == 0) {
        $(this).html('<i class="feather icon-eye"></i>');
        $('#password').attr("type", "text");
        clicked_p = 1;
    } else {
        $(this).html('<i class="feather icon-eye-off"></i>');
        $('#password').attr("type", "password");
        clicked_p = 0;
    }
});

var clicked_c = 0;
$(".password-confirmation-eye").click(function (e) {
    e.preventDefault();

    $(this).toggleClass("password-confirmation-eye");
    if (clicked_c == 0) {
        $(this).html('<i class="feather icon-eye"></i>');
        $('#password-confirmation').attr("type", "text");
        clicked_c = 1;
    } else {
        $(this).html('<i class="feather icon-eye-off"></i>');
        $('#password-confirmation').attr("type", "password");
        clicked_c = 0;
    }
});

var clicked_c = 0;
$(".password-12").click(function (e) {
    e.preventDefault();

    $(this).toggleClass("password-12");
    if (clicked_c == 0) {
        $(this).html('<i class="feather icon-eye"></i>');
        $('#password1').attr("type", "text");
        clicked_c = 1;
    } else {
        $(this).html('<i class="feather icon-eye-off"></i>');
        $('#password1').attr("type", "password");
        clicked_c = 0;
    }
});
</script>           