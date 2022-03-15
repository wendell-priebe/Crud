@extends('layouts.app')

@section('title', 'Usuário')

@section('content')
<h1>Listagem do {{ $client->name }}</h1>

<ul>
  <li>{{ $client->name }}</li>
  <li>{{ $client->email }}</li>
  <li>{{ $client->cpf_cnpj }}</li>
</ul>

<form action="{{ route('clients.destroy', $client->id) }}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit">Deletar</button>
</form>

<a href="/clients"> Voltar </a>
@endsection