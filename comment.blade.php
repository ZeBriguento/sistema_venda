@extends('admin.layout')
@section('title', 'Fornecedores de Produtos')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Fornecedores
                <a href="{{ route('providers.create') }}" class="btn btn-primary" type="button"> <i
                        class="fa fa-plus-circle"></i> Novo</a>
                <a href="" class="btn btn-success" type="button"> <i class="fas fa-download"></i> Imprimir</a>
            </h1>

            <br>
            @if (session('status'))
                <div class="bs-component">
                    <div class="alert alert-dismissible alert-success">
                        <button class="close" type="button" data-dismiss="alert">×</button>{{ session('status') }}
                    </div>
                </div>
            @else
                <p>Informações dos Fornecedores!</p>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Painel Administrativo</a> <span
                    style="color: #6d6d6e;">/ Fornecedores </span></li>
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

                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered"
                                                            id="tableFornecedores">
                                                            {{-- Pills --}}
                                                            {{-- <div class="bs-component">
                                                <ul class="nav nav-pills" style="float: right; margin-bottom: 10px" >
                                                  <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                                                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                  </li>
                                                  </ul>
                                              </div> --}}
                                                            {{-- <a class="btn btn-primary" type="button" style="float: right; margin-bottom: 10px; color: white" > <i class="fas fa-download"></i>  Exportar  </a> --}}
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    {{-- <th>Imagem</th> --}}
                                                                    <th>Nome</th>
                                                                    <th>Email</th>
                                                                    {{-- <th>NIF</th> --}}
                                                                    <th>Telefone</th>
                                                                    {{-- <th>Endereço</th> --}}
                                                                    <th>Data de criação</th>
                                                                    <th>Opções</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($providers as $provider)
                                                                    <tr>
                                                                        <td>{{ $provider->id }}</td>
                                                                        <td>{{ $provider->name }}</td>
                                                                        <td>{{ $provider->email }}</td> 
                                                                        {{-- <td>{{ $provider->nif_number }}</td> --}}
                                                                        <td>{{ $provider->phone }}</td>
                                                                        {{-- <td>{{ $provider->address }}</td> --}}
                                                                        {{-- <td>{{ $provider-> }}</td> --}}
                                                                        {{-- <td>{{ $provider->phone }}</td> --}}
                                                                        {{-- <td>
                                                                @if ($provider->status == 'Inactivo')
                                                                    <span class="badge badge-danger">Inactivo</span>
                                                                @else
                                                                    <span class="badge badge-success">Activo</span>
                                                                @endif
                                                            </td> --}}
                                                                        <td>{{ $provider->created_at }}</td>
                                                                        <td>
                                                                            <div class="text-center">
                                                                                {!! Form::open(['route' => ['providers.destroy', $provider], 'method' => 'DELETE']) !!}
                                                                                <a class="btn btn-primary btn-sm"
                                                                                    href="{{ route('providers.show', ['provider' => $provider]) }}" type="button"
                                                                                    style="color: white"><i
                                                                                        class="fas fa-key"></i></a>
                                                                                <a class="btn btn-secondary btn-sm"
                                                                                    href="{{ route('providers.edit', ['provider' => $provider]) }}"
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
    {!! Html::script('vali-admin/pages/js/provider.js') !!}
@endsection
