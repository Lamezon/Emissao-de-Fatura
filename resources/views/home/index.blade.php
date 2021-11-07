@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Lista de Faturas</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm border-light">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Cliente</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($faturas as $row)  
                {  
                    ?><tr>
                    <td><?= $row['id']?></td>   
                    <td><?= $row['nome']?></td>  
                    <td><?= $row['observacao']?></td>  
                    <td><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off"><?php 
                     switch ($row['status']) {
                        case '1':
                            echo "Salvo"; //azul
                            break;
                        case '2':
                            echo "Faturado"; //verde
                            break;
                        case '3':
                            echo "Cancelado"; //vermelho
                            break;
                    }      $row['status']
                    ?></button></td>
                    <td><i class="fas fa-2x fa-print"></i></td>
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