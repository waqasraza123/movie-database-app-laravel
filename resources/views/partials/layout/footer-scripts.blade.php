<!-- jQuery 2.2.3 -->
<script src="{{asset('/lte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('/lte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<!-- Sparkline -->
<script src="{{asset('lte/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/lte/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('/lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/lte/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('/lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset('/lte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/lte/dist/js/app.js')}}"></script>
<script src="{{asset('swal/sweetalert.min.js')}}"></script>
<script src="{{asset('toaster/toastr.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('swal/sweetalert.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('toaster/toastr.min.css')}}">
<script src="{{asset('/js/app.js')}}"></script>
@yield('footer')
<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
<script src="{{asset('/js/custom.js')}}"></script>