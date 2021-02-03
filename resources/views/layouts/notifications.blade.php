<div class="notifications">
  @if (session()->has('notify_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session()->get('notify_success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  
  @if (session()->has('notify_warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session()->get('notify_warning') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session()->has('notify_danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session()->get('notify_danger') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
</div>