@extends('admin.layouts.layout')
@section('title')
    Usuários
@endsection
@section('subtitle')
    Usuários
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Usuários

            </h1>
            <p>Cadastro de novos usuários</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
            <li class="breadcrumb-item">Cadastro de usuários</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    {{-- Fim --}}
                    {!! Form::open(['route'=>'users.store', 'method'=>'POST','files' => true, 'enctype'=> 'multipart/form-data' ]) !!}
                    @include('admin.user._form')
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{ route('users.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                      </div>
                      {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{!! Html::script('js/user.js') !!}
@endsection