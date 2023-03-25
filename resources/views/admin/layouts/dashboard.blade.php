@extends('admin.layouts.layout')
@section('title')
Página Administrativa
@endsection
@section('subtitle')
Página Administrativa
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa-solid fa-house"></i> Página Administrativa
                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary" type="button"> <i class="fa fa-plus-circle"></i>
                    Novo</a> --}}
                {{-- <a href="" class="btn btn-success" type="button"> <i class="fas fa-download"></i> Imprimir</a> --}}
            </h1>
            {{-- <p>Start a beautiful journey here</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item">Página Administrativa</li>
            {{-- <li class="breadcrumb-item"><a href="#">Usuários</a></li> --}}
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Data Table --}}
                    <div class="row">
          
                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small primary coloured-icon"><i class="icon fa fa-volume-control-phone fa-3x"></i>
                            <div class="info">
                              <a href="{{ route('users.index') }}" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Usuários</a>
                              {{-- <h4>Contactos</h4> --}}
                              <p><b>{{$data['users']}}</b></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small info coloured-icon"><i class="icon fa fa-sitemap fa-3x"></i>
                            <div class="info">
                              <a href="{{ route('categories.index') }}" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Categorias</a>
            
                              {{-- <h4>Portfolios</h4> --}}
                              <p><b>{{$data['categories']}}</b></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small warning coloured-icon"><i class="icon fa fa-play fa-3x"></i>
                            <div class="info">
                              <a href="{{ route('subCategories.index') }}" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">SubCategorias</a>
            
                              {{-- <h4>Video</h4> --}}
                              <p><b>{{$data['subCategories']}}</b></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small danger coloured-icon"><i class="icon fa fa-briefcase fa-3x"></i>
                            <div class="info">
                              <a href="{{ route('collections.index') }}" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Coleções</a>
            
                              {{-- <h4>Serviço</h4> --}}
                              <p><b>{{$data['collections']}}</b></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small danger coloured-icon"><i class="icon fa fa-wrench fa-3x"></i>
                            <div class="info">
                              <a href="{{ route('products.index') }}" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Produtos</a>
            
                              {{-- <h4>Projecto</h4> --}}
                              <p><b>{{$data['products']}}</b></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="widget-small danger coloured-icon"><i class="icon fa fa-tag fa-3x"></i>
                            <div class="info">
                              <a href="{{ route('clients.index') }}" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Clientes</a>
            
                              {{-- <h4>Projecto</h4> --}}
                              <p><b>{{$data['clients']}}</b></p>
                            </div>
                          </div>
                        </div>
                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Fim --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{!! Html::script('js/user.js') !!}
@endsection