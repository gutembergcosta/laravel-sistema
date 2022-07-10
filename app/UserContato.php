<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



class UserContato extends Model
{

    public $timestamps = false;


    protected $fillable = [
        'tipo',
        'valor',
        'opcao',
        'ordem',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

}
