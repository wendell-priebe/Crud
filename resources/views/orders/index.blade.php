@extends('layouts.app')

@section('title', 'Vendas')

@section('content')
<div>
  <h1>
    Listagem de vendas
    {{-- (<a href="{{ route('clients.create') }}">Novo(+)</a>) --}}
  </h1>
  <form action="{{ route('orders.index') }}" method="GET">
    <input type="text" name="search" placeholder="Pesquisar">
    <button>Pesquisar</button>
  </form>
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
@endsection