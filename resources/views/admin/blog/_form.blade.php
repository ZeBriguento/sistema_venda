 <p class="text-primary">Campos obrigatórios (*)</p>
<div class="form-group">
    <label class="control-label">Titulo *</label>
    <input class="form-control @if ($errors->has('title')) is-invalid @endif" type="text" placeholder="Titulo"
        id="title" name="title" autofocus>
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
  <textarea class="form-control @if ($errors->has('description')) is-invalid  @endif" id="description" name="description" rows="3" placeholder="Descrição"></textarea>

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
  <textarea class="form-control @if ($errors->has('except')) is-invalid  @endif" id="except" name="except" rows="3" placeholder="Exceção"></textarea>

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
        <option value="ACTIVE" selected>Activo</option>
        <option value="INACTIVE">Inactivo</option>
    </select>
</div>
