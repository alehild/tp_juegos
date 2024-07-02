<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'titulo', 'descripcion', 'precio', 'year', 'consola', 'imagen',
    ];
/*
    public function since() :String
    {
       $carbon = \Carbon\Carbon::createFromFormat('y', $this->estreno);
       return $carbon->since();
    }*/
}

