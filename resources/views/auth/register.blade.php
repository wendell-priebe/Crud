@extends('home')
@section('container')

<div class="container-ssm bg-info rounded-3">
  <div class="card-img mx-auto pt-4" style="width: 80px;">  <img class="logo" src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="" srcset=""> </div>
  <div class="text-center mt-4 name-title"> Crud </div>
  <form action="/auth/register/do" class="p-3 mt-3"  method="POST">
    @csrf

    <div class="form-floating mb-3"> 
      <input class="form-control" type="text" name="name" id="name" placeholder="Usuário"> 
      <label  class=""  for="name">Nome</label> 
    </div>

    <div class="form-floating mb-3"> 
      <input class="form-control" type="email" name="email" id="email" placeholder="E-mail"> 
      <label  class=""  for="email">E-mail</label> 
    </div>

    <div class="form-floating mb-3"> 
      <input class="form-control" type="password" name="password" id="password" placeholder="Senha"> 
      <label  class="" for="password">Senha</label> 
    </div> 
    <div class="form-floating mb-3"> 
      <input class="form-control" type="password" name="password" id="password" placeholder="Confirmar senha"> 
      <label  class="" for="password">Confirmar senha</label> 
    </div> 

    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="admin" name="admin">
      <label class="form-check-label" for="admin">
        Administrador
      </label>
    </div>

    <button type="submit" class="btn btn-primary" style="width: 100%;">Registrar</button>

  </form>
  <div class="text-center fs-6 pb-4">
     <a href="/auth/password">Esqueceu a senha?</a> ou <a href="/auth">Login</a>
  </div>
</div>

@endsection