@extends("theme.$theme.layout")
@section('titulo')
    Referencias
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
        <div class="widget-body">
            <div class="col-sm-12 widget-container-col" id="widget-container-col-3">
                <div class="widget-box widget-color-green" id="widget-box-3">
                    <!-- #section:custom/widget-box.options.collapsed -->
                    <div class="widget-header widget-header-small">
                        <h6 class="widget-title">
                            Crear Referencia
                        </h6>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-11">
                                        @include('pages.referencias.form')
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" class="col-sm-12 btn btn-app btn-xs btn-success pull-right">
                                            <i class="ace-icon fa fa-check"></i>
                                            <b>Crear</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 widget-container-col" id="widget-container-col-3">
                <div class="widget-box widget-color-green" id="widget-box-3">
                    <!-- #section:custom/widget-box.options.collapsed -->
                    <div class="widget-header widget-header-small">
                        <h6 class="widget-title">
                            Referencias
                        </h6>
                    </div>

                    <!-- /section:custom/widget-box.options.collapsed -->
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="content">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
