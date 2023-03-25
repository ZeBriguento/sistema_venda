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
            <p>Edição de novos usuários</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('systems.index') }}">Dados do sistema</a></li>
            {{-- <li class="breadcrumb-item">Edição de usuários</li> --}}
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    {{-- Fim --}}
                    {!! Form::open([
                        'route' => ['systems.update', $system],
                        'method' => 'PUT',
                        'files' => true,
                        'enctype' => 'multipart/form-data',
                    ]) !!}

                    <div class="form-group">
                        <label class="control-label">Nome *</label>
                        <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text"
                            placeholder="Nome" id="name" name="name" value="{{ $system->name }}"
                            autofocus>
                        @if ($errors->has('name'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                  

                    <div class="form-group">
                        <label class="control-label">Email *</label>
                        <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="text"
                            placeholder="Email" id="email" name="email" value="{{ $system->email }}" autofocus>
                        @if ($errors->has('email'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>



                    <div class="form-group">
                        <label class="control-label">Telefone *</label>
                        <input class="form-control @if ($errors->has('phone')) is-invalid @endif" type="number"
                            placeholder="Telefone" id="phone" name="phone" value="{{ $system->phone }}" autofocus>
                        @if ($errors->has('phone'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('phone') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">NIF *</label>
                        <input class="form-control @if ($errors->has('nif_number')) is-invalid @endif" type="text"
                            placeholder="NIF" id="nif_number" name="nif_number" value="{{ $system->nif_number }}" autofocus>
                        @if ($errors->has('nif_number'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('nif_number') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group">

                        <label for="exampleInputFile">Selecionar Imagem</label>
                        <input class="form-control-file" id="img_url" name="img_url" type="file"
                            aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Selecionar a
                            imagem a carregar</small>
                        @if ($errors->has('img_url'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('img_url') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        {{-- <label class="control-label">Imagem</label>
                      <input type="file" name="img_url" id="img_url"> --}}
                    </div>

                    <div class="form-group">
                        <label class="control-label">Endereço</label>
                        <input class="form-control @if ($errors->has('address')) is-invalid @endif" type="text"
                            placeholder="Endereço" id="address" name="address" value="{{ $system->address }}" autofocus>
                        @if ($errors->has('address'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('address') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
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
@endsection
@section('scripts')
    {!! Html::script('js/user.js') !!}
@endsection
