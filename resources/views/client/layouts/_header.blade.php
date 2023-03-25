<header class="app-header"><a class="app-header__logo" href="{{ route('login.index') }}">{{$title}}</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      {{-- @php
          $user = Auth::user();
      @endphp --}}
      <!--Notification Menu-->
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          {{-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Definições</a></li> --}}
          <li><a class="dropdown-item" href="{{ route('users.show', ['user'=>Auth::user()]) }}"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
          <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out fa-lg"></i> Sair</a></li>
        </ul>
      </li>
    </ul>
  </header>