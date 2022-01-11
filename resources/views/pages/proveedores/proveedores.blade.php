@extends("theme.$theme.layout")
@section('titulo')
    Proveedores
@endsection

@if (Auth::check())
    @section('styles')
        <link href="{{ asset('assets/js/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("assets/$theme/css/ace.css") }}" class="ace-main-stylesheet"
            id="main-ace-style" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet"
            href="{{ asset('assets/js/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/js/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/js/datatables/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <style>
            .btn-group:first-child {
                margin-left: 0;
                float: right;
            }

            .dataTables_wrapper .row:first-child {
                padding-top: 0px;
                padding-bottom: 0px;
                background-color: #eff3f800;
            }

            .dataTables_wrapper .row:last-child {
                border-bottom: 0px solid #e0e0e000;
                padding-top: 0px;
                padding-bottom: 0px;
                background-color: #e0e0e000;
            }

            table {
                width: 100%;
            }

        </style>
    @endsection

    @section('scriptsPlugins')
        <script src="{{ asset('assets/js/jquery-nestable/jquery.nestable.js') }}" type="text/javascript"></script>
    @endsection

    @section('scripts')
        <script src="{{ asset('assets/js/datatables/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatables/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset("assets/$theme/js/date-time/moment.js") }}"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.25/dataRender/datetime.js"></script>
        <script>
            var tabla_prov = $('#tabla_proveedores').DataTable({
                order: [
                    [4, "desc"]
                ],
                buttons: [{
                        "extend": "copy",
                        "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "excel",
                        "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    },
                    {
                        "extend": "pdf",
                        "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                        "className": "btn btn-white btn-primary btn-bold"
                    }
                ],
                dom: "<'row'<'col-sm-6'l><'col-sm-6'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                ajax: "{{ route('proveedores') }}",
                columns: [{
                        data: 'nit',
                        name: 'nit'
                    },
                    {
                        data: 'razon_social',
                        name: 'razon_social'
                    },
                    {
                        data: 'tipo_factura',
                        name: 'tipo_factura',

                    },
                    {
                        data: 'area',
                        name: 'area',

                    },
                    {
                        data: 'fecha_c',
                        name: 'fecha_c',

                    },
                    {
                        class: "details-control",
                        orderable: false,
                        data: null,
                        defaultContent: '<td>' +
                            '<div class="action-buttons center">' +
                            '<a href="#" role="button" class="blue" data-toggle="modal" id="enlace">' +
                            '<i class="ace-icon fa fa-pencil align-top bigger-120 icon-on-right"></i>' +
                            '</a>' +
                            '</div>' +
                            '</td>',
                    },
                ],
                columnDefs: [{
                    targets: 4,
                    render: $.fn.dataTable.render.moment('DD/MM/YYYY')
                }],
                responsive: true,
                lengthChange: true,
                lengthMenu: [
                    [7, 10, 25, 50, 100, -1],
                    [7, 10, 25, 50, 100, "All"]
                ],
                scrollY: "250px",
            });
            $('#tabla_proveedores tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var row = tabla_prov.row(tr);
                format(row.data());
            });

            function boton_limpiar(){
                $('#btn_crear').css("display", "");
                $('#btn_editar').css("display", "none");
                $('#btn_limpiar').css("display", "none");
                $('#form_prov').attr("action", "http://trebol.test/Proveedores/Crear");
                $('#metodo').attr("value", "");
            }

            function format(d) {
                $('#nit').val(d.nit);
                $('#razon_social').val(d.razon_social);
                $('#telefono').val(d.telefono);
                $('#correo').val(d.correo);
                $('#direccion').val(d.direccion);
                $('#area_id').val(d.area_id);
                $('#tipo_factura_id').val(d.tipo_factura_id);
                $('#btn_crear').css("display", "none");
                $('#btn_editar').css("display", "");
                $('#btn_limpiar').css("display", "");
                $('#form_prov').attr("action", "http://trebol.test/Proveedores/" + d.id);
                $('#metodo').attr("value", "put");
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
                        <h6 class="widget-title">
                            Crear Proveedor
                        </h6>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="content">
                                <div class="row">
                                    <form action="{{ route('crear_proveedor') }}" method="POST" autocomplete="off"
                                        id="form_prov">
                                        @csrf
                                        <input type="hidden" name="_method" value="" id="metodo">
                                        <div class="col-sm-11">
                                            @include('pages.proveedores.form')
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="submit" id="btn_crear"
                                                class="col-sm-12 btn btn-app btn-xs btn-success pull-right">
                                                <i class="ace-icon fa fa-check"></i>
                                                <b>Crear</b>
                                            </button>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="submit" id="btn_editar" style="display: none"
                                                class="col-sm-12 btn btn-app btn-xs btn-warning pull-right">
                                                <i class="ace-icon fa fa-edit"></i>
                                                <b>Editar</b>
                                            </button>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="reset" id="btn_limpiar" onclick="boton_limpiar()" style="display: none"
                                                class="col-sm-12 btn btn-app btn-xs btn-info pull-right">
                                                <i class="ace-icon fa fa-edit"></i>
                                                <b>Cancelar</b>
                                            </button>
                                        </div>
                                    </form>
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
                            Listado
                        </h6>
                    </div>
                    <!-- /section:custom/widget-box.options.collapsed -->
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="content">
                                <table id="tabla_proveedores"
                                    class="table text-nowrap table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="center">
                                                NIT
                                            </th>
                                            <th class="center">
                                                Razón Social
                                            </th>
                                            <th class="center">
                                                Tipo Factura
                                            </th>
                                            <th class="center">
                                                Area
                                            </th>
                                            <th class="center">
                                                Fecha Creación
                                            </th>
                                            <th width="100px" class="center">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
