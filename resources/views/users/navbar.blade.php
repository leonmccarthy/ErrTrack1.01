<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block navbar-klean" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand" href="index.html"> <img class="me-3 d-inline-block" src="assets/img/gallery/logo.png" alt="" /></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto pt-2 pt-lg-0 font-base">
          <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link fw-medium active" aria-current="page" href="#home">Home</a></li>
          <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#feature">Features</a></li>
          <li class="nav-item px-2" data-anchor="data-anchor"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        @if (Auth::user())
            <x-app-layout></x-app-layout>
        @else
            <a class="btn btn-link text-primary fw-bold order-1 order-lg-0" href="{{ url('/login') }}">Sign in</a>
            <a class="btn btn-light shadow-klean order-0" href="{{ url('/register') }}"><span class="text-gradient fw-bold">Sign Up</span></a>
        @endif
          
      </div>
    </div>
</nav>