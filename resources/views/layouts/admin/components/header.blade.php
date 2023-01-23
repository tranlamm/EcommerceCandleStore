<div class=" _navbar fixed-top">
  <div class="row _navbar-wrapper">
    <div class="col col-xl-2 col-sm-4 d-sm-block d-none">
      <div class="_navbar-logo">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <h1 class="_navbar-brand">Candle Shop<i class="fa-solid fa-heart ms-2"></i></h1>
          <h1 class="_navbar-brand">Candle Shop<i class="fa-solid fa-heart ms-2"></i></h1>
        </a>
      </div>
    </div>

    <div class="col col-xl-10 col-sm-8 col-12 d-flex justify-content-end align-items-center">
      <form action="{{ route('logout.post') }}" method="POST" class="me-3">
        @csrf
        <button type="submit" class="btn btn-warning btn-sm">
          <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
          <span><strong>Log out</strong></span>
        </button>
      </form>
    </div>
  </div>
</div>