<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('titulo', 'Trebol')</title>


    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset("assets/$theme/images/tittle_logo.png") }}" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/css/bootstrap.css") }}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/css/ace-fonts.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/$theme/css/font-awesome.css") }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/solid.css') }}" />
    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset("assets/$theme/css/ace.css") }}" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!-- ace settings handler -->
    <script src="{{ asset("assets/$theme/js/ace-extra.js") }}"></script>
    @yield('styles')
    <style>
        .navbar .navbar-brand {
            color: #ffffff;
            font-size: 24px;
            text-shadow: none;
            padding-top: 7px;
            padding-bottom: 7px;
            height: auto;
        }

    </style>
</head>

<body class="no-skin">
    <!--Inicio Header-->
    @include("theme/$theme/header")
    <!--Fin Header-->

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        @if (Auth::check())
            <!--Inicio Aside-->
            @include("theme/$theme/aside")
            <!--Fin Aside-->
            <div class="main-content">
                <!-- Main content -->
                <section class="main-content-inner">
                    @yield('contenido')
                </section>
            </div>
            <!-- /.content -->
        @else
            <!-- Main content -->
            <div class="main-content">
                <section class="main-content-inner">
                    <div class="col-lg-12">
                        <div class="widget-box row se_exp">
                            <div class="center widget-user">
                                <h1>La sesion ha Expirado, por favor ingresar nuevamente</h1>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item no-border btn-link blue"
                                        class="ace-icon fa fa-power-off">
                                        <h2 class="">Iniciar Sesión</h2>
                                    </button>
                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.content -->
        @endif
        @include('modal.creacion_proveedor')
        @include('modal.creacion_factura')
        @include('modal.actualizacion_proveedor')
        @include("theme/$theme/footer")
    </div>
    <!-- ./wrapper -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{ asset("assets/$theme/js/jquery.js") }}"></script>

    <!-- <![endif]-->

    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='{{ asset('assets/ace/js/jquery.mobile.custom.js') }}'>" + "<" + "/script>");
    </script>
    <script src="{{ asset("assets/$theme/js/bootstrap.js") }}"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
  <script src="{{ asset("assets/$theme/js/excanvas.js") }}"></script>
  <![endif]-->
    <script src="{{ asset("assets/$theme/js/jquery-ui.custom.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/jquery.ui.touch-punch.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/jquery.easypiechart.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/jquery.sparkline.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/flot/jquery.flot.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/flot/jquery.flot.pie.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/flot/jquery.flot.resize.js") }}"></script>

    <!-- ace scripts -->
    <script src="{{ asset("assets/$theme/js/ace/elements.scroller.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.colorpicker.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.fileinput.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.typeahead.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.wysiwyg.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.spinner.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.treeview.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.wizard.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/elements.aside.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.ajax-content.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.touch-drag.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.sidebar.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.sidebar-scroll-1.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.submenu-hover.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.widget-box.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.settings.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.settings-rtl.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.settings-skin.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.widget-on-reload.js") }}"></script>
    <script src="{{ asset("assets/$theme/js/ace/ace.searchbox-autocomplete.js") }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('scriptsPlugins')
    @yield('scripts')
    <script>
        $(document).ready(function() {
            $("#modal-alert").modal("show");
        });

        $('#accordion-style').on('click', function(ev) {
            var target = $('input', ev.target);
            var which = parseInt(target.val());
            if (which == 2) $('#accordion').addClass('accordion-style2');
            else $('#accordion').removeClass('accordion-style2');
        });

        $(".alerta_form").delay(10000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
</body>

</html>
