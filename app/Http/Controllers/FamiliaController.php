<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use App\Models\Producto;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familias = Familia::paginate(10);
        return view('familia.index',compact('familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('familia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $familia = new Familia();
        $familia->nombre = $request->nombre;
        $familia->descripcion = $request->descripcion;

        $familia->save();

        return redirect()->route('familias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show(Familia $familia)
    {
        $productos=Producto::where('familia_id', '=', $familia->id)->paginate(10);
        return view('familia.show', compact('familia','productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia $familia)
    {
        return view('familia.edit', compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia $familia)
    {
        $familia->nombre = $request->nombre;
        $familia->descripcion = $request->descripcion;

        $familia->update();

        return redirect()->route('familias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        $familia->delete();
        return redirect()->route('familias.index');
    }
}
