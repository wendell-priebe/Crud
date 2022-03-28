@extends('layouts.app')

@section('title', 'Editar')

@section('content')
<h1>Editar usuário {{ $client->name }}</h1>

@include('includes.validations-form')

<form action="{{ route('clients.update', $client->id) }}" method="POST">
  @method('PUT')
  
  <input type="checkbox" name="is_cpf" @if($client->is_cpf == false)checked @endif ><label>CNPJ</label>
  @include('clients._partials.form')

</form>
<a href="/clients"> Cancelar </a>
@endsection