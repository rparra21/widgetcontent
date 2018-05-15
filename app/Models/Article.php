<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{


    //Devuelve categoria a la que pertenece
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
