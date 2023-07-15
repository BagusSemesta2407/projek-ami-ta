<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
    <div class="container">
      {{-- <a href="#" class="navbar-brand">Seo<span class="text-primary">Gram.</span></a> --}}
      <a href="{{ route('beranda') }}" class="navbar-brand">
        <img src="{{ asset('polsub-img.png') }}" alt="" width="390px">
      </a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ request()->is('/*') ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('beranda') }}">
                Beranda
            </a>
          </li>
          <li class="nav-item {{ request()->is('p4mp*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('p4mp') }}">P4MP</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="service.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.html">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li> --}}
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-2" href="{{ url('/login') }}">Login</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>