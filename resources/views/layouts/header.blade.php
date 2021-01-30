<!-- Hedaer -->
<header>
  <nav class="navbar navbar-expand-md">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          Menu
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown notifications-bell">
            <a class="nav-link font_size_9" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-bell"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown01">
              <li><div class="color_5 font_size_9 mt-1">No result is found</div></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about#faq">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          @if (!session()->get('user') && !session()->get('admin'))
            <li class="nav-item">
              <a class="nav-link" href="/login">Sign in</a>
            </li>
          @else
            @if (session()->get('user'))
              <li class="nav-item">
                <a class="nav-link" href="/profile">My profile</a>
              </li>
            @endif
            @if(session()->get('admin'))
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                  <li><a class="dropdown-item" href="/addProduct">Add product</a></li>
                  <li><a class="dropdown-item" href="/allProducts">All products (0)</a></li>
                </ul>
              </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- Hedaer end -->