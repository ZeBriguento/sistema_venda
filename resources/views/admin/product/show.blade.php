@extends('admin.layouts.layout')
@section('title')
    Dados do Produto
@endsection
@section('subtitle')
    Dados do Produto
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tag"></i> Dados do Produto

            </h1>
            <p>Dados do produto</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('login.index') }}">Página Administrativa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
            <li class="breadcrumb-item">Dados do produto</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- Form --}}
                    <div class="tab-pane fade active show" id="user-settings">
                        <div class="tile user-settings ">
                            <h4 class="line-head">Informações do Produto</h4>
                            <form>

                                <div class="row ">

                                    {{-- <p>{{ $product }}</p>
                                    <p>{{ $img_product }}</p>
                                    <p>{{ $spec_product }}</p> --}}

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Nome</strong></label>
                                        <p>{{ $product->name }}</p>
                                    </div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Descrição</strong></label>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Preço</strong></label>
                                        <p>{{ $product->sell_price }} Kz</p>
                                    </div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Quantidade Minima</strong></label>
                                        <p>{{ $product->min_qty }}</p>
                                    </div>

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Quantidade em Stock</strong></label>
                                        <p>{{ $product->stock }}</p>
                                    </div>

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Tamanho</strong></label>
                                        <p>{{ $spec_product->size }}</p>
                                    </div>

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Material</strong></label>
                                        <p>{{ $spec_product->material }}</p>
                                    </div>


                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Cor</strong></label>
                                        <p>{{ $spec_product->color }}</p>
                                    </div>

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Imagem Principal:</strong></label><br>
                                        @if ($img_product->main_image)
                                            <img src="{{ asset('uploads/product/' . $img_product->main_image) }}"
                                                style="width: 100px; height: 100px;" alt="Imagem Principal">
                                        @else
                                            <p></p>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Imagens de Destaque:</strong></label><br>
                                        @if ($img_product->image_url)
                                            @foreach (json_decode($img_product->image_url) as $member)
                                                <img src="{{ asset('uploads/product/' . $member) }}"
                                                    style="width: 100px; height: 100px;" alt="Imagem Principal">
                                            @endforeach
                                        @else
                                            <p></p>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Em promoção?</strong></label><br>
                                        @if ($product->promotion)
                                            <p>Sim</p>
                                        @else
                                            <p></p>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Coleção</strong></label>
                                        <p>{{ $product->collection->name }}</p>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-12 mb-4 line-head">
                                        <label> <strong>Estado:</strong></label>
                                        @if ($product->status == 'INACTIVE')
                                            <span class="badge badge-danger">Inactivo</span>
                                        @else
                                            <span class="badge badge-success">Activo</span>
                                        @endif
                                    </div>

                                    <div class="row mb-10">
                                        <div class="col-md-12">
                                            <a href="{{ route('products.index') }}" class="btn btn-primary" type="button"
                                                style="float: right"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                                                Voltar</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/user.js') !!}
@endsection
