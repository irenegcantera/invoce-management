<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Producto;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas=Factura::paginate(10);
        return view('factura.lista',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('factura.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new Factura();
        $cliente=Cliente::find($request->nombre);

        $factura->fecha = $request->fecha;
        $factura-> nombre = $cliente->nombre;
        $factura-> direccion = $request->direccion;
        $factura->cpostal = $request->cpostal;
        $factura->poblacion = $request->poblacion;
        $factura->provincia = $request->provincia;
        $factura->telefono = $request->telefono;
        $factura->cliente_id = $request->nombre;
        $factura->save();

        $productos=Producto::all();
        $clientes=Cliente::all();
        return redirect()->route('facturas.edit', compact('factura','productos','clientes'));
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
    public function edit($num)
    {
        $factura=Factura::find($num);
        $productos=Producto::all();
        $clientes=Cliente::all();
        return view('factura.factura',['factura'=>$factura,'productos'=>$productos,'clientes'=>$clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $num
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$numero)
    {
        $factura = Factura::find($numero);
        $cliente = Cliente::find($request->id_cliente);

        $factura->fecha = $request->fecha;
        $factura-> nombre = $cliente->nombre;
        $factura-> direccion = $cliente->direccion;
        $factura->cpostal = $cliente->cod_postal;
        $factura->poblacion = $cliente->poblacion;
        $factura->provincia = $cliente->provincia;
        $factura->telefono = $cliente->telefono;
        $factura->cliente_id = $request->id_cliente;
        
        // var_dump($factura);
        $factura->update();

        $productos=Producto::all();
        $clientes=Cliente::all();
        return redirect()->route('facturas.edit', compact('factura','productos','clientes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->back();
    }
}
