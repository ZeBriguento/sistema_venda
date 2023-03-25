@extends('admin.layout')
@section('title', 'Productos')
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Productos

            </h1>
            <p>Edição de Productos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Painel Administrativo</a> / <a
                    href="{{ route('products.index') }}">Productos</a><span style="color: #6d6d6e;"> / Edição de
                        Productos </span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="text-center">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edição de Productos</h5>

                </div>
                <div class="tile-body">
                    {!! Form::open(['route'=>['products.update', $product], ['method'=>'POST', 'files'=>true]]) !!}
                    

     
     <div class="form-group">
      <label class="control-label">Nome</label>
      <input class="form-control" type="text" placeholder="Nome" id="name" name="name" value="{{$product->name}}" autofocus required>

    </div>


   <div class="form-group">
     <label class="control-label">Preço de venda</label>
     <input class="form-control" type="number" placeholder="Preço de venda" id="sell_price" name="sell_price" value="{{$product->sell_price}}" autofocus required>

   </div>
   
   <div class="form-group">
     {{-- <label class="control-label">Categoria</label> --}}
     <div class="form-group">
       <label for="exampleSelect1">Categoria</label>
       <select class="form-control" id="category_id" name="category_id">
         @foreach ($categories as $category)
         <option value="{{$category->id}}" @if ($category->id == $product->category_id)
             selected     
         @endif>{{$category->name}}</option>
       @endforeach
       
       </select>
     </div>
   </div>

   <div class="form-group">
     {{-- <label class="control-label">Fornecedor</label> --}}
     <div class="form-group">
       <label for="exampleSelect1">Fornecedor</label>
       <select class="form-control" id="provider_id" name="provider_id">
         @foreach ($providers as $provider)
         <option value="{{$provider->id}}"  @if ($provider->id == $product->provider_id)
          selected     
      @endif>{{$provider->name}}</option>
       @endforeach
       
       </select>  
     </div>
   </div>


   

   <div class="form-group">
     <label for="exampleInputFile">Selecionar Imagem</label>
     <input class="form-control-file" id="image" name="image" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">Selecionar a imagem a carregar</small>
   </div>
   
   


  {{-- <div class="form-group">
    <label for="exampleTextarea">Endereço</label>
    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Endereço"></textarea>
  </div> --}}

  
    
    
    {{-- <div class="form-group col-md-5">
     <label class="control-label">Telefone</label>
     <input class="form-control" type="text" placeholder="Telefone" id="phone" name="phone" autofocus required>

   </div> --}}



  
  
    

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="{{ route('products.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                      </div>
                      {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{-- Fim --}}

    </div>


@endsection

{{-- @section('scripts')
<script src="{{ asset('js') }}/partner.js"></script>

@endsection --}}



{{--
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Telefone:</strong></label>
                                        <p>{{ $product->phone }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Email:</strong></label>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Status:</strong></label>
                                        @if ($user->status == 'INACTIVE')
                                            <span class="badge badge-danger">Inactivo</span>
                                        @else
                                            <span class="badge badge-success">Activo</span>
                                        @endif
                                    </div>
                                    <div class="clearfix "></div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Endereço:</strong></label>
                                        <p>{{ $product->address }}</p>
                                    </div>
                                </div> --}}