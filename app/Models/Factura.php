<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Linea;

class Factura extends Model
{
    use HasFactory;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey='numero';

    public function lineas(){
        return $this->hasMany('App\Models\Linea');
    }

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function getImporteTotal(){
        $lineas = $this->lineas()->get();
        $suma = 0;
        foreach($lineas as $linea){
            $suma += $linea->precio*$linea->cantidad;
        }
        return $suma;
    }
}
