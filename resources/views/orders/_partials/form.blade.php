
@csrf

<div>
  <label for="cod_client">Nome - CPF/CNPJ</label>
  <select class="form-select" aria-label="Default select example" name="cod_client">
    <option selected>Selecionar</option>
    @forEach ($clients as $client)
      <option value="{{ $client->id }}">{{ $client->name }} - {{ $client->cpf_cnpj }}</option>
    @endforeach
  </select>
</div>

<label  for="note">Observações</label>
<input class="form-control" type="text" name="note" placeholder="Observação" value="">

{{-- <label for="date">Data da entrega</label>
<input type="date" name="dt_delivery" placeholder="Data prevista da entrega" value=""> --}}

<label for="cod_payment">Tipo de pagamento</label>
<select class="form-select" aria-label="Default select example" name="cod_payment">
  <option selected>Selecionar</option>
    @foreach ($typePay as $pay)
      <option value="{{ $pay->id }}">{{ $pay->name }}</option>
    @endforeach
  </select>

<label for="status">Status do pedido</label>
<select class="form-select" aria-label="Default select example" name="status">
  <option selected>Selecionar</option>
  <option value="Aberto">Aberto</option>
  <option value="Fechado">Fechado</option>
  <option value="Aguardando aprovação">Aguardando aprovação</option>
  <option value="À entregar">À entregar</option>
</select>

<div>
  <label for="product">Produtos - Valor</label>
  <select class="form-select" aria-label="Default select example" name="product" id="product">
    <option>Selecionar</option>
    @forEach ($products as $product)
      <option id="{{ $product->value }}"  value="{{ $product->id }}">{{ $product->name }} - R${{ $product->value }}</option>
    @endforeach
  </select>

  <label for="qtde">Quantidade</label>
  <input id="qtde"  name="qtde" value="" placeholder="">

</div>

{{-- @include('orders._partials.table') --}}

@php
  $totalUnid = 0;
  $total_pedido = $totalUnid; 
  $discount_value = 0;
  $freight_value = 0;
@endphp

<div class="d-flex ">
  <input id="freight_value" type="number" name="freight_value" placeholder="Frete" value="0">
  <input id="discount_value" type="number" name="discount_value" placeholder="Desconto" value="0">
  <a onclick="somaTotal()" class="btn btn-warning">Somar</a>
</div>

<div>
  <label for="amount">Valor Total</label>
  <input id="amount"  name="amount" value="" placeholder="">
</div>

<div>
  <button type="submit" class="btn btn-primary"> Cadastrar </button>
  <a href="/orders"  class="btn btn-danger"> Cancelar </a>
</div>

{{-- @include('orders._partials.client-modal') --}}
{{-- @include('orders._partials.product-modal') --}}


<script>
  let totalUnid = document.querySelectorAll('#totalUnid');
  let element = document.getElementById('total');
  let input = document.getElementById('amount');
  
  function somaTotal(){
    let products = document.querySelector('#product');
    let product = products.options[products.selectedIndex].id;
    
    let qtde = document.getElementById('qtde').value;
    let freight_value = document.getElementById('freight_value').value;
    let discount_value = document.getElementById('discount_value').value;
    let total = 0;
    
    //console.log(product)
    // totalUnid.forEach((element, index) => {
      // console.log(`element-${index}`, element.innerText)
      // total += Number(element.innerText);
    // });

    // total = total.toFixed(2);
    let soma = ((Number(product) * Number(qtde)) + Number(freight_value)) - Number(discount_value);
    console.log('input:', qtde )
    console.log( total , freight_value , discount_value,  soma)
    input.value = soma.toFixed(2) ;
    // return element.innerHTML = soma.toFixed(2) ;
  };
  // console.log('Eu sou o melhor', input)

</script>