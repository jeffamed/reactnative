<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if($buscar == ''){
            $clientes = Cliente::orderBy('idCliente','desc')
                                ->paginate(9);
        }else{
            $clientes = Cliente::where('clientes.'.$criterio,'like','%'.$buscar.'%')
                                ->orderBy('idCliente','desc')
                                ->paginate(9);
        }

        return[
            'pagination' => [
                'total'         => $clientes->total(),
                'current_page'  => $clientes->currentPage(),
                'per_page'      => $clientes->perPage(),
                'last_page'     => $clientes->lastPage(),
                'from'          => $clientes->firstItem(),
                'to'            => $clientes->lastItem(),
            ],
            'clientes'  =>  $clientes
        ];
    }

    public function seleccionar(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $clientes = Cliente::select('idCliente',DB::raw('concat(Nombre," ",Apellido) as Nombre'))
						   ->orderBy('Nombre','desc')
						   ->get();
        return ['clientes'=>$clientes];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if (!$request->ajax()) return redirect('/');
        $cliente = new Cliente();
        $cliente->idVendedor = $request->idVendedor;
        $cliente->Nombre = $request->Nombre;
        $cliente->Apellido = $request->Apellido;
        $cliente->Direccion = $request->Direccion;
        $cliente->Telefono = $request->Telefono;
        $cliente->Estado =  'Activo';
        $cliente->save();*/
        $campos=$request->all();
        $cliente = Cliente::create($campos);

        return response()->json(['cliente'=>$cliente],201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $cliente = Cliente::findOrFail($request->id);
        $cliente->idVendedor = $request->idVendedor;
        $cliente->Nombre = $request->Nombre;
        $cliente->Apellido = $request->Apellido;
        $cliente->Direccion = $request->Direccion;
        $cliente->Telefono = $request->Telefono;
        $cliente->Estado = 'Activo';
        $cliente->save();
    }

    public function desactivar(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $cliente = Cliente::findOrFail($request->id);
        $cliente->Estado = 'Inactivo';
        $cliente->save();
    }

    public function activar(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $cliente = Cliente::findOrFail($request->id);
        $cliente->Estado = 'Activo';
        $cliente->save();
    }

}
