@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Lista de Produtos</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Taxa</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($produtos as $row)  
                {  
                    ?><tr>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['nome']?></td>  
                    <td><?= $row['descricao']?></td>
                    <td><?= $row['valor']?></td>
                    <td><?= $row['taxa']?></td> 
                    </tr>  
                <?php } ?>
                </tbody>

            </table>
        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection