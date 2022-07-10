<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PasswordReset extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token', 'email', 'created_at',
    ];

    
    public function userContatos()
    {
        return $this->hasMany(UserContato::class); 
    }


    
}
