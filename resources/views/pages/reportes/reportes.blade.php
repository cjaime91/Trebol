@extends("theme.$theme.layout")
@section('titulo')
    Reportes
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
                    <!-- #section:custom/widget-box.options.collapsed -->
                    <div class="widget-header widget-header-small">
                        <h3 class="widget-title">
                            Cartera por NIT
                        </h3>

                        <div class="widget-toolbar">

                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-minus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            @include('pages.reportes.Cartera_NIT')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 widget-container-col" id="widget-container-col-3">
                <div class="widget-box widget-color-green" id="widget-box-3">
                    <!-- #section:custom/widget-box.options.collapsed -->
                    <div class="widget-header widget-header-small">
                        <h3 class="widget-title">
                            Cruce de Cuentas USD
                        </h3>

                        <div class="widget-toolbar">

                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-minus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label><b>Agente</b></label>
                                            <select class="input-sm" style="width: 100%;" id="ciudad_id"
                                                name="ciudad_id" required>
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label class=""><b>Identificación</b></label>
                                            <input type="text" class="form-control input-sm" placeholder="" id="cod"
                                                name="cod" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label><b>Fecha</b></label>
                                    <div>
                                        <input type="date" id="fecha" name="fecha" class="col-sm-3 input-sm"
                                            placeholder="dd/mm/yyyy" />

                                    </div>
                                    <div class="center">
                                        <button class="btn btn-sm btn-white btn-info btn-bold">
                                            <i class="ace-icon fa-solid fa-eye bigger-120 blue"></i>
                                            Ver
                                        </button>
                                        <button class="btn btn-sm btn-white btn-success btn-bold">
                                            <i class="ace-icon fa-solid fa-file-excel bigger-120 green"></i>
                                            Exportar
                                        </button>
                                        <button class="btn btn-sm btn-white btn-warning btn-bold pull-right">
                                            <i class="ace-icon fa-solid fa-users bigger-120 yellow"></i>
                                            Todos los Agentes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 widget-container-col" id="widget-container-col-3">
                <div class="widget-box widget-color-blue" id="widget-box-3">
                    <!-- #section:custom/widget-box.options.collapsed -->
                    <div class="widget-header widget-header-small">
                        <h3 class="widget-title">
                            Facturas Contables
                        </h3>

                        <div class="widget-toolbar">

                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-minus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>
                            </a>
                        </div>
                    </div>

                    <!-- /section:custom/widget-box.options.collapsed -->
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1">
                                        <strong>Fecha Inicial</strong></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input class="form-control input-sm date-picker" id="id-date-picker-1"
                                                type="text" data-date-format="dd-mm-yyyy">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1">
                                        <strong>Fecha Final</strong></label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input class="form-control input-sm date-picker" id="id-date-picker-1"
                                                type="text" data-date-format="dd-mm-yyyy">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 center">
                                    <button class="btn btn-sm btn-white btn-info btn-bold pull-left">
                                        FP sin FN con S
                                    </button>
                                    <button class="btn btn-sm btn-white btn-success btn-bold">
                                        FP sin FN
                                    </button>
                                    <button class="btn btn-sm btn-white btn-warning btn-bold pull-right">
                                        FP con FN
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 widget-container-col" id="widget-container-col-3">
                <div class="widget-box widget-color-blue" id="widget-box-3">
                    <!-- #section:custom/widget-box.options.collapsed -->
                    <div class="widget-header widget-header-small">
                        <h3 class="widget-title">
                            Consolidado CxC - CxP
                        </h3>

                        <div class="widget-toolbar">

                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-minus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>
                            </a>
                        </div>
                    </div>

                    <!-- /section:custom/widget-box.options.collapsed -->
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1">
                                    <strong>Fecha Corte</strong></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input class="form-control input-sm date-picker" id="id-date-picker-1" type="text"
                                            data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="center">
                                        <button class="btn btn-sm btn-white btn-info btn-bold">
                                            <i class="ace-icon fa-solid fa-eye bigger-120 blue"></i>
                                            Descargar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
