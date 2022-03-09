<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Linea;
use App\Models\Producto;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $linea = new Linea();
        $linea->producto = $request->descripcion;
        $linea->cantidad = $request->cantidad;
        $linea->precio = $request->precio;
        $linea->factura_numero = $request->factura_numero;
        $linea->producto_id = $request->producto_id;
        $linea->save();

        $factura=Factura::find($request->factura_numero);
        return redirect()->route('facturas.edit',compact('factura'));
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
     * @param  \App\Models\Linea $linea
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Linea $linea)
    {
        $factura=Factura::find($linea->factura_numero);
        $productos=Producto::all();
        return view('factura',['factura'=>$factura,'productos'=>$productos,'lineaEdit'=>$linea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Linea $linea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Linea $linea)
    {
        $linea->producto = $request->descripcion;
        $linea->cantidad = $request->cantidad;
        $linea->precio = $request->precio;
        $linea->factura_numero = $request->factura_numero;
        $linea->producto_id = $request->product_id;
        $linea->update();

        $factura=Factura::find($request->factura_numero);
        $productos=Producto::all();
        return view('factura',['factura'=>$factura,'productos'=>$productos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Linea $linea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Linea $linea)
    {
        $linea->delete();
        return redirect()->back();
    }
}
