@extends("theme.$theme.layout")
@section('titulo')
    Facturas
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

            .modal-lg {
                width: 1200px;
            }

            .close {
                color: #ffffff;
                opacity: 1;
            }

            .modal-header {
                padding-top: 3px;
                padding-bottom: 3px;
                padding-right: 10px;
                padding-left: 10px;
                border-bottom: 1px solid #e5e5e5;
                background: #88b85a;
            }

            .modal-title {
                margin-top: 3px;
                color: white;
            }

            .modal-lg {
                margin-top: 9%;
                width: 1200px;
            }

            .radio,
            .checkbox {
                margin-top: 4px;
                margin-bottom: 2px;
            }

            .file_factura {
                color: red;
            }

        </style>
    @endsection

    @section('scriptsPlugins')
        <script src="{{ asset('assets/js/jquery-nestable/jquery.nestable.js') }}" type="text/javascript"></script>
    @endsection

    @section('scripts')

        <script src="{{ asset("assets/$theme/js/date-time/moment.js") }}"></script>
        <script>
            var check_anexo = $('anexo_ok')
            var recibida = $('#recibida');
            var hoy = moment().format("YYYY-MM-DD");
            recibida.val(hoy);

            var file_factura = document.getElementById('id-input-file-factura');
            var file_anexo = document.getElementById('id-input-file-anexo');

            file_factura.onchange = function(e) {
                var ext = this.value.match(/\.([^\.]+)$/)[1];
                switch (ext) {
                    case 'pdf':
                        $('#error_factura').css('display', 'none');
                        $('#btn_crear').removeAttr('disabled');
                        break;
                    default:
                        $('#error_factura').css('display', '');
                        $('#btn_crear').attr('disabled', 'disabled');
                        break;
                }
                $('#sin_factura').css('display', 'none');
                if (!$('#id-input-file-anexo').prop('disabled')) {
                    if ($('#id-input-file-anexo').val() == '' || $('#id-input-file-anexo').val().indexOf('pdf') == -1) {
                        $('#btn_crear').attr('disabled', 'disabled');
                    }
                }
            };

            file_anexo.onchange = function(e) {
                var ext = this.value.match(/\.([^\.]+)$/)[1];
                switch (ext) {
                    case 'pdf':
                        $('#error_anexo').css('display', 'none');
                        $('#btn_crear').removeAttr('disabled');
                        $('#sin_anexo').css('display', 'none');
                        break;
                    default:
                        $('#sin_anexo').css('display', 'none');
                        $('#error_anexo').css('display', '');
                        $('#btn_crear').attr('disabled', 'disabled');
                        break;
                }
                if ($('#id-input-file-factura').val() == '' || $('#id-input-file-factura').val().indexOf('pdf') == -1) {
                    $('#btn_crear').attr('disabled', 'disabled');
                }
            };

            $('#id-input-file-factura , #id-input-file-anexo').ace_file_input({
                no_icon: 'fa fa-upload',
                no_file: 'Sin Documento...',
                btn_choose: 'Seleccionar',
                btn_change: 'Cambiar',
                droppable: true,
                thumbnail: false,
                blacklist: 'exe|php'
            });


            $('#anexo_ok').removeAttr('checked').on('change', function() {
                if (this.checked) {
                    $('#id-input-file-anexo').removeAttr('disabled');
                    $('#id-input-file-anexo').attr("required", "true");
                } else {
                    $('#id-input-file-anexo').removeAttr('required');
                    $('#id-input-file-anexo').attr('disabled', 'disabled');
                    $('#error_anexo').css('display', 'none');
                    $('#sin_anexo').css('display', 'none');
                }
            });

            $('#proveedor_id').change(function() {
                if ($('#proveedor_id option:selected').text().replace(/(\r\n|\n|\r| )/g, '') == '---') {
                    alert('No ha Seleccionado Proveedor');
                } else {
                    var proveedor_id = $('#proveedor_id').val();
                    $('#nit').empty();
                    $.ajax({
                        url: "/Facturas/getNit",
                        type: 'GET',
                        data: {
                            proveedor_id: $('#proveedor_id').val()
                        },
                        dataType: 'json',
                        success: function(response) {
                            $.each(response.data, function(key, value) {
                                $('#nit').val(value.nit);
                                $('#area_gestion_id').val(value.area_id);
                            });
                        },
                        error: function() {
                            alert('Hubo un error obteniendo el nit!');
                        }
                    });

                    $('#tipo_factura').empty();
                    $.ajax({
                        url: "/Facturas/getTipo_factura",
                        type: 'GET',
                        data: {
                            proveedor_id: $('#proveedor_id').val()
                        },
                        dataType: 'json',
                        success: function(response) {
                            $.each(response.data, function(key, value) {
                                $('#tipo_factura').val(value.tipo_factura);
                            });
                        },
                        error: function() {
                            alert('Hubo un error obteniendo el tipo de factura!');
                        }
                    });
                }
            });

            function crear_fact() {
                if ($('#id-input-file-factura').val() == '' || $('#id-input-file-factura').val().indexOf('pdf') == -1) {
                    $('#sin_factura').css('display', '');
                    $('#btn_crear').attr('disabled', 'disabled');
                } else {
                    $('#sin_factura').css('display', 'none');
                }
                if (!$('#id-input-file-anexo').prop('disabled')) {
                    if ($('#id-input-file-anexo').val() == '' || $('#id-input-file-anexo').val().indexOf('pdf') == -1) {
                        $('#sin_anexo').css('display', '');
                        $('#btn_crear').attr('disabled', 'disabled');
                    } else {
                        $('#sin_anexo').css('display', 'none');
                    }
                }
            }
        </script>
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
                            Facturas
                        </h3>
                        <div class="widget-toolbar">
                            <a href="#modal-table" role="button"
                                class="btn btn-outline-secondary btn-sm btn-primary btn-round table-responsive"
                                data-toggle="modal">
                                <i class="fa fa-fw fa-plus-circle"></i>
                                <Strong>Cargar Factura</Strong>
                            </a>
                        </div>
                    </div>
                    <!-- /section:custom/widget-box.options.collapsed -->
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="content">
                                <table id="" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">
                                                # Factura
                                            </th>
                                            <th class="center">
                                                Valor
                                            </th>
                                            <th class="center">
                                                Generada
                                            </th>
                                            <th class="center">
                                                Recibida
                                            </th>
                                            <th class="center">
                                                Vence
                                            </th>
                                            <th class="center">
                                                Programada
                                            </th>
                                            <th class="center">
                                                Tipo Factura
                                            </th>
                                            <th class="center">
                                                Asignada a
                                            </th>
                                            <th class="center">
                                                Estado
                                            </th>
                                            <th class="center">
                                                Empresa
                                            </th>
                                            <th class="center">
                                                Nit
                                            </th>
                                            <th class="center">
                                                Proveedor
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">156-7907097</td>
                                            <td class="center">$326.173,00</td>
                                            <td class="center">27/01/2021</td>
                                            <td class="center">27/01/2021</td>
                                            <td class="center">03/02/2021</td>
                                            <td class="center">N/A</td>
                                            <td class="center">Servicio Publico</td>
                                            <td class="center">Tesoreria</td>
                                            <td class="center">Por Pagar</td>
                                            <td class="center">Snider</td>
                                            <td class="center">900092385</td>
                                            <td>EPM TELECOMUNICACIONES S.A EPS</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal-table" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-content modal-lg">
                    <div class="modal-header"><button type="button" class="bootbox-close-button close"
                            data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><strong>Cargar Factura</strong></h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="content">
                                <div class="row">
                                    <form action="{{ route('crear_factura') }}" method="POST" autocomplete="off"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-sm-11">
                                            @include('pages.facturas.form')
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="submit" id="btn_crear" onclick="crear_fact()"
                                                class="col-sm-12 btn btn-app btn-xs btn-success pull-right">
                                                <i class="ace-icon fa fa-check"></i>
                                                <b>Crear</b>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
