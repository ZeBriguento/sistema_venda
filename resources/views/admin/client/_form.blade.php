<p class="text-primary">Campos obrigatórios (*)</p>
<div class="form-group">
    <label class="control-label">Primeiro nome *</label>
    <input class="form-control @if ($errors->has('first_name')) is-invalid @endif" type="text"
        placeholder="Primeiro Nome" id="first_name" name="first_name" value="" autofocus>
    @if ($errors->has('first_name'))
        <div class="form-control-feedback" style="color: red">
            @foreach ($errors->get('first_name') as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>

<div class="form-group">
    <label class="control-label">Sobrenome *</label>
    <input class="form-control @if ($errors->has('last_name')) is-invalid @endif" type="text"
        placeholder="Sobrenome" id="last_name" name="last_name"  autofocus>
    @if ($errors->has('last_name'))
        <div class="form-control-feedback" style="color: red">
            @foreach ($errors->get('last_name') as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>

<div class="form-group">
    <label class="control-label">Email *</label>
    <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="text" placeholder="Email"
        id="email" name="email" autofocus>
    @if ($errors->has('email'))
        <div class="form-control-feedback" style="color: red">
            @foreach ($errors->get('email') as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
</div>

<div class="form-group">
  <label class="control-label">Palavra-Passe *</label>
  <input class="form-control @if ($errors->has('password')) is-invalid @endif" type="password" placeholder="Palavra-Passe"
      id="password" name="password" autofocus>
  @if ($errors->has('password'))
      <div class="form-control-feedback" style="color: red">
          @foreach ($errors->get('password') as $error)
              {{ $error }}
          @endforeach
      </div>
  @endif
</div>

<div class="form-group">
  <label class="control-label">Confirmar Palavra-Passe *</label>
  <input class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" type="password" placeholder="Palavra-Passe"
      id="password_confirmation" name="password_confirmation" autofocus>
  @if ($errors->has('password'))
      <div class="form-control-feedback" style="color: red">
          @foreach ($errors->get('password') as $error)
              {{ $error }}
          @endforeach
      </div>
  @endif
</div>

<div class="form-group">
    <label class="control-label">Telefone *</label>
    <input class="form-control @if ($errors->has('phone')) is-invalid @endif" type="number"
        placeholder="Telefone" id="phone" name="phone" autofocus>
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
    <input class="form-control @if ($errors->has('nif_number')) is-invalid @endif" type="text" placeholder="NIF"
        id="nif_number" name="nif_number" autofocus>
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
    <input class="form-control-file" id="img_url" name="img_url" type="file" aria-describedby="fileHelp"><small
        class="form-text text-muted" id="fileHelp">Selecionar a imagem a carregar</small>
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
  <input class="form-control @if ($errors->has('address')) is-invalid @endif" type="text" placeholder="Endereço"
      id="address" name="address" autofocus>
  @if ($errors->has('address'))
      <div class="form-control-feedback" style="color: red">
          @foreach ($errors->get('address') as $error)
              {{ $error }}
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
