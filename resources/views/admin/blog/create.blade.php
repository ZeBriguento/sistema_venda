@extends('admin.layouts.layout')
@section('title')
    Blogs
@endsection
@section('subtitle')
Blogs
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Blogs

            </h1>
            <p>Cadastro de novos Blogs</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
            <li class="breadcrumb-item">Cadastro de Blogs</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    {{-- Fim --}}
                    {!! Form::open(['route'=>'blogs.store', 'method'=>'POST','files' => true, 'enctype'=> 'multipart/form-data']) !!}
                    @include('admin.blog._form')
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{ route('blogs.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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