<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departamentos;

class Funcionarios extends Model
{
    public $timestamps = false;
    protected $table = 'funcionarios';

    public static function rules() {
        $rules = array(
            'departamentos' => "required",
            'name' => "required|max:200"
        );

        return $rules;
    }

    public static function customMsgRules () {
        $customMessages = [
            'required' => 'O campo " :attribute " é requerido.'
        ];

        return $customMessages;
    }

    public function departamentos() {
        return $this->belongsToMany(
            Departamentos::class,
            'func_departs',
            'id_func',
            'id_depart'
        );
    }
}
