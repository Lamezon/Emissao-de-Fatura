@extends('layouts.app-master')

@section('content')
<?php
                foreach ($faturas as $row)  
                {  
                    ?><tr>
                    <button class="btn btn-block btn-info"><?= $row['email']?></button>
                <?php } ?>

               
@endsection