@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1 style="text-align: center;">Fatura #<?=$fatura->id?></h1>
        <form>
            <div class="form-group">
            <label class="text-center">Código de Identificação</label>
            <input disabled type="text" class="form-control" value=<?=$fatura->id?>>
            </div>
            
            <div class="form-group">
            <label class="text-center">Nome do Cliente</label>
            <input disabled type="text" class="form-control" value=<?=$fatura->nome?>>
            </div>

            <div class="form-group">
            <label class="text-center">Valor Total</label>
            <input disabled type="text" class="form-control" value="R$<?=$fatura->valor?>">
            </div>

            <div class="form-group">
            <label class="text-center">Descrição da Fatura</label>
            
            <textarea disabled class="form-control" rows="6" value="R$<?=$fatura->descricao?>"><?=$fatura->descricao?></textarea>
            </div>
            
            <div class="form-group">
            <label class="text-center">Observação da Fatura</label>
            <input disabled type="text" class="form-control" value=<?=$fatura->observacao?>>
            </div>
            
            <div class="form-group">
            <label class="text-center">Data da Criação da Emissão</label>
            <input disabled type="text" class="form-control" value=<?=$fatura->data_emissao?>>
            </div>

            <div class="form-group">
            <label class="text-center">Código do Status</label>
            <input disabled type="text" class="form-control" value=<?=$fatura->status?>>
            </div>
            
        </form>
        <?php
            //Se Status for Criado
            if($fatura->status==1){
            ?>
           <form method="post" action="/emitir/<?=$fatura->id?>">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-block btn-success">Emitir</button>
            </form>
            <br>
            <form method="post" action="/cancelar/<?=$fatura->id?>">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-block btn-danger">Cancelar Fatura</button>
            </form>
            <br>
            <a href="/"><span class="btn btn-block btn-primary">Voltar</span></a>
            <?php
            //Se o status for Cancelado ou Emitido
            } else {
                ?>
                <a href="/"><span class="btn btn-block btn-primary">Voltar</span></a>
                <?php
            }

            ?>
<br><br><br>
            <form method="post" action="/apagar/<?=$fatura->id?>">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-block btn-dark">APAGAR FATURA</button>
            </form>


        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection