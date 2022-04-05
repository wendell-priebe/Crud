<!-- Modal -->
<div class="modal fade " id="modalSelectClient" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecionar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Nome - CPF/CNPJ</p>
        <select class="form-select" aria-label="Default select example" name="status">
          <option selected>Selecionar</option>
          @forEach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }} - {{ $client->cpf_cnpj }}</option>
          @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Selecionar</button>
      </div>
    </div>
  </div>
</div>
@php
  
@endphp