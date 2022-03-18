@extends('layouts.app')
@section('content')

{{-- Campos vazios --}}
@if ($errors->any())
  <div class="alert alert-danger d-flex align-items-center position-fixed top-0 end-0 mt-4 me-4">
  <ul class="ps-0">
    @foreach ($errors->all() as $error)
      <li>
          <i class="bi bi-exclamation-triangle me-1"></i>
          {{ $error }}
      </li>
    @endforeach
  </ul>
  </div>
@endif

{{-- E-mail ou senha errada --}}
@if(session('danger'))
  <div class="alert alert-danger d-flex align-items-center position-fixed top-0 end-0" role="alert">
    <i class="bi bi-exclamation-triangle me-1"></i>
    <div>
      {{ session('danger') }}
    </div>
  </div>
@endif

<div class="container-ssm bg-info rounded-3 mt-3">
  <div class="card-img mx-auto pt-4" style="width: 80px;">  <img class="logo" src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="" srcset=""> </div>
  <div class="text-center mt-4 name-title"> Crud </div>
  <form action="/auth/do" class="p-3 mt-3"  method="POST">
    @csrf
    @method('POST')

    <div class="form-floating mb-3"> 
      <input class="form-control" type="email" name="email" id="email" placeholder="E-mail" value="wendell.priebe@gmail.com"> 
      <label  class=""  for="email">E-mail</label> 
    </div>

    <div class="form-floating mb-3"> 
      <input class="form-control" type="password" name="password" id="password" placeholder="Senha" value="123"> 
      <label  class="" for="password">Senha</label> 
    </div> 

    <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>

  </form>
  <div class="text-center fs-6 pb-4">
     <a href="/auth/password">Esqueceu a senha?</a> ou <a href="/auth/register">Criar conta</a>
  </div>
</div>

@endsection