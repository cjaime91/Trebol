@extends("theme.$theme.layout")
@section('titulo')
    Dashboard | Trebol
@endsection

@if (Auth::check())
    @section('styles')
        <link href="{{ asset('assets/js/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("assets/$theme/css/ace.css") }}" class="ace-main-stylesheet"
            id="main-ace-style" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection

    @section('scriptsPlugins')
        <script src="{{ asset('assets/js/jquery-nestable/jquery.nestable.js') }}" type="text/javascript"></script>
    @endsection

    @section('scripts')
        
    @endsection
@endif

@section('contenido')
    <div class="main-content">
        <div class="col-sm-12 widget-container-col" id="widget-container-col-9">
            <div class="row">
                <div class="col-xs-12 col-sm-12 widget-container-col" id="widget-container-col-3">
                    <div class="widget-box widget-color-orange" id="widget-box-3">
                        <!-- #section:custom/widget-box.options.collapsed -->
                        <div class="widget-header widget-header-small">
                            <h3 class="widget-title">
                                <strong>Dashboard</strong>
                            </h3>
                            <div class="widget-toolbar widget-toolbar-dark">
                                
                            </div>
                        </div>
                        <!-- /section:custom/widget-box.options.collapsed -->
                        <div class="widget-body">
                            <div class="widget-main">

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
