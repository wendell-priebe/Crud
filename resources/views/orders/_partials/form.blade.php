
@csrf

<div>
  <input type="text" name="cod_client" placeholder="Cliente" value="">
  <button type="button"  class="btn"  data-bs-toggle="modal" data-bs-target="#modalSelectClient">
    <i class="bi bi-search"></i>
  </button>
</div>
<input type="text" name="note" placeholder="Observação" value="">
<input type="date" name="dt_delivery" placeholder="Data prevista da entrega" value="">

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

<div>
  <input type="text" name="product" placeholder="Produto" value="">
  <button type="button"  class="btn"  data-bs-toggle="modal" data-bs-target="#modalSelectProduct">
    <i class="bi bi-search"></i>
  </button>
</div>

@include('orders._partials.table')

@php
  // $products = [
  //   0=>['id'=> 'sdf654sd6f54sdf',
  //   'name'=> 'arroz',
  //   'value'=> '15.99',
  //   'qtde' => '3']
  // ];

  //dd($products);
  $totalUnid = 0;
  $total_pedido = $totalUnid; 
  $discount_value = 0;
  $freight_value = 0;
@endphp

<div class="d-flex ">
  <input id="freight_value" type="number" name="freight_value" placeholder="Frete" value="">
  <input id="discount_value" type="number" name="discount_value" placeholder="Desconto" value="">
</div>

<a onclick="somaTotal()" class="btn btn-warning">Somar</a>

<p>Valor Total = R$ <span id="total"></span></p>

<button type="submit" class="btn btn-primary"> Cadastrar </button>

@include('orders._partials.client-modal')
@include('orders._partials.product-modal')


<script>
  totalUnid = document.querySelectorAll('#totalUnid');
  element = document.getElementById('total');

  function somaTotal(){
    let freight_value = document.getElementById('freight_value').value;
    let discount_value = document.getElementById('discount_value').value;
    let total = 0;

    totalUnid.forEach((element, index) => {
      //console.log(`element-${index}`, element.innerText)
      total += Number(element.innerText);
    });

    total = total.toFixed(2);
    let soma = (Number(total) + Number(freight_value)) - Number(discount_value);
    //console.log( total , freight_value , discount_value,  soma)
    return element.innerHTML = soma ;
  };


</script>