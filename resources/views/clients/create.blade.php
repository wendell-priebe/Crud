@extends('layouts.app')

@section('title', 'Cadastro')

@section('content')
<h1>Cadastrar usuário</h1>

@include('includes.validations-form')

<form action="{{ route('clients.store') }}" method="POST">
  @method('POST')
  <input type="checkbox" name="is_cpf" ><label>CNPJ</label>
  @include('clients._partials.form')

</form>
<a href="/clients"> Cancelar </a>
@endsection