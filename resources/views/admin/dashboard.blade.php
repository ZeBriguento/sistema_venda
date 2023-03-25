@extends('admin.layout')
{{-- @if ($about) --}}
{{-- @section('title', $about->name)     --}}
{{-- @else --}}
@section('title', 'Painel Administrativo')
{{-- @endif --}}

@section('content')
<div class="app-title">
    <div>
      {{-- @if ($about) --}}
      {{-- <h1><i class="fa fa-dashboard"></i> {{$about->name}}</h1>
      <p>{{$about->description}}!</p>     --}}
      {{-- @else --}}
          
      <h1><i class="fa fa-dashboard"></i> Painel Administrativo</h1>
      {{-- <p>Começa uma b  ela jornada aqui!</p> --}}
      {{-- @endif --}}
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      {{-- @if ($about)
      <li class="breadcrumb-item"><a href="/admin">{{$about->name}}</a></li>     
      @else
           --}}
      <li class="breadcrumb-item"><a href="">Painel Administrativo</a></li>
      {{-- @endif --}}
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

          <div class="row">
          
            <div class="col-md-6 col-lg-3">
              <div class="widget-small primary coloured-icon"><i class="icon fa fa-volume-control-phone fa-3x"></i>
                <div class="info">
                  <a href="/admin/contacts" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Contactos</a>
                  {{-- <h4>Contactos</h4> --}}
                  <p><b></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-sitemap fa-3x"></i>
                <div class="info">
                  <a href="/admin/portfolios" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Portfolios</a>

                  {{-- <h4>Portfolios</h4> --}}
                  <p><b></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small warning coloured-icon"><i class="icon fa fa-play fa-3x"></i>
                <div class="info">
                  <a href="/admin/videos" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Videos</a>

                  {{-- <h4>Video</h4> --}}
                  <p><b></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small danger coloured-icon"><i class="icon fa fa-briefcase fa-3x"></i>
                <div class="info">
                  <a href="/admin/services" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Serviços</a>

                  {{-- <h4>Serviço</h4> --}}
                  <p><b></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small danger coloured-icon"><i class="icon fa fa-wrench fa-3x"></i>
                <div class="info">
                  <a href="/admin/projects" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Projectos</a>

                  {{-- <h4>Projecto</h4> --}}
                  <p><b></b></p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="widget-small danger coloured-icon"><i class="icon fa fa-tag fa-3x"></i>
                <div class="info">
                  <a href="/admin/projects" style="color: rgb(40, 35, 35); font-size: 20px; text-transform: uppercase; text-decoration: none">Parceiros</a>

                  {{-- <h4>Projecto</h4> --}}
                  <p><b></b></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection