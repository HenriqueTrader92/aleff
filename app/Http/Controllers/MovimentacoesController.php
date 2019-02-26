<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;

class MovimentacoesController extends Controller
{
    public function index()
    {
        return view('financeiro.movimentacoes');
    }
    
    public function confirmMovimentacoes(Request $request, Departamentos $departamentos)
    {
        if(!$sender = $departamentos->getSender($request->sender))
            return redirect()
                        ->back()
                        ->with('error', 'Departamento informado nao foi encontrado');

        // if ($sender->id === auth()->user()->id)
        //      return redirect()
        //                 ->back()
        //                 ->with('error', 'Não pode transferir para voce mesmo, seu animal');

        // $balance = auth()->user()->balance;
        $valor_depart = $departamentos->valor;

        return view('financeiro.movimentacao-confirmada', compact('sender', 'valor_depart')); 
    }

    public function deposit()
    {
        return view('financeiro.deposit');
    }

    public function depositStore(Request $request)
    {

        dd($request->all());
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->valor);

        if($response['success'])
            return redirect()
                ->route('admin.balance')
                ->with('success', $response['message']);
        return redirect()
                ->back()
                ->with('error', $response['message']);
    }
}
