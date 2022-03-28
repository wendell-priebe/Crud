@extends('layouts.app')

@section('title', 'Vendas')

@section('content')


<div class="d-flex mt-2 align-items-center justify-content-around">
  <h1>
    Listagem de vendas
  </h1>

  <form action="{{ route('orders.index') }}" method="GET" class="d-flex">
    <input type="text" name="search" placeholder="Pesquisar" class="form-control">
    <button  class="btn btn-primary">Pesquisar</button>
  </form>

  <h1>
    <a href="{{ route('orders.create') }}" class="">
      <i class="bi bi-bag-plus-fill"></i>
    </a>
  </h1>
</div>

<table class="table">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Estatus</th>
      <th>Data</th>
      <th>Desconto</th>
      <th>Valor Total</th>
      <th>Vendedor</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orderSales as $orders)
        <tr>
          <td>{{ $orders->client }}</td>
          <td>{{ $orders->status }}</td>
          <td>{{ $orders->dt_order }}</td>
          <td>{{ $orders->discount_value }}</td>
          <td>{{ $orders->amount }}</td>
          <td>{{ $orders->user }}</td>
          <td> <a href=""> Editar </a> </td>
        </tr>
    @endforeach
  </tbody>
</table>

{{ $orderSales->links("pagination::bootstrap-5") }}


@endsection