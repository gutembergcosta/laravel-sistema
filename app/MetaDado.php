<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



class Metadado extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nome','valor' 
    ];

   

}
