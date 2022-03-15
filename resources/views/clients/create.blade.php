@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<h1>Cadastrar usuário</h1>

@if ($errors->any())
    <ul class="errors">
      @foreach($errors->all() as $error)
        <li class="error"> {{ $error }} </li>
      @endforeach
    </ul>
@endif

<form action="{{ route('clients.store') }}" method="POST">
@csrf

  <input type="text" name="name" placeholder="Nome">
  <input type="email" name="email" placeholder="E-mail">
  <input type="number" name="cpf_cnpj" placeholder="CPF ou CNPJ">
  <input type="checkbox" name="is_cpf" ><label>CNPJ</label>
  {{-- <input type="checkbox" name="is_cpf" @if(value != null) 'is_cpf'=>'false' @else 'is_cpf'=>'true' @endif ><label>CNPJ</label> --}}

  <input value="00110131-5540-4c45-91c0-31985d97a6ed" type="text" name="cod_city" placeholder="Cód. cidade">

  <button type="submit"> Cadastrar </button>

</form>
<a href="/clients"> Cancelar </a>
@endsection