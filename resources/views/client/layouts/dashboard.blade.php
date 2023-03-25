@extends('client.layouts.layout')
@section('title')
Página Administrativa
@endsection
@section('subtitle')
Página Administrativa
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Página Administrativa
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
                    Start a beautiful jorney here
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