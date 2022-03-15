@extends('layouts.app')

@section('title', 'Editar')

@section('content')
<h1>Editar usuário {{ $client->name }}</h1>

@if ($errors->any())
    <ul class="errors">
      @foreach($errors->all() as $error)
        <li class="error"> {{ $error }} </li>
      @endforeach
    </ul>
@endif

<form action="{{ route('clients.update', $client->id) }}" method="POST">
@csrf
@method('PUT')

  <input type="text" name="name" placeholder="Nome" value="{{ $client->name }}">
  <input type="email" name="email" placeholder="E-mail" value="{{ $client->email }}">
  <input type="number" name="cpf_cnpj" placeholder="CPF ou CNPJ" value="{{ $client->cpf_cnpj }}">

  <input type="checkbox" name="is_cpf" @if($client->is_cpf == false)checked @endif ><label>CNPJ</label>

  <input value="00110131-5540-4c45-91c0-31985d97a6ed" type="text" name="cod_city" placeholder="Cód. cidade">

  <button type="submit"> Cadastrar </button>

</form>
<a href="/clients"> Cancelar </a>
@endsection