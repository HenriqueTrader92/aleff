<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Funcionarios;

class Departamentos extends Model
{
    public $timestamps = false;
    protected $table = 'departamentos';

    public static function rules() {
        $rules = array(
            'name' => "max:100|required"
        );

        return $rules;
    }

    public function funcionarios() {
        return $this->belongsToMany(
            Funcionarios::class,
            'func_departs',
            'id_func',
            'id_depart'
        );
    }

    public function getSender($sender)
    {
        return $this->where('name', 'LIKE', "%$sender%")
                    ->get()
                    ->first();
    }

    public function deposit(float $valor) : Array
    {
        DB::beginTransaction();

        $totalBefore = $this->valor ? $this->valor : 0;
        $this->valor += number_format($valor, 2 , '.', '');
        $deposit = $this->save();

        // parou aqui...
        $historic = auth()->user()->historics()->create([
            'type'         => 'I',
            'amount'       => $value,
            'total_before' => $totalBefore,
            'total_after'  => $this->amount,
            'date'         => date('Ymd'),
        ]);

        if($deposit && $historic){

            DB::commit();
            
            return [
                    'success' => true,
                    'message' => 'Sucesso ao recarregar'
            ];
        } else {

                DB::rollback();

                return [
                    'success' => false,
                    'message' => 'Falha ao recarregar'
                ];
        }
    }
}
