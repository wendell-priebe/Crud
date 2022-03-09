@extends('home')
@section('container')

<div class="container-ssm bg-info rounded-3">
  <div class="card-img mx-auto pt-4" style="width: 80px;">  <img class="logo" src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="" srcset=""> </div>
  <div class="text-center mt-4 name-title"> Crud </div>
  <form action="/Login/" class="p-3 mt-3"  method="POST">
    @csrf
    @method('POST')

    <div class="form-floating mb-3"> 
      <input class="form-control" type="text" name="userName" id="userName" placeholder="Usuário"> 
      <label  class=""  for="userName">Usuário</label> 
    </div>

    <div class="form-floating mb-3"> 
      <input class="form-control" type="password" name="password" id="password" placeholder="Senha"> 
      <label  class="" for="password">Senha</label> 
    </div> 

    <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>

  </form>
  <div class="text-center fs-6 pb-4">
     <a href="#">Esqueceu a senha?</a> ou <a href="#">Criar conta</a>
  </div>
</div>

@endsection