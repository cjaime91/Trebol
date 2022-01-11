<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-9">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label><b>Agente</b></label>
                        <select class="input-sm" style="width: 100%;" id="ciudad_id" name="ciudad_id" required>
                            <option value="">--Seleccione--</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class=""><b>Identificación</b></label>
                        <input type="text" class="form-control input-sm" placeholder="" id="cod" name="cod" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label class=""><b>Nombre</b></label>
                        <input type="text" class="form-control input-sm" placeholder="" id="cod" name="cod" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <label><b>Fecha</b></label>
                <div>
                    <input type="date" id="fecha" name="fecha" class="col-sm-9 input-sm" placeholder="dd/mm/yyyy" />
                    <button type="submit" class="btn btn-xs btn-success btn-round pull-right">
                        <i class="ace-icon fa fa-plus bigger-110 icon-only"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="simple-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="20%" class="center">Identificacion</th>
                            <th width="70%" class="center">Agente</th>
                            <th width="10%" class="center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4761</td>
                            <td>AGS 360 SOLUTIONS (Londres) - 4761</td>
                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-minus bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4761</td>
                            <td>AGS 360 SOLUTIONS (Londres) - 4761</td>
                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-minus bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-left">
                    <button class="btn btn-sm btn-white btn-info btn-bold">
                        <i class="ace-icon fa-solid fa-floppy-disk bigger-120 blue"></i>
                        Guardar Filtro
                    </button>
                </div>
                <div class="pull-right">
                    <button class="btn btn-sm btn-white btn-info btn-bold">
                        <i class="ace-icon fa-solid fa-eye bigger-120 blue"></i>
                        Ver
                    </button>
                    <button class="btn btn-sm btn-white btn-success btn-bold">
                        <i class="ace-icon fa-solid fa-file-excel bigger-120 green"></i>
                        Exportar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="col-sm-12 widget-container-col" id="widget-container-col-3">
            <div class="widget-box widget-color-blue" id="widget-box-3">
                <!-- #section:custom/widget-box.options.collapsed -->
                <div class="widget-header widget-header-small">
                    <h3 class="widget-title">
                        Filtros Guardados
                    </h3>
                </div>

                <!-- /section:custom/widget-box.options.collapsed -->
                <div class="widget-body">
                    <div class="widget-main">
                        <table id="simple-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="70%" class="center">Filtros</th>
                                    <th width="30%" class="center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4761</td>
                                    <td class="center">
                                        <button class="btn btn-minier btn-white btn-default btn-bold">
                                            <i class="fa-solid fa-download"></i>
                                            Cargar
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4761</td>
                                    <td class="center">
                                        <button class="btn btn-minier btn-white btn-default btn-bold">
                                            <i class="fa-solid fa-download"></i>
                                            Cargar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
