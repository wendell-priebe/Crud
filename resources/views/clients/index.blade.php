@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
<div>
  <h1>
    Listagem de clientes
    (<a href="{{ route('clients.create') }}">Novo(+)</a>)
  </h1>
  <form action="{{ route('clients.index') }}" method="GET">
    <input type="text" name="search" placeholder="Pesquisar">
    <button>Pesquisar</button>
  </form>
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
@endsection