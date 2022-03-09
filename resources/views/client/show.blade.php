@extends('layouts.app-master')

@section('content')

    <div class="bg-light p-5 rounded">
        @auth
        <h1>Lista de Clientes</h1>
        <div class="table-responsive">
            <table id="table" style="text-align:center" class="table table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Email</th>
                    <th scope="col">Inscrição Estadual</th>
                    <th></th>
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
                    <td><?= $row['email']?></td>
                    <td><?= $row['inscricao']?></td>
                    <td><a href="lista-clientes/<?=$row['id']?>"><button style="width:100%" class="btn btn-info">Editar</button></a></td>
                   
                    </tr>  
                <?php } ?>
                </tbody>

            </table>
        </div>
    
        <style>
            .table td {
                font-size: 13px;
            }
        </style>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection