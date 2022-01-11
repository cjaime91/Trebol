<?php

namespace App\Http\Controllers;

use App\Models\areas;
use App\Models\documentos;
use App\Models\empresas;
use App\Models\factura;
use App\Models\proveedores;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = areas::get();
        $empresas = empresas::get();
        $proveedores = proveedores::orderBy('razon_social')->get();
        return view('pages.facturas.facturas', compact('proveedores', 'areas', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        $datos_doc = [];

        $datos['estado_id'] = 8;
        //factura::create($datos);



        if (factura::create($datos)) {
            /* Switch para indicar cual de las 3 empresas fue seleccionada, hara parte de la ruta donde se guardara el documento de factura o anexo */
            switch ($datos['empresa_id']) {
                case '1':
                    $datos['empresa'] = 'Aviomar';
                    break;
                case '2':
                    $datos['empresa'] = 'Colvan';
                    break;
                case '3':
                    $datos['empresa'] = 'Snider';
                    break;
            }

            $id_factura = factura::where([['proveedor_id', '=', $datos['proveedor_id']], ['no_factura', '=', $datos['no_factura']]])->get(['id']);
            foreach ($id_factura as $idf) {
                $datos_doc['factura_id'] = $idf->id;
            }

            /* Consulta indicar cual proveedor fue seleccionado, hara parte de la ruta donde se guardara el documento de factura o anexo */
            $p = proveedores::where('id', '=', $datos['proveedor_id'])->get(['razon_social']);
            foreach ($p as $prov) {
                $datos['proveedor'] = $prov->razon_social;
            }

            //Ruta donde se guardara el documento concatenando parte de la informacion de la empresa, proceedor y numero de factura
            $ruta = 'facturas/' . $datos['empresa'] . '/' . $datos['proveedor'] . '/' . $datos['no_factura'] . '/';

            if ($request->has('factura')) {
                //Valida si el documento es pdf en caso contrario no permitira guardar el documento
                if ($request->file('factura')->guessExtension() == 'pdf') {
                    $request->file('factura')->storeAs($ruta, 'Factura.' . $request->file('factura')->guessExtension());
                    $datos_doc['tipo_doc_id'] = 1;
                    $datos_doc['ubicacion'] = $ruta . 'Factura.' . $request->file('factura')->guessExtension();
                    documentos::create($datos_doc);
                    //Valida si el checbox fue utilizado en caso contratrio no tomara en cuenta el campo
                    if ($request->has('form-field-checkbox')) {
                        //Valida si el checkbox fue seleccionado y confirma el dato del anexo de la factura que se guardara en la ruta especificada
                        if ($datos['form-field-checkbox'] == 'on') {
                            $request->file('anexo')->storeAs($ruta, 'Anexo.' . $request->file('factura')->guessExtension());
                            $datos_doc['tipo_doc_id'] = 2;
                            $datos_doc['ubicacion'] = $ruta . 'Anexo.' . $request->file('factura')->guessExtension();
                            documentos::create($datos_doc);
                        }
                    }
                }
            } else {
                $datos['factura'] = 'no se cargo un documento';
            }


            return redirect('/Facturas')->with('creacion_factura', $datos['no_factura']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
