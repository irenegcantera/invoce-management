<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('cliente.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nif = $request->nif;
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->poblacion = $request->poblacion;
        $cliente->provincia = $request->provincia;
        $cliente->cod_postal = $request->cod_postal;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;

        if($request->hasFile('avatar')){
            if($request->file('avatar')->isValid()){
                // $nameImage = $request->nif.'+'.$request->nombre.'.'.$request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')
                        ->storeAs('public/images/', $request->file('avatar')->getClientOriginalName());
                $cliente->avatar = $request->file('avatar')->getClientOriginalName();
            }
        }

        $cliente->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $facturas=Factura::where('cliente_id','=',$cliente->id)->paginate(10);
        return view('cliente.show', array(
            'cliente' => $cliente,
            'facturas' => $facturas));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->nif = $request->nif;
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->poblacion = $request->poblacion;
        $cliente->provincia = $request->provincia;
        $cliente->cod_postal = $request->cod_postal;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;

        $cliente->update();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}