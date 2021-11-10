@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Lista de Clientes</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Cliente</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Cidade</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($clientes as $row)  
                {  
                    ?><tr>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['nome']?></td>  
                    <td><?= $row['cpf']?></td>
                    <td><?= $row['telefone']?></td>
                    <td><?= $row['endereco']?></td> 
                    <td><?= $row['cidade']?></td> 
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