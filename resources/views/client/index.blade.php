@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Cadastro de Cliente</h1>
        <form method="post" action="{{ route('client.create') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome do Cliente" required="required" autofocus>
            <label for="floatingEmail">Nome do Cliente</label>
            @if ($errors->has('nome'))
                <span class="text-danger text-left">{{ $errors->first('nome') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" pattern="\d*" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="12312312356" required="required">
            <label for="floatingCPF">CPF</label>
            @if ($errors->has('cpf'))
                <span class="text-danger text-left">{{ $errors->first('cpf') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone do Cliente" required="required">
            <label for="floatingTelefone">Telefone</label>
            @if ($errors->has('telefone'))
                <span class="text-danger text-left">{{ $errors->first('telefone') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" placeholder="Nome do Endereço do Cliente" required="required">
            <label for="floatingEndereco">Endereço</label>
            @if ($errors->has('Endereco'))
                <span class="text-danger text-left">{{ $errors->first('Endereco') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" placeholder="Cidade do Cliente" required="required">
            <label for="floatingTelefone">Cidade</label>
            @if ($errors->has('Cidade'))
                <span class="text-danger text-left">{{ $errors->first('Cidade') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
        
        @include('auth.partials.copy')
    </form>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection