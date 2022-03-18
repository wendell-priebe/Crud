{{-- @if ($errors->any())
    <ul class="errors">
      @foreach($errors->all() as $error)
        <li class="error"> {{ $error }} </li>
      @endforeach
    </ul>
@endif --}}

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