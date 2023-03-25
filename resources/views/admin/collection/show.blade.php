@extends('admin.layouts.layout')
@section('title')
Dados da Collection
@endsection
@section('subtitle')
Dados da Collection
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Dados da Collection

            </h1>
            <p>Dados da Collection</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('collections.index') }}">Categorias</a></li>
            <li class="breadcrumb-item">Dados da Collection</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    <div class="tab-pane fade active show" id="user-settings">
                        <div class="tile user-settings ">
                            <h4 class="line-head">Informações da Collection</h4>
                            <form>

                                <div class="row ">

                                  

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Nome:</strong></label>
                                        <p>{{ $collection->name }}</p>
                                    </div>
                                    <div class="clearfix "></div>
                                    <div class="col-md-12 mb-4 line-head">
                                      <label> <strong>Descrição:</strong></label>
                                      <p>{{ $collection->description }}</p>
                                  </div>
                                  <div class="clearfix "></div>

                                  <div class="col-md-12 mb-4 line-head">
                                    <label> <strong>Categoria:</strong></label>
                                    <p>{{ $collection->subcategory->name }}</p>
                                </div>

                                  <div class="clearfix "></div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Status:</strong></label>
                                        @if ($collection->status == 'INACTIVE')
                                            <span class="badge badge-danger">Inactivo</span>
                                        @else
                                            <span class="badge badge-success">Activo</span>
                                        @endif
                                    </div>
                                    
                                </div>


                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <a href="{{ route('collections.index') }}" class="btn btn-primary" type="button"
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
