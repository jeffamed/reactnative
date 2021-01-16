<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use Illuminate\Support\Facades\DB;

class VendedorController extends Controller
{
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio; 

        if($buscar == ''){
            $vendedor = Vendedor::orderBy('idVendedor','desc')->paginate(7);
        }else{
            $vendedor = Vendedor::where($criterio,'like','%'.$buscar.'%')->orderBy('idVendedor','desc')->paginate(7);
        }

        return[
            'pagination' => [
                'total'         => $vendedor->total(),
                'current_page'  => $vendedor->currentPage(),
                'per_page'      => $vendedor->perPage(),
                'last_page'     => $vendedor->lastPage(),
                'from'          => $vendedor->firstItem(),
                'to'            => $vendedor->lastItem(),
            ],
            'vendedor'  =>  $vendedor
        ];
    }

    public function seleccionar(Request $request)
    {
         //if (!$request->ajax()) return redirect('/');
        $filtro = $request->filtro;
        $vendedor = Vendedor::where('Estado','=','Activo')
                            -> select('idVendedor','Nombre')
                            -> orderBy('Nombre','desc')
                            -> get();
        return ['vendedor'=>$vendedor];
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
         $vendedor = new Vendedor();
         $vendedor->Nombre = $request->Nombre;
         $vendedor->Telefono = $request->Telefono;
         $vendedor->Estado = 'Activo';
         $vendedor->save();*/
        $campos=$request->all();
        $vendedor = Vendedor::create($campos);

        return response()->json(['vendedor'=>$vendedor],201);
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
        $vendedor = Vendedor::findOrFail($request->id);
        $vendedor->Nombre = $request->Nombre;
        $vendedor->Telefono = $request->Telefono;
        $vendedor->Estado = 'Activo';
        $vendedor->save();
    }

    public function desactivar(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $vendedor = Vendedor::findOrFail($request->id);
        $vendedor->Estado = 'Inactivo';
        $vendedor->save();
    }

    public function activar(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');
        $vendedor = Vendedor::findOrFail($request->id);
        $vendedor->Estado = 'Activo';
        $vendedor->save();
    }
}
