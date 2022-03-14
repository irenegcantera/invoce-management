<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Producto;

class AjaxController extends Controller
{
    public function producto(Request $request){

        $producto=Producto::find($request->input('id'));
        return response(json_encode($producto),200);
    }

    public function cliente(Request $request)
    {
        $cliente = Cliente::find($request->input('id'));
        return response(json_encode($cliente),200);
    }
}

?>