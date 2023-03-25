<p class="text-primary">Campos obrigatórios (*)</p>
<div class="form-group">
    <label class="control-label">Nome *</label>
    <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" placeholder="Nome"
        id="name" name="name" autofocus required>
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
    <input class="form-control @if ($errors->has('description')) is-invalid @endif" type="text"
        placeholder="Descrição" id="description" name="description" autofocus>
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
    <label for="exampleSelect1">SubCategoria</label>
    <select class="form-control" id="subcategory_id" name="subcategory_id">
      @foreach ($subCategories as $subCategory)
      <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
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