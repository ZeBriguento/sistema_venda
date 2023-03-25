@extends('admin.layouts.layout')
@section('title')
    Dados do Blog
@endsection
@section('subtitle')
    Dados do Blog
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Dados do Blog

            </h1>
            <p>Dados do Blog</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blog</a></li>
            <li class="breadcrumb-item">Dados do Blog</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    <div class="tab-pane fade active show" id="user-settings">
                        <div class="tile user-settings ">
                            <h4 class="line-head">Informações do Blog</h4>
                            <form>

                                <div class="row ">

                                    {{-- <p>{{ $blog }}</p>
                                    <p>{{ $img_blog }}</p>
                                    <p>{{ $spec_blog }}</p> --}}

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Nome</strong></label>
                                        <p>{{ $blog->title }}</p>
                                    </div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Descrição</strong></label>
                                        <p>{{ $blog->description }}</p>
                                    </div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Excepto</strong></label>
                                        <p>{{ $blog->except }}</p>
                                    </div>
                                    {{-- <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Criado por</strong></label>
                                        <p>{{ $blog->user->first_name }}</p>
                                    </div> --}}

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Imagem:</strong></label><br>
                                        @if ($img_blog->img_url)
                                            <img src="{{ $img_blog->img_url }}"
                                                style="width: 100px; height: 100px;" alt="Imagem Principal">
                                        @else
                                            <p></p>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Estado:</strong></label>
                                        @if ($blog->status == 'INACTIVE')
                                            <span class="badge badge-danger">Inactivo</span>
                                        @else
                                            <span class="badge badge-success">Activo</span>
                                        @endif
                                    </div>

                                    <div class="row mb-10">
                                        <div class="col-md-12">
                                            <a href="{{ route('blogs.index') }}" class="btn btn-primary" type="button"
                                                style="float: right"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                                                Voltar</a>
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
