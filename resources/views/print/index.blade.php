@extends('layouts.app-print')
@section('content')
    
        @auth
        <div class="container" style="text-align: center;">
        <div class="infos">
                <img class="mb-4" src="{!! url('assets/images/logo.png') !!}" alt="" height="250px">
                <h2>Avenida Nome da Avenida, 1234, Guarapuava - PR</h2>
                <h2>(42) 99999-9999</h2>
                <h4 style="font-weight: bold;">12.345.678/0001-99</h4>
        </div>
        <span class="titles" style="margin-top: 30px;">Fatura de Locação</span>
        <div class="container data">
                <span class="subtitle">Informações do Cliente</span>
                <h4>Nome: <?=$cliente->nome?></h4>
                <h4>CPF: <?=$cliente->cpf?></h4>
                <h4>Telefone: <?=$cliente->telefone?></h4>
                <h4>Cidade: <?=$cliente->cidade?></h4>
        </div>
        <div class="container data" style="margin-top: 5px;">
                <span class="subtitle">Informações da Fatura</span>
                <h4>Status: <?=$fatura->status?></h4>
                <h4>Valor: <?=$fatura->valor?></h4>
                <h4>Descrição: <br><?=$fatura->descricao?></h4>
                <h4>Data de Criação: <?=$fatura->data_emissao?></h4>

        </div>
        </div>

        <style>
        .data{
                border-style: solid;
                border-width: 1px;
                
        }
        .titles{
                font-size: 60px;
        }
        .subtitle{
                font-size: 40px;
        }

        </style>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    
@endsection