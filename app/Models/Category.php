<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    //Devuelve los articulos de una categoria
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
