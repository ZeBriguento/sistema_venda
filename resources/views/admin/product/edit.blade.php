@extends('admin.layouts.layout')
@section('title')
    Produtos
@endsection
@section('subtitle')
Produtos
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Produtos

            </h1>
            <p>Edição de produto</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
            <li class="breadcrumb-item">Edição de produto</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    {{-- Fim --}}
                    {!! Form::open([
                        'route' => ['products.update', $product],
                        'method' => 'PUT','files' => true, 'enctype'=> 'multipart/form-data'
                    ]) !!}

                        {{--  --}}
                        <p class="text-primary">Campos obrigatórios (*)</p>
                        <div class="form-group">
                            <label class="control-label">Nome *</label>
                            <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" placeholder="Nome"
                                id="name" name="name" value="{{$product->name}}" autofocus>
                            @if ($errors->has('name'))
                                <div class="form-control-feedback" style="color: red">
                                    @foreach ($errors->get('name') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleTextarea">Descrição *</label>
                          <textarea class="form-control @if ($errors->has('description')) is-invalid  @endif" id="description" name="description" rows="3" placeholder="Descrição">{{$product->name}}</textarea>
                        
                          @if ($errors->has('description'))
                          <div class="form-control-feedback" style="color: red">
                            @foreach ($errors->get('description') as $error)
                                {{$error}}
                            @endforeach
                          </div>
                        @endif
                        </div>  
                        
                        {{--  --}}
                        {{-- {!! Form::number($name, $value, [$options]) !!} --}}
                        
                        <div class="form-group">
                          <label class="control-label">Preço *</label>
                          <input class="form-control @if ($errors->has('sell_price')) is-invalid @endif" type="number"  step="0.2" placeholder="Preço"
                              id="sell_price" name="sell_price" value="{{$product->sell_price}}" autofocus>
                          @if ($errors->has('sell_price'))
                              <div class="form-control-feedback" style="color: red">
                                  @foreach ($errors->get('sell_price') as $error)
                                      {{ $error }}
                                  @endforeach
                              </div>
                          @endif
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Quantidade minima*</label>
                          <input class="form-control @if ($errors->has('min_qty')) is-invalid @endif" type="number" placeholder="Quantidade Minima"
                              id="min_qty" name="min_qty" value="{{$product->min_qty}}" autofocus>
                          @if ($errors->has('min_qty'))
                              <div class="form-control-feedback" style="color: red">
                                  @foreach ($errors->get('min_qty') as $error)
                                      {{ $error }}
                                  @endforeach
                              </div>
                          @endif
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Quantidade em stock *</label>
                          <input class="form-control @if ($errors->has('stock')) is-invalid @endif" type="number" placeholder="Quantidade em stock"
                              id="stock" name="stock" value="{{$product->stock}}" autofocus>
                          @if ($errors->has('stock'))
                              <div class="form-control-feedback" style="color: red">
                                  @foreach ($errors->get('stock') as $error)
                                      {{ $error }}
                                  @endforeach
                              </div>
                          @endif
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Tamanho *</label>
                          <input class="form-control @if ($errors->has('size')) is-invalid @endif" type="string" placeholder="Tamanho"
                              id="size" name="size" value="{{$spec_product->size}}" autofocus>
                          @if ($errors->has('size'))
                              <div class="form-control-feedback" style="color: red">
                                  @foreach ($errors->get('size') as $error)
                                      {{ $error }}
                                  @endforeach
                              </div>
                          @endif
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Material *</label>
                          <input class="form-control @if ($errors->has('material')) is-invalid @endif" type="text" placeholder="Material"
                              id="material" name="material" value="{{$spec_product->material}}" autofocus>
                          @if ($errors->has('material'))
                              <div class="form-control-feedback" style="color: red">
                                  @foreach ($errors->get('material') as $error)
                                      {{ $error }}
                                  @endforeach
                              </div>
                          @endif
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label">Cor *</label>
                          <input class="form-control @if ($errors->has('color')) is-invalid @endif" type="text" placeholder="Cor"
                              id="color" name="color" value="{{$spec_product->color}}" autofocus>
                          @if ($errors->has('color'))
                              <div class="form-control-feedback" style="color: red">
                                  @foreach ($errors->get('color') as $error)
                                      {{ $error }}
                                  @endforeach
                              </div>
                          @endif
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputFile">Imagem Principal</label>
                          <input class="form-control-file @if ($errors->has('main_image')) is-invalid  @endif" id="main_image" name="main_image" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Selecionar a imagem a carregar</small>
                        
                          @if ($errors->has('main_image'))
                          <div class="form-control-feedback" style="color: red">
                            @foreach ($errors->get('main_image') as $error)
                                {{$error}}
                            @endforeach
                          </div>
                        @endif
                        
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputFile">Outras Imagens</label>
                          <input class="form-control-file @if ($errors->has('main_image')) is-invalid  @endif" id="image_url" name="image_url[]" multiple type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Selecionar a imagem a carregar</small>
                        
                        
                          @if ($errors->has('image_url'))
                          <div class="form-control-feedback" style="color: red">
                            @foreach ($errors->get('image_url') as $error)
                                {{$error}}
                            @endforeach
                          </div>
                        @endif
                        </div>
                        
                        <div class="form-group">
                          <p>Em promoção</p>
                          <div class="toggle-flip">
                            <label>
                              <input type="checkbox" name="promotion" id="promotion" value="{{$product->promotion}}"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                          </div>
                        </div>
                        
                        
                        <div class="form-group">
                            {{-- <label class="control-label">Categoria</label> --}}
                            <div class="form-group">
                              <label for="exampleSelect1">Coleções</label>
                              <select class="form-control" id="collection_id" name="collection_id">
                                @foreach ($collections as $collection)
                                <option value="{{$collection->id}}" @if ($collection->id == $product->collection_id)
                                    selected     
                                @endif>{{$collection->name}}</option>
                              @endforeach
                              
                              </select>
                            </div>
                          </div>
                        
                        <div class="form-group mb-5">
                            <label for="exampleSelect1">Estado</label>
                            <select class="form-control" id="status" name="status">
                                @if ($product->status == 'ACTIVE')
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
                        <button class="btn btn-primary" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a
                            class="btn btn-danger" href="{{ route('products.index') }}"><i
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
