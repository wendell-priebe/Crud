@extends('layouts.app')

@section('title', 'Vendas')

@section('content')


<div class="d-flex mt-2 align-items-center justify-content-around">
  <h1>
    ADICIONAR
  </h1>
</div>

<form action="{{ route('orders.store') }}" method="POST" class="row g-3 align-items-center">
  @method('POST')

  @include('orders._partials.form')

</form>

<a href="/orders"  class="btn btn-danger"> Cancelar </a>

@endsection