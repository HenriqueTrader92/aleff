@extends('adminlte::page')

@section('title', 'Novo depósito')

@section('content_header')
    <h1>Novo depósito</h1>

    <ol class="breadcrumb">
        <li><a href="">dashboard</a></li>
        <li><a href="">Financeiro</a></li>
        <li><a href="">Movimentação</a></li>
        <li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Fazer Depósito</h3>
        </div>
        <div class="box-body">
        @include('financeiro.includes.alerts')
            <form method="POST" action="{{ route('movimentacao.store') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" name="descricao" placeholder="Descrição do deposito" class="form-control" >
                </div>
                <div class="form-group">
                    <input type="text" name="valor" placeholder="Valor recarga" style="width:150px;" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Recarregar</button>
                </div>
            </form>
        </div>
    </div>
@stop