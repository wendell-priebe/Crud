@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
<div class="d-flex mt-2 align-items-center justify-content-around">
  <h1>
    Listagem de clientes
  </h1>

  <form action="{{ route('clients.index') }}" method="GET" class="d-flex">
    <input type="text" name="search" placeholder="Pesquisar" class="form-control">
    <button  class="btn btn-primary">Pesquisar</button>
  </form>

  <h1>
    <a href="{{ route('clients.create') }}" class="">
      <i class="bi bi-person-plus-fill"></i>
    </a>
  </h1>
</div>

<table class="table">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Email</th>
      <th>CPF/CNPJ</th>
      <th>Telefone</th>
      <th>Detalhes</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clients as $client)
        <tr>
          <td>{{ $client->name }}</td>
          <td>{{ $client->email }}</td>
          <td>{{ $client->cpf_cnpj }}</td>
          <td>{{ $client->phone }}</td>
          <td> <a href="{{ route('clients.show', $client->id )}}"> Detalhes </a> </td>
          <td> <a href="{{ route('clients.edit', $client->id )}}"> Editar </a> </td>       
        </tr>
    @endforeach
  </tbody>
</table>

{{ $clients->links("pagination::bootstrap-5") }}


@endsection