@extends('layouts.app-print')
@section('content')
    
        @auth
        <div class="container data">
        <div class="infos row">
                <div class="col-4">
                        <img class="mb-4" src="{!! url('assets/images/logo.png') !!}" alt="" height="250px">
                </div>
                <div class="col-8">
                        <div class="row">
                                <div class="col-8">
                                        <span class="small-subtitle">G.W. COM. DE CONTAINER - EIRELI<br></span>
                                        
                                        R. NELSON R. MARCONDES, 120, BRCAO, 02<br>
                                        26.453.836/0001-35<br>
                                        (42)3624-3675
                                </div>
                                <div class="col-4">
                                        <span class="small-subtitle">Fatura de Locação</span><br>
                                        Nº <?=$fatura->id?><br>
                                        Emissão: <?=$fatura->data_emissao?>
                                </div>
                        </div>
                </div>
        </div>
        
        <div class="container">
                <span class="subtitle" style="text-align:left">Destinatário</span>
                <h4><strong>Razão Social / Nome Cliente: </strong><?=$cliente->nome?></h4>
                <h4><strong>CNPJ/CPF: </strong><?=$cliente->cpf?></h4>
                <h4><strong>Endereço: </strong><?=$cliente->endereco?></h4>
                <h4><strong>Cidade: </strong><?=$cliente->cidade?></h4>
                <h4><strong>Telefone: </strong><?=$cliente->telefone?></h4>               
                
        </div>
        <div class="container" style="margin-top: 5px;">
                <span class="subtitle">Dados da Locação</span>
                <h4><strong>Status:</strong> <?=$fatura->status?></h4>
                <h4><strong>Descrição:</strong> <?=$fatura->descricao?></h4>
                <h4 style="text-align:center"><strong>Valor Total da Fatura:</strong> R$<?=$fatura->valor?></h4>

        </div>
        <div class="container data">
        <?php if($fatura->observacao!=NULL){?><h4 class="centerinfo"><strong>Observação:</strong> <br><?=$fatura->observacao?></h4><?php }?>
                
        </div>
        </div>

        <style>
        .data{
                border-style: solid;
                border-width: 2px;
                
        }
        .titles{
                font-size: 70px;
        }
        .centerinfo{
                text-align:center;
        }
        .subtitle{
                text-align:left;
                font-size: 35px;
                font-weight: bold;
        }
        .small-subtitle{
                font-size: 30px;
                font-weight:bold;
        }
        h4{
                font-size: 25px;
        }

        </style>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    
@endsection