
<table class="table">
  <thead>
    <tr>
      <th>Produto</th>
      <th>Valor Unitário</th>
      <th>Quantidade</th>
      <th>Valor Total</th>
      <th>Remover</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
      <tr id="{{ $product->id }}">
        <td>{{ $product->name }}</td>
        <td>{{ $product->value }}</td>
        <td>{{ $product->qtde = 2 }}</td>
        <td id="totalUnid">{{ $totalUnid = $product->value * $product->qtde }}</td>
        <td> <a href=""> Remover </a> </td>
      </tr>
    @endforeach
  </tbody>
</table>