<!-- ==================Js File============== -->
    <!-- j Query -->
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.js') }}"></script>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <!-- revolution -->
    <script src="{{ asset('vendor/revolution/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/revolution/revolution.extension.actions.min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Fancybox js -->
    <script type="text/javascript" src="{{ asset('vendor/fancy-box/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/fancy-box/jquery.fancybox-media.js') }}"></script>
    <!-- js count to -->
    <script type="text/javascript" src="{{ asset('vendor/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery.countTo.js') }}"></script>
    <!-- Jquery ui js -->
    <script type="text/javascript" src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset ("/vendor/input-mask/jquery.inputmask.js") }}"></script>
    <script src="{{ asset ("/vendor/input-mask/jquery.inputmask.date.extensions.js") }}"></script>
    <script src="{{ asset ("/vendor/input-mask/jquery.inputmask.extensions.js") }}"></script>
    <!-- Validation -->
    <script type="text/javascript" src="{{ asset('js/validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/multiple-select.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/theme.js') }}"></script>
    <script src="{!! asset('assets/js/app-theme.js') !!}"></script>
    <!-- Google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key={!! env('API_KEY_GOOGLE_MAPS') !!}&callback=initMap"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-91809644-1', 'auto');
      ga('send', 'pageview');

    </script>