@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb">
        <li><a href="">dashboard</a></li>
        <li><a href="">Financeiro</a></li>
        <li><a href="">Movimentações</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <!-- <a href="{{ route('') }}" class="btn btn-primary"> <i class="fa fa-arrow-circle-right"></i> Depositar</a>
            @if($amount >0)
                <a href="{{ route('') }}" class="btn btn-danger"> <i class="fa fa-arrow-circle-right"></i> Sacar</a>
            @endif -->
        </div>
        <div class="box-body">
        @include('financeiro.includes.alerts')
            <div class="small-box bg-green">
                <div class="inner">
                <h3>R$ {{number_format($valor_depart,2 , '.', '')}}</h3>
                </div>
                <div class="icon">
                <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">Histórico <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop