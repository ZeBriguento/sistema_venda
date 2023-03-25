@php
use App\Models\Client;
$user = Auth::user();
$client = Client::get()->where('user_id', $user->id)->first();

@endphp
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        @if ($client->img_url)
        <img class="app-sidebar__user-avatar" src="{{ asset('uploads/user/'.$client->img_url) }}" style="width: 40px; height: 40px;" alt="User Image">
            
        @else
        <img class="app-sidebar__user-avatar" src="" style="width: 40px; height: 40px;" alt="User Image">

        @endif
       
        <div>
          <p class="app-sidebar__user-name">{{$client->first_name}} {{$client->last_name}}</p>
          <p class="app-sidebar__user-designation">{{$user->email}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{ route('login.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Página Administrativa</span></a></li>
      
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Vendas</span></a></li>
                      
        <li><a class="app-menu__item" href="{{ route('logout') }}"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Sair</span></a></li>
      </ul>
    </aside>