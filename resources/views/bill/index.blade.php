@extends('layouts.app-master')
@section('content')
    <div class="bg-light p-5 rounded">
        
        @auth
        <h1 style="text-align: center;">Emitir Fatura</h1>
        <div class="table-responsive">
        <form method="post" action="{{ route('bill.create') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="data" value="<?=date("d-m-Y")?>"/>
        <h4 style="text-align: center;">Cliente</h4> 
            <select id="cliente" name="cliente" class="form-select" size="6" style="width: 100%;">
                <?php 
                foreach ($clientes as $row)  
                { ?>
                    <option value=<?=$row['id']?>>#<?=$row['id']?> - <?=$row['nome']?> - <?=$row['cpf']?></option>
            <?php } ?>
            </select>
            
        
            <table class="table table-striped table-hover table-bordered table-sm border-light">
            <thead>
                <tr>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor(R$)</th>       
                </tr>
            </thead>
        <?php
             foreach ($produtos as $row)  
             { ?>
                 <tr  style="text-align: center;">
                    <td><?= $row['nome']?></td>  
                    <td><?= (($row['valor'])+($row['taxa']))?></td>
                    <td>
                        <button type="button" class="button btn-success hollow circle" dataValor="<?= (($row['valor'])+($row['taxa']))?>" data-quantity="plus" dataTotal="<?=$row['id']?>" data-field="quantity<?=$row['id']?>">
                             <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <input min="0" disabled class="input-group-field" type="number" dataValor="<?= (($row['valor'])+($row['taxa']))?>" name="quantity<?=$row['id']?>" value="0">
                        <button type="button" class="button btn-danger hollow circle" dataValor="<?= (($row['valor'])+($row['taxa']))?>" data-quantity="minus" dataTotal="<?=$row['id']?>" data-field="quantity<?=$row['id']?>">
                             <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </td>
                    <td>
                        <input min="0" class="input-group-field valorTotal subtotal" data-id="total" data-value="0" type="text" style="text-align: center;" name="total<?=$row['id']?>" value="0" >
                    </td>
                 </tr>  
             <?php } ?>
             <tr><td></td></tr>
             <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td scope="col" style="text-align: center;">R$<span><input style="text-align: center;" id="val" name="totalFatura" type="text"></span></td>
             </tr>
        </table>
        <button class="btn btn-block btn-info">GERAR FATURA</button>
        </form>
        </div>
    <script>
        jQuery(document).ready(function(){
    // This button will increment the value
    $('[data-quantity="plus"]').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        fieldTotal = $(this).attr('dataTotal');
        fieldValor = $(this).attr('dataValor');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        var currentValTotal = parseFloat($('input[name=total'+fieldTotal+']').val());

      
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
            $('input[name=total'+fieldTotal+']').val(parseFloat((parseFloat(currentValTotal))+(parseFloat(fieldValor))).toFixed(2));
            changeTotal();
            
        } else {
            // Otherwise put a 0 there
            $('input[name=total'+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        fieldTotal = $(this).attr('dataTotal');
        fieldValor = $(this).attr('dataValor');
        // Get its current value
        var currentVal = parseFloat($('input[name='+fieldName+']').val());
        var currentValTotal = parseFloat($('input[name=total'+fieldTotal+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
            $('input[name=total'+fieldTotal+']').val(parseFloat((parseFloat(currentValTotal))-(parseFloat(fieldValor))).toFixed(2));
            changeTotal();
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    function changeTotal(){

        var TotalValue = 0;

        /* console.log(total[0].value); */
        $("tr .subtotal").each(function(index,value)
        {
            var valor = this.value;
            currentRow = parseFloat($(this).text());
            console.log(currentRow);
            TotalValue += parseFloat(valor);
        });

        console.log(TotalValue);
        document.getElementById('val').value = parseFloat(TotalValue).toFixed(2);
                        
    }
});

    </script>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection