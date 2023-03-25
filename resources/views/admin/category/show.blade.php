@extends('admin.layouts.layout')
@section('title')
Dados da categoria
@endsection
@section('subtitle')
Dados da categoria
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Dados da categoria

            </h1>
            <p>Dados da categoria</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Categorias</a></li>
            <li class="breadcrumb-item">Dados da categoria</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    <div class="tab-pane fade active show" id="user-settings">
                        <div class="tile user-settings ">
                            <h4 class="line-head">Informações da Categoria</h4>
                            <form>

                                <div class="row ">

                                  

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Nome:</strong></label>
                                        <p>{{ $category->name }}</p>
                                    </div>
                                    <div class="clearfix "></div>
                                    <div class="col-md-12 mb-4 line-head">
                                      <label> <strong>Descrição:</strong></label>
                                      <p>{{ $category->description }}</p>
                                  </div>
                                  <div class="clearfix "></div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Status:</strong></label>
                                        @if ($category->status == 'INACTIVE')
                                            <span class="badge badge-danger">Inactivo</span>
                                        @else
                                            <span class="badge badge-success">Activo</span>
                                        @endif
                                    </div>
                                    
                                </div>


                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <a href="{{ route('categories.index') }}" class="btn btn-primary" type="button"
                                            style="float: right"><i class="fa fa-fw fa-lg fa-check-circle"></i> Voltar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/user.js') !!}
@endsection
