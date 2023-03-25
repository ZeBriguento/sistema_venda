
{{-- <div class="form-group">
  <label for="exampleTextarea">Descrição</label>
  <textarea class="form-control @if ($errors->has('description')) is-invalid  @endif" id="description" name="description" rows="3" placeholder="Descrição" required ></textarea>

  @if ($errors->has('description'))
  <div class="form-control-feedback" style="color: red">
    @foreach ($errors->get('description') as $error)
        {{$error}}
    @endforeach
  </div>
@endif
</div> --}}


{{-- 


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
</div> --}}

{{-- <div class="form-group">
  <p>Em promoção</p>
  <div class="toggle-flip">
    <label>
      <input type="checkbox" name="promotion" id="promotion"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
    </label>
  </div>
</div> --}}
