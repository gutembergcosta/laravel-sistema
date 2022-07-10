<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function arquivos()
    {
        return $this->hasMany(Arquivo::class, 'ref', 'ref'); //'foreign_key', 'local_key'
    }

    public function userDados()
    {
        return $this->hasOne(UserDado::class); 
    }

    public function proposta()
    {
        return $this->hasOne(Proposta::class); 
    }

    public function userContatos()
    {
        return $this->hasMany(UserContato::class); 
    }


    
}
