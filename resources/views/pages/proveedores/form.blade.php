<div class="row">
    <div class="col-sm-12">
        <div class="widget-box widget-color-green" id="widget-box-3">
            <div class="widget-main">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>NIT</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="nit" name="nit"
                                        value="{{ old('nit') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>Razon Social</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="razon_social"
                                        value="{{ old('razon_social') }}" name="razon_social" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Telefono</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="telefono"
                                        value="{{ old('telefono') }}" name="telefono">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>Correo</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="correo"
                                        value="{{ old('correo') }}" name="correo">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>Dirección</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="direccion"
                                        value="{{ old('direccion') }}" name="direccion">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Area</b></label>
                                    <select class="form-control input-sm input-mini" style="width: 100%;" id="area_id"
                                        name="area_id" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label><b>Tipo Factura</b></label>
                                    <select class="input-sm" style="width: 100%;" id="tipo_factura_id"
                                        name="tipo_factura_id" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($tipo_factura as $tf)
                                            <option value="{{ $tf->id }}">{{ $tf->tipo_factura }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        @if ($errors->any())
            <style>
                #nit {
                    border: 2px solid red;
                }

            </style>
            <div class="alert alert-danger alerta_form">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <h5><i class="icon fas fa-ban"></i> Error en el Formulario</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
