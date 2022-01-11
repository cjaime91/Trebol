<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionProveedor;
use App\Models\areas;
use App\Models\proveedores;
use App\Models\tipo_factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipo_factura = tipo_factura::get();
        $areas = areas::get();
        if ($request->ajax()) {
            $datos = Proveedores::leftjoin("tb_areas AS areas", "tb_proveedores.area_id", "=", "areas.id")
                ->leftjoin("tb_tipo_factura AS tfact", "tb_proveedores.tipo_factura_id", "=", "tfact.id")
                ->orderBy("created_at", "DESC")
                ->get(["tb_proveedores.*", DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') AS fecha_c"), "areas.area", "tfact.tipo_factura"]);
            return DataTables::of($datos)->make(true);
        }
        return view('pages.proveedores.proveedores', compact('tipo_factura', 'areas'));
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
    public function store(ValidacionProveedor $request)

    {
        $datos = $request->all();
        proveedores::create($datos);
        return redirect('/Proveedores')->with('creacion_proveedor', $datos['razon_social']);
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
        $datos = $request->all();
        proveedores::findOrFail($id)->update($datos);
        return redirect('/Proveedores')->with('actualizacion_proveedor', $datos['razon_social']);
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

    public function getNit(Request $request)
    {
        try {
            $prov = $request->input('proveedor_id');
            $nit = proveedores::when($prov, function ($query) use ($prov) {
                $query->where('id', $prov);
            })->get();
            $response = ['data' => $nit];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Error al traer registros'], 500);
        }
        return response()->json($response);
    }

    public function getTipo_factura(Request $request)
    {
        try {
            $proveedor = $request->input('proveedor_id');
            $tipo_factura = proveedores::join("tb_tipo_factura AS tfact", "tb_proveedores.tipo_factura_id", "=", "tfact.id")
            ->when($proveedor, function ($query) use ($proveedor) {
                $query->where('tb_proveedores.id', $proveedor);
            })->get();
            $response = ['data' => $tipo_factura];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Error al traer registros'], 500);
        }
        return response()->json($response);
    }

    public function getArea(Request $request)
    {
        try {
            $proveedor = $request->input('proveedor_id');
            $tipo_factura = proveedores::join("tb_areas AS areas", "tb_proveedores.area_id", "=", "areas.id")
            ->when($proveedor, function ($query) use ($proveedor) {
                $query->where('tb_proveedores.id', $proveedor);
            })->get();
            $response = ['data' => $tipo_factura];
        } catch (\Exception $exception) {
            return response()->json(['message' => 'Error al traer registros'], 500);
        }
        return response()->json($response);
    }
}
