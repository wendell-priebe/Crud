
@csrf
<input type="text" name="name" placeholder="Nome" value="{{ $client->name ?? old('name')}}">
<input type="email" name="email" placeholder="E-mail" value="{{ $client->email ?? old('email')}}">
<input type="number" name="cpf_cnpj" placeholder="CPF ou CNPJ" value="{{ $client->cpf_cnpj ?? old('cpf_cnpj')}}">

{{-- <input type="checkbox" name="is_cpf"  @if(isset($client->is_cpf))@checked(true) @else @checked(false)  @endif > --}}
{{-- @if($client->is_cpf == false) --}}
{{-- <label>CNPJ</label> --}}

<input value="00110131-5540-4c45-91c0-31985d97a6ed" type="text" name="cod_city" placeholder="Cód. cidade">

<button type="submit"> Cadastrar </button>

