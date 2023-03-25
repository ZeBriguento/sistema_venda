@extends('client.layouts.layout')
@section('title')
Dados de usuário
@endsection
@section('subtitle')
Dados de usuário
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Dados de usuário

            </h1>
            <p>Dados de usuário</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li> --}}
            <li class="breadcrumb-item">Dados de usuário</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    <div class="tab-pane fade active show" id="user-settings">
                      <div class="tile user-settings ">
                        <h4 class="line-head">Informações do Usuário</h4>
                        <form>

                          <div class="row ">

                            <div class="col-md-12 mb-4 line-head">
                              <label> <strong>Imagem:</strong></label><br>
                              @if ($profile->img_url)
                                  <img src="{{ asset('uploads/user/'.$profile->img_url) }}" style="width: 100px; height: 100px;" alt="logo">
                              @else
                                  <p></p>
                              @endif
                              {{-- <p>{{$user->name}}</p> --}}
                          </div>

                              <div class="col-md-12 mb-4 line-head">
                                  <label> <strong>Nome Completo:</strong></label>
                                  <p>{{$user->name}}</p>
                              </div>
                              <div class="col-md-12 mb-4 line-head">
                                <label> <strong>Primeiro nome:</strong></label>
                                <p>{{$profile->first_name}}</p>
                            </div>
                            <div class="col-md-12 mb-4 line-head">
                              <label> <strong>Sobrenome:</strong></label>
                              <p>{{$profile->last_name}}</p>
                          </div>
                              <div class="clearfix"></div>
                              <div class="col-md-12 mb-4 line-head">
                                  <label> <strong>NIF:</strong></label>
                                  <p>{{$profile->nif_number}}</p>
                              </div>
                              <div class="col-md-12 mb-4 line-head">
                                  <label> <strong>Telefone:</strong></label>
                                  <p>{{$profile->phone}}</p>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-12 mb-4 line-head">
                                  <label> <strong>Email:</strong></label>
                                  <p>{{$user->email}}</p>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-12 mb-4 line-head">
                                  <label> <strong>Status:</strong></label>
                                  @if ($user->status == 'INACTIVE')
                                  <span
                                      class="badge badge-danger">Inactivo</span>
                              @else
                                  <span
                                      class="badge badge-success">Activo</span>
                              @endif                              </div>
                              <div class="clearfix "></div>
                              <div class="col-md-12 mb-4 line-head">
                                  <label> <strong>Endereço:</strong></label>
                                  <p>{{$profile->address}}</p>
                              </div>
                            </div>

                          {{-- <div class="row mb-4 line-head">
                            <div class="col-md-4">
                              <label> <strong>NIF:</strong></label>
                              <p>{{$user->nif_number}}</p>
                              
                            </div>
                            <div class="col-md-4">
                              <label> <strong>Contacto:</strong></label>
                              <p>{{$user->phone   }}</p>
                            </div>
                          </div> --}}
                      
                          <div class="row mb-10">
                            <div class="col-md-12">
                              <a href="{{ route('login.index') }}" class="btn btn-danger" type="button" style="float: right"><i class="fa fa-fw fa-lg fa-check-circle"></i> Voltar</a>
                              <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary" type="button" style="float: right; margin-right: 10px;"><i class="fa fa-fw fa-lg fa-check-circle"></i> Editar</a>

                            </div>
                          </div>
                          
                        </form>
                      </div>
                    </div>
                    {{-- Fim --}}

                    {{-- {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}
                    @include('admin.user._form')
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{ route('users.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                      </div>
                      {!! Form::close() !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{!! Html::script('js/user.js') !!}
@endsection