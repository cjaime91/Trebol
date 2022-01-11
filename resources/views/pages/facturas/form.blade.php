<div class="row">
    <div class="col-sm-12">
        <div class="widget-box widget-color-green" id="widget-box-3">
            <div class="widget-main">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>Proveedor</b></label>
                                    <select class="form-control input-sm" style="width: 100%;" id="proveedor_id"
                                        name="proveedor_id" required>
                                        <option value="">---</option>
                                        @foreach ($proveedores as $prov)
                                            <option value="{{ $prov->id }}">{{ $prov->razon_social }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>NIT</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="nit" name="nit"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>Tipo Factura</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="tipo_factura"
                                        name="tipo_factura" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>No. Factura</b></label>
                                    <div>
                                        <input type="text" class="col-sm-12 input-sm" placeholder="" id="no_factura"
                                            name="no_factura"
                                            onkeyup="
                                                var start = this.selectionStart; var end = this.selectionEnd; 
                                                this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>Valor</b></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control text-right input-sm" placeholder="0"
                                            id="valor" name="valor"
                                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Empresa</b></label>
                                    <select class="form-control input-sm" style="width: 100%;" id="empresa_id"
                                        name="empresa_id" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($empresas as $empresa)
                                            <option value="{{ $empresa->id }}">{{ $empresa->empresa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Asignar a</b></label>
                                    <select class="form-control input-sm" style="width: 100%;" id="area_gestion_id"
                                        name="area_gestion_id" required>
                                        <option value="">--Seleccione--</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class=""><b>Radicado</b></label>
                                    <input type="text" class="form-control input-sm" placeholder="" id="radicado"
                                        name="radicado">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Fecha Recepción</b></label>
                                    <input type="date" id="recibida" name="recibida"
                                        class="form-control center input-sm" placeholder="dd/mm/yyyy" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Fecha Generada</b></label>
                                    <input type="date" id="generada" name="generada"
                                        class="form-control center input-sm" placeholder="dd/mm/yyyy" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Fecha Vencimiento</b></label>
                                    <input type="date" id="vencimiento" name="vencimiento"
                                        class="form-control center input-sm" placeholder="dd/mm/yyyy" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Convenio</b></label>
                                    <select class="form-control input-sm" style="width: 100%;" id="" name="">
                                        <option value="">--Seleccione--</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label><b>Factura</b></label>
                                    <input type="file" accept=".pdf" id="id-input-file-factura" name="factura" required/>
                                    <label class="file_factura" id="error_factura" style="display: none"><b>(Por favor seleccionar un documento PDF)</b></label>
                                    <label class="file_factura" id="sin_factura" style="display: none"><b>(No se ha seleccionado un documento)</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input name="form-field-checkbox" type="checkbox" class="ace"
                                                id="anexo_ok">
                                            <span class="lbl"><b>Anexo</b></span>
                                        </label>
                                    </div>
                                    <input type="file" accept=".pdf" class="file_anexo" id="id-input-file-anexo" name="anexo" disabled />
                                    <label class="file_factura" id="error_anexo" style="display: none"><b>(Por favor seleccionar un documento PDF)</b></label>
                                    <label class="file_factura" id="sin_anexo" style="display: none"><b>(No se ha seleccionado un documento)</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
