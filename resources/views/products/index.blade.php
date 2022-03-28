@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

<div class="d-flex mt-2 align-items-center justify-content-around">
  <h1>
    Listagem de Produtos
  </h1>

  <form action="{{ route('products.index') }}" method="GET" class="d-flex">
    <input type="text" name="search" placeholder="Pesquisar" class="form-control">
    <button  class="btn btn-primary">Pesquisar</button>
  </form>

  <h1>
    <a href="{{ route('products.create') }}" class="" alt="Adicionar Produto">
      <i class="bi bi-file-plus-fill"></i>
    </a>
  </h1>
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

{{ $products->links("pagination::bootstrap-5") }}

@endsection