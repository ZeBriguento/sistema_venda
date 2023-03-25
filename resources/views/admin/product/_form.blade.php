 <p class="text-primary">Campos obrigatórios (*)</p>
<div class="form-group">
    <label class="control-label">Nome *</label>
    <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" placeholder="Nome"
        id="name" name="name" autofocus>
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
  <textarea class="form-control @if ($errors->has('description')) is-invalid  @endif" id="description" name="description" rows="3" placeholder="Descrição"></textarea>

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
      id="sell_price" name="sell_price" autofocus>
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
      id="min_qty" name="min_qty" autofocus>
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
      id="stock" name="stock" autofocus>
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
      id="size" name="size" autofocus>
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
      id="material" name="material" autofocus>
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
      id="color" name="color" autofocus>
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
      <input type="checkbox" name="promotion" id="promotion"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
    </label>
  </div>
</div>


<div class="form-group">
  <div class="form-group">
    <label for="exampleSelect1">Collections</label>
    <select class="form-control" id="collection_id" name="collection_id">
      @foreach ($collections as $collection)
      <option value="{{$collection->id}}">{{$collection->name}}</option>
    @endforeach
    
    </select>
  </div>
</div>

<div class="form-group mb-5">
    <label for="exampleSelect1">Estado</label>
    <select class="form-control" id="status" name="status">
        <option value="ACTIVE" selected>Activo</option>
        <option value="INACTIVE">Inactivo</option>
    </select>
</div>
