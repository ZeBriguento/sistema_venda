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
            <p>Edição de Blogs</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
            <li class="breadcrumb-item">Edição de Blogs</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    {{-- Fim --}}
                    {!! Form::open(['route'=>['blogs.update', $blog], 'method'=>'PUT','files' => true, 'enctype'=> 'multipart/form-data']) !!}
                    {{-- @include('admin.blog._form') --}}
                    <p class="text-primary">Campos obrigatórios (*)</p>
                    <div class="form-group">
                        <label class="control-label">Titulo *</label>
                        <input class="form-control @if ($errors->has('title')) is-invalid @endif" type="text" placeholder="Titulo"
                            id="title" name="title" value="{{$blog->title}}" autofocus>
                        @if ($errors->has('title'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('title') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleTextarea">Descrição *</label>
                      <textarea class="form-control @if ($errors->has('description')) is-invalid  @endif" id="description" name="description" rows="3" placeholder="Descrição">{{$blog->description}}</textarea>
                    
                      @if ($errors->has('description'))
                      <div class="form-control-feedback" style="color: red">
                        @foreach ($errors->get('description') as $error)
                            {{$error}}
                        @endforeach
                      </div>
                    @endif
                    </div>  
                    
                    <div class="form-group">
                      <label for="exampleTextarea">Exceção *</label>
                      <textarea class="form-control @if ($errors->has('except')) is-invalid  @endif" id="except" name="except" rows="3" placeholder="Exceção">{{$blog->except}}</textarea>
                    
                      @if ($errors->has('except'))
                      <div class="form-control-feedback" style="color: red">
                        @foreach ($errors->get('except') as $error)
                            {{$error}}
                        @endforeach
                      </div>
                    @endif
                    </div>  
                    
                    
                    <div class="form-group">
                      <label for="exampleInputFile">Imagem</label>
                      <input class="form-control-file @if ($errors->has('img_url')) is-invalid  @endif" id="img_url" name="img_url" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Selecionar a imagem a carregar</small>
                    
                      @if ($errors->has('img_url'))
                      <div class="form-control-feedback" style="color: red">
                        @foreach ($errors->get('img_url') as $error)
                            {{$error}}
                        @endforeach
                      </div>
                    @endif
                    
                    </div>
                    
                    <div class="form-group mb-5">
                        <label for="exampleSelect1">Estado</label>
                        <select class="form-control" id="status" name="status">
                            @if ($blog->status == 'ACTIVE')
                                <option value="ACTIVE" selected>Activo</option>
                                <option value="INACTIVE">Inactivo</option>
                            @else
                                <option value="ACTIVE">Activo</option>
                                <option value="INACTIVE" selected>Inactivo</option>
                            @endif
                        </select>
                    </div>
                    
                    {{--  --}}

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