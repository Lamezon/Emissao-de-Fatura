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
                    <td><a href="/fatura/<?=$row['id']?>"><?php 
                     switch ($row['status']) {
                        case '1':
                            ?>
                            <button type="button" class="btn btn-primary btn-block" aria-pressed="false" autocomplete="off">Salvo</button><?php
                            break;
                        case '2':
                            ?>
                            <button type="button" class="btn btn-success btn-block" aria-pressed="false" autocomplete="off">Faturado</button><?php
                            break;
                        case '3':
                            ?>
                            <button type="button" class="btn btn-danger btn-block" aria-pressed="false" autocomplete="off">Cancelado</button><?php
                            break;
                    }      $row['status']
                    ?></a></td>
                    <td><a href="/imprimir/<?=$row['id']?>"><i class="fas fa-2x fa-print"></i></a></td>
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