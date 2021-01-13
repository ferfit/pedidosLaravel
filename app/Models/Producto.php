<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion','imagen','categoria_id','precio'
    ];


    use HasFactory;

    //Relacion 1:n inversa
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    //query scope
    public function scopeCategory($query,$category_id){
        if($category_id){
            return $query->where('categoria_id',$category_id);
        }
    }
}
