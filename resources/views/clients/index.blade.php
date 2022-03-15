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
<ul>
  @foreach ($clients as $client)
      <li>
        {{ $client->name }} - 
        {{ $client->email }}
         | <a href="{{ route('clients.show', $client->id )}}"> Detalhes </a>
         | <a href="{{ route('clients.edit', $client->id )}}"> Editar </a>
      </li>
  @endforeach

</ul>
@endsection