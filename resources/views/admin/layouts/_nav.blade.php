@php
use App\Models\Admin;

$user = Auth::user();
$admin = Admin::get()->where('user_id', $user->id)->first();
// $profile = Profile
@endphp
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        @if ($admin->img_url)
        <img class="app-sidebar__user-avatar" src="{{ asset('uploads/user/'.$admin->img_url) }}" style="width: 40px; height: 40px;" alt="User Image">
            
        @else
        <img class="app-sidebar__user-avatar" src="" style="width: 40px; height: 40px;" alt="User Image">

        @endif
       
        <div>
          <p class="app-sidebar__user-name">{{$admin->first_name}} {{$admin->last_name}}</p>
          <p class="app-sidebar__user-designation">{{$user->email}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{ route('login.index') }}"><i class="app-menu__icon fa fa-home fa-lg"></i><span class="app-menu__label">Página Administrativa</span></a></li>
        <li><a class="app-menu__item" href="{{ route('users.index') }}"><i class="app-menu__icon fa-solid fa-user-tie"></i><span class="app-menu__label">Usuários</span></a></li>
        <li><a class="app-menu__item" href="{{ route('clients.index') }}"><i class="app-menu__icon fa-regular fa-user"></i><span class="app-menu__label">Clientes</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-clipboard"></i><span class="app-menu__label">Produtos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('categories.index') }}"><i class="icon fa fa-circle-o"></i> Categoria</a></li>
            <li><a class="treeview-item" href="{{ route('subCategories.index') }}" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Subcategoria</a></li>
            <li><a class="treeview-item" href="{{ route('collections.index') }}" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Coleções</a></li>
            <li><a class="treeview-item" href="{{ route('products.index') }}"><i class="icon fa fa-circle-o"></i> Produtos</a></li>
          </ul>
        </li>
        {{-- <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Vendas</span></a></li> --}}
        <li><a class="app-menu__item" href="{{ route('blogs.index') }}"><i class="app-menu__icon fa-solid fa-newspaper"></i><span class="app-menu__label">Blogs</span></a></li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa-solid fa-bag-shopping"></i><span class="app-menu__label">Compras</span></a></li>
        {{-- <i class="fa-solid fa-gear"></i> --}}
        <li><a class="app-menu__item" href="{{ route('systems.index') }}"><i class="app-menu__icon fa-solid fa-gear"></i><span class="app-menu__label">Configurações do site</span></a></li>
        <li><a class="app-menu__item" href="{{ route('logout') }}"><i class="app-menu__icon fa-solid fa-right-from-bracket"></i><span class="app-menu__label">Sair</span></a></li>
      </ul>
    </aside>