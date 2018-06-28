 <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand pl-5" href="/">Cerutti.io</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto pr-5">
      <li class="nav-item {{ Request::is('/') ? "active" : ''}}">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{ Request::is('about') ? "active" : ''}}">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item {{ Request::is('blog') ? "active" : ''}}">
        <a class="nav-link" href="/blog">Blog</a>
      </li>
      <li class="nav-item {{ Request::is('contact') ? "active" : ''}}">
        <a class="nav-link" href="/contact">Contact</a>
      </li>

      @if (Auth::check())

      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="/uploads/avatars/avatar-1.jpg" alt="" width="30px" height="30px" style="border-radius:50%; margin-top:-10px;"> 
         {{{ isset(Auth::user()->name) ? Auth::user()->username : Auth::user()->email }}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="fas fa-user"></i> Profile</a>
          <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
          {{-- <a class="dropdown-item" href="#"><i class="far fa-user-circle fa-sm"></i> Profile</a> --}}
          <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
          <a class="dropdown-item" href="{{ route('tags.index') }}"><i class="fas fa-tag fa-sm"></i>  Tags</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i>  Settings </a>
          {{-- <a role="separator" class="divider"></a> --}}
          @auth
          <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt fa-sm"></i> Logout </a>
        @endauth
        </div>
      </li>
    @else
      <li>
        <a class="nav-link {{ Request::is('auth/login') ? "active" : ''}}" href="{{route('showLogin')}}">Login</a>
      </li>
    @endif
    </ul>
  </div>
</nav>

<!-- End of Navigation Bar -->
