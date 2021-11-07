@extends('layouts.app-print')
@section('content')
    
        @auth
        <h1 style="text-align: center;">INFORMAÇÕES DA FATURA</h1>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    
@endsection