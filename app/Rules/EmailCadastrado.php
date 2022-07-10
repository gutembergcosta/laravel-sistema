<?php

namespace App\Rules;
use App\Cadastro;
use App\User;

use Illuminate\Contracts\Validation\Rule;

class EmailCadastrado implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return (Cadastro::where('email', $value)->first() || User::where('email', $value)->first() ) ? false : true;
    }


    public function message()
    {
        return 'Este email já está cadastrado';
    }
}
