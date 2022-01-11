@extends("theme.$theme.layout")
@section('titulo')
    Cartera
@endsection

@if (Auth::check())
    @section('styles')
        <link href="{{ asset('assets/js/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("assets/$theme/css/ace.css") }}" class="ace-main-stylesheet"
            id="main-ace-style" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .table {
                margin-top: 4px;
                margin-bottom: 0px;
            }

            .btn-xs,
            .btn-group-xs>.btn {
                width: 30px;
            }

            .alnright {
                text-align: right;
            }

            .well {
                margin-bottom: 0px;
            }

        </style>
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
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                            <li class="active">
                                <a data-toggle="tab" href="#profile4"><b>Facturas por Pagar Agentes</b></a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#home4"><b>Aplicar Recaudos</b></a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#dropdown14"><b>Registrar Pagos a Agentes</b></a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div id="profile4" class="tab-pane active">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('pages.cartera.form')
                                    </div>
                                    
                                </div>

                                <div class="widget-box widget-color-green" id="widget-box-3">
                                    <!-- #section:custom/widget-box.options.collapsed -->
                                    <div class="widget-header widget-header-small">
                                        <h6 class="widget-title">
                                            Facturas
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

                            <div id="home4" class="tab-pane in">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @include('pages.cartera.recaudos')
                                    </div>
                                </div>

                                <div class="widget-box widget-color-green" id="widget-box-3">
                                    <!-- #section:custom/widget-box.options.collapsed -->
                                    <div class="widget-header widget-header-small">
                                        <h6 class="widget-title">
                                            Facturas
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

                            <div id="dropdown14" class="tab-pane">
                                @include('pages.cartera.pagosagente')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
