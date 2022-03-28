
@csrf

<input type="text" name="cod_client" placeholder="Cliente" value="{{ $client->name ?? old('name')}}">
<input type="text" name="note" placeholder="Observação" value="{{ $product->name ?? old('name')}}">
<input type="date" name="dt_delivery" placeholder="Data prevista da entrega" value="{{ $product->name ?? old('name')}}">

<select class="form-select" aria-label="Default select example" name="cod_payment">
  <option selected>Selecionar</option>
    @foreach ($typePay as $pay)
      <option value="{{ $pay->id }}">{{ $pay->name }}</option>
    @endforeach
  </select>


<select class="form-select" aria-label="Default select example" name="status">
  <option selected>Selecionar</option>
  <option value="Aberto">Aberto</option>
  <option value="Fechado">Fechado</option>
  <option value="Aguardando aprovação">Aguardando aprovação</option>
  <option value="À entregar">À entregar</option>
</select>

<input type="text" name="sales" placeholder="Produto" value="{{ $product->name ?? old('name')}}">

<p>Frete</p>
<p>Desconto</p>
<p>Valor Total</p>

<p>usuario</p>

<button type="submit"> Cadastrar </button>

