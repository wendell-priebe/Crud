@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div>
  <h1>
    Listagem de Produtos
    (<a href="{{ route('products.create') }}">Novo(+)</a>)
  </h1>
  <form action="{{ route('products.index') }}" method="GET">
    <input type="text" name="search" placeholder="Pesquisar">
    <button>Pesquisar</button>
  </form>
</div>

<table class="table">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Inventario</th>
      <th>Valor</th>
      <th>Detalhes</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
        <tr>
          <td>{{ $product->name }}</td>
          <td>{{ $product->inventory }}</td>
          <td>{{ $product->value }}</td>
          <td> <a href="{{ route('products.show', $product->id )}}"> Detalhes </a> </td>
          <td> <a href="{{ route('products.edit', $product->id )}}"> Editar </a> </td>       
        </tr>
    @endforeach
  </tbody>

</table>
@endsection