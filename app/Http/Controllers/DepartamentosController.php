<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;
use App\Models\Funcionarios;

class DepartamentosController extends Controller
{
    protected $departamentos;
    protected $funcionarios;

    public function __construct(Departamentos $departamentos,Funcionarios $funcionarios){
        $this->departamentos = $departamentos;
        $this->funcionarios = $funcionarios;
    }

    public function index()
    {
        return view('cadastros.departamentos');
    }

    public function cadDepartamento(Request $request)
    {
        $this->validate($request,Departamentos::rules());

        $novoDepartamento = $this->departamentos;
        $novoDepartamento->name = $request->name;
        $novoDepartamento->save();
        
        return redirect()->back()->with([
            'success'=>'Departamento '.$request->name.' criado com sucesso'
        ]);
        //return view('departamento.cadastra');
    }
}
