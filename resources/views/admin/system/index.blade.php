@extends('admin.layouts.layout')
@section('title')
    Dados do Site
@endsection
@section('subtitle')
    Dados do Site
@endsection
@section('content')
    
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Dados do Site

            </h1>
            <p>Dados do Site</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            {{-- <li class="breadcrumb-item"><a href="{{ route('systems.index') }}">Systema</a></li> --}}
            <li class="breadcrumb-item">Dados do Site</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="bs-component">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Informações do Site</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">PayPal</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="home">
                                <div class="tab-pane fade active show" id="user-settings">
                                    <div class="tile user-settings ">
                                        <h4 class="line-head">Informações do Site</h4>
                                        <form>
                                            @if (session('status'))
                                                <div class="bs-component">
                                                    <div class="alert alert-dismissible alert-success">
                                                        <button class="close" type="button"
                                                            data-dismiss="alert">×</button>{{ session('status') }}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row ">

                                                <div class="col-md-12 mb-4 line-head">
                                                    <label> <strong>Imagem:</strong></label><br>
                                                    @if ($system->img_url)
                                                        <img src="{{ asset('uploads/system/' . $system->img_url) }}"
                                                            style="width: 100px; height: 100px;" alt="logo">
                                                    @else
                                                        <p></p>
                                                    @endif
                                                    {{-- <p>{{$user->name}}</p> --}}
                                                </div>

                                                <div class="col-md-12 mb-4 line-head">
                                                    <label> <strong>Nome</strong></label>
                                                    <p>{{ $system->name }}</p>
                                                </div>

                                                <div class="clearfix"></div>
                                                <div class="col-md-12 mb-4 line-head">
                                                    <label> <strong>NIF:</strong></label>
                                                    <p>{{ $system->nif_number }}</p>
                                                </div>
                                                <div class="col-md-12 mb-4 line-head">
                                                    <label> <strong>Telefone:</strong></label>
                                                    <p>{{ $system->phone }}</p>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-12 mb-4 line-head">
                                                    <label> <strong>Email:</strong></label>
                                                    <p>{{ $system->email }}</p>
                                                </div>

                                                <div class="clearfix "></div>
                                                <div class="col-md-12 mb-4 line-head">
                                                    <label> <strong>Endereço:</strong></label>
                                                    <p>{{ $system->address }}</p>
                                                </div>
                                            </div>



                                            <div class="row mb-10">
                                                <div class="col-md-12">

                                                    <a href="{{ route('systems.edit', ['system' => $system]) }}"
                                                        class="btn btn-primary" type="button"
                                                        style="float: right; margin-right: 10px;"><i
                                                            class="fa fa-fw fa-lg fa-check-circle"></i> Editar</a>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tile">
                                            <div class="tile-body">
                                                {{-- Form --}}
                                                {{-- Fim --}}
                                                {!! Form::open([
                                                    'route' => ['systems.updatepaypal'],
                                                    'method' => 'POST',
                                                //    'files' => true,
                                                    // 'enctype' => 'multipart/form-data',
                                                ]) !!}
                                             
                                                <input type="hidden" value="{{$system->id}}" name="id">
                                                {{-- @php
                                                    dd($system->id);
                                                @endphp --}}
                                                <div class="form-group">
                                                    <label for="paypal_mode">Selecione uma opcao</label>
                                                    <select class="form-control" id="paypal_mode" name="paypal_mode">
                                                      <option value="1">Sandbox</option>
                                                      <option value="0">Live</option>
                                                    </select>
                                                  </div>

                                                <div class="form-group">
                                                    <label class="control-label">paypal_client_id</label>
                                                    <input
                                                        class="form-control @if ($errors->has('paypal_client_id')) is-invalid @endif"
                                                        type="text" placeholder="paypal_client_id" id="paypal_client_id" name="paypal_client_id"
                                                        value="{{ $system->paypal_client_id }}" autofocus>
                                                    @if ($errors->has('paypal_client_id'))
                                                        <div class="form-control-feedback" style="color: red">
                                                            @foreach ($errors->get('paypal_client_id') as $error)
                                                                {{ $error }}
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">paypal_client_secret</label>
                                                    <input
                                                        class="form-control @if ($errors->has('paypal_client_secret')) is-invalid @endif"
                                                        type="text" placeholder="paypal_client_secret" id="paypal_client_secret" name="paypal_client_secret"
                                                        value="{{ $system->paypal_client_secret }}" autofocus>
                                                    @if ($errors->has('email'))
                                                        <div class="form-control-feedback" style="color: red">
                                                            @foreach ($errors->get('paypal_client_secret') as $error)
                                                                {{ $error }}
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="paypal_current">Selecione uma opcao</label>
                                                    <select class="form-control" id="paypal_current" name="paypal_current">
                                                      <option value="USD">USD</option>
                                                      <option value="EUA">EU</option>
                                                    </select>
                                                  </div>

                                                <div class="tile-footer">
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a
                                                        class="btn btn-danger" href="{{ route('systems.index') }}"><i
                                                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- Form --}}


                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/user.js') !!}
@endsection
