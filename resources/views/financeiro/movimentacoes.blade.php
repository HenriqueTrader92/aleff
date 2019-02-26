@extends('adminlte::page')

@section('title', 'Escolha o departamento')

@section('content_header')
    <h1>Escolha o departamento</h1>

    <ol class="breadcrumb">
        <li><a href="">dashboard</a></li>
        <li><a href="">Financeiro</a></li>
        <li><a href="">Movimentações</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Movimentação para o departamento:</h3>
        </div>
        <div class="box-body">
            @include('financeiro.includes.alerts')
            <form method="POST" action="{{ route('confirm.movimentacoes') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" name="sender" placeholder="Departamento" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Próxima Etapa</button>
                </div>
            </form>
        </div>
    </div>
@stop