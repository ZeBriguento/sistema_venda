@extends('admin.layouts.layout')
@section('title')
    Collections
@endsection
@section('subtitle')
Collections
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Collections

            </h1>
            <p>Edição de novas Collections</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Collections</a></li>
            <li class="breadcrumb-item">Edição de Collections</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    {{-- Fim --}}
                    {!! Form::open([
                        'route' => ['collections.update', $collection],
                        'method' => 'PUT',
                        'files' => true,
                        'enctype' => 'multipart/form-data',
                    ]) !!}




                    <p class="text-primary">Campos obrigatórios (*)</p>
                    <div class="form-group">
                        <label class="control-label">Nome *</label>
                        <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text"
                            placeholder="Nome" id="name" name="name" value="{{ $collection->name }}" autofocus
                            required>
                        @if ($errors->has('name'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Descrição</label>
                        <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text"
                            placeholder="Descrição" id="description" name="description" value="{{ $collection->description }}"
                            autofocus>
                        @if ($errors->has('description'))
                            <div class="form-control-feedback" style="color: red">
                                @foreach ($errors->get('description') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {{-- <label class="control-label">Categoria</label> --}}
                        <div class="form-group">
                          <label for="exampleSelect1">Categoria</label>
                          <select class="form-control" id="subcategory_id" name="subcategory_id">
                            @foreach ($subCategories as $subcategory)
                            <option value="{{$subcategory->id}}" @if ($subcategory->id == $collection->subcategory_id)
                                selected     
                            @endif>{{$subcategory->name}}</option>
                          @endforeach
                          
                          </select>
                        </div>
                      </div>

                    <div class="form-group mb-5">
                        <label for="exampleSelect1">Estado</label>
                        <select class="form-control" id="status" name="status">
                            @if ($collection->status == 'ACTIVE')
                                <option value="ACTIVE" selected>Activo</option>
                                <option value="INACTIVE">Inactivo</option>
                            @else
                                <option value="ACTIVE">Activo</option>
                                <option value="INACTIVE" selected>Inactivo</option>
                            @endif
                        </select>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a
                            class="btn btn-danger" href="{{ route('collections.index') }}"><i
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
