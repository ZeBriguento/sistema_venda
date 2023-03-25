@extends('admin.layouts.layout')
@section('title')
    Categorias
@endsection
@section('subtitle')
    Categorias
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Categorias
                <a href="{{ route('categories.create') }}" class="btn btn-primary" type="button"> <i class="fa fa-plus-circle"></i>
                    Novo</a>
                    {{-- <a href="" class="btn btn-success" type="button"> <i class="fas fa-download"></i> Imprimir</a> --}}

                {{-- <a href="" class="btn btn-success" type="button"> <i class="fas fa-download"></i> Imprimir</a> --}}
            </h1>
            {{-- <p>Start a beautiful journey here</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item">Categorias</li>
            {{-- <li class="breadcrumb-item"><a href="#">Categorias</a></li> --}}
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Data Table --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="tile-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="">
                                                <div class="tile-body">
                                                    @if (session('status'))
                                                    <div class="bs-component">
                                                      <div class="alert alert-dismissible alert-success">
                                                        <button class="close" type="button" data-dismiss="alert">×</button>{{session('status')}}
                                                      </div>
                                                    </div>
                                                   
                                              
                                                    @endif
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered" id="tableUsers">
                                                          
                                                            {{-- <a class="btn btn-primary" type="button" style="float: right; margin-bottom: 10px; color: white" > <i class="fas fa-download"></i>  Exportar  </a> --}}
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nome</th>
                                                                    <th>Descrição</th>
                                                                    {{-- <th>Endereço</th> --}}
                                                                    <th>Data de criação</th>
                                                                    <th>Estado</th>
                                                                    <th>Opções</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                                @foreach ($categories as $category)
                                                                    <tr>
                                                                        <td>{{ $category->id }}</td>
                                                                        <td>{{ $category->name }}</td>
                                                                        <td>{{ $category->description }}</td>
                                                                        <td>{{ $category->created_at->format("d/m/Y") }}</td>
                                                                        <td>
                                                                            @if ($category->status == 'INACTIVE')
                                                                                <span
                                                                                    class="badge badge-danger">Inactivo</span>
                                                                            @else
                                                                                <span
                                                                                    class="badge badge-success">Activo</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-center">
                                                                                {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE']) !!}
                                                                                <a class="btn btn-primary btn-sm"
                                                                                    href="{{ route('categories.show', ['category' => $category]) }}"
                                                                                    type="button" style="color: white"><i
                                                                                        class="fas fa-key"></i></a>
                                                                                        <a class="btn btn-secondary btn-sm"
                                                                                        href="{{ route('categories.edit', ['category' => $category]) }}"
                                                                                        type="button" style="color: white"><i
                                                                                            class="fas fa-pencil-alt"></i></a>
                                                                                <button class="btn btn-danger btn-sm"
                                                                                    type="submit" style="color: white"><i
                                                                                        class="fa fa-trash-alt"></i></button>
                                                                                {!! Form::close() !!}
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
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