<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use App\Models\Collection;
use App\Models\ImgProduct;
use App\Models\Product;
use App\Models\SpecProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(asset('uploads/blog/1675785641_Captura de tela de 2022-11-25 17-36-00.png'));
        $products = Product::get()->where('is_deleted', '0');
        $spec_products = SpecProduct::get();
        $img_products = ImgProduct::get();
        return view('admin.product.index', compact('products', 'spec_products', 'img_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $collections = Collection::get()->where('is_deleted', '0');
        return view('admin.product.create', compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        
        // dd($request->all());
        $product = new Product;
        $img_product = new ImgProduct;
        $spec_product = new SpecProduct;
        // dd($img_product);
        // Product
        $product->name = $request->name;
        $product->description = $request->description;
        $product->min_qty = $request->min_qty;
        $product->sell_price = $request->sell_price;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->slug = Str::slug($product->name, '-');
        $product->collection_id = $request->collection_id;
        if($request->promotion)
        {
            $product->promotion = true;
        }
        $product->save();
        // dd($product);
        // SpecProduct
        $spec_product->product_id = $product->id;
        $spec_product->size = $request->size;
        $spec_product->material = $request->material;
        $spec_product->color = $request->color;
        $spec_product->save();
        // dd($spec_product);

        // ImgProduct
        $img_product->product_id = $product->id;
        
        if ($request->hasFile('image_url')) {
            $names = [];
            foreach ($request->file('image_url') as $image) {
                $destinationPath = public_path('/uploads/product');
                $filename = asset('uploads/product').'/'.time(). '_' . $image->getClientOriginalName();
                // $filename = time() . '_' . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                array_push($names, $filename);
            }
            //  dd($request->all());
            // var_dump($names);
            // dd(json_encode($names));
            $img_product->image_url = json_encode($names);
        }
        
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            // $image_name = time() . '_' . $file->getClientOriginalName();
            $image_name = asset('uploads/product').'/'.time(). '_' . $file->getClientOriginalName();
            $file->move(public_path('/uploads/product'), $image_name);
            $img_product->main_image = $image_name;
        }
        $img_product->save();
        return redirect()->route('products.index')->with('status', 'Produto criado com sucesso');
        // dd($img_product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        
        $img_product = ImgProduct::get()->where('product_id', $product->id)->first();
        $spec_product = SpecProduct::get()->where('product_id', $product->id)->first();
        return view('admin.product.show', compact('product', 'img_product', 'spec_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $collections = Collection::get()->where('is_deleted', '0');
        $img_product = ImgProduct::get()->where('product_id', $product->id)->first();
        $spec_product = SpecProduct::get()->where('product_id', $product->id)->first();
        return view('admin.product.edit', compact('product', 'img_product', 'spec_product', 'collections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $img_product = ImgProduct::get()->where('product_id', $product->id)->first();
        $spec_product = SpecProduct::get()->where('product_id', $product->id)->first();
        // dd($request->all());
        $product->name = $request->name;
        $product->description = $request->description;
        $product->min_qty = $request->min_qty;
        $product->sell_price = $request->sell_price;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->slug = Str::slug($product->name, '-');
        $product->collection_id = $request->collection_id;
        if($request->promotion)
        {
            $product->promotion = true;
        }

        $product->update();
        // dd($product);
        // SpecProduct
        $spec_product->product_id = $product->id;
        $spec_product->size = $request->size;
        $spec_product->material = $request->material;
        $spec_product->color = $request->color;
        $spec_product->update();
        // dd($spec_product);

        // ImgProduct
        $img_product->product_id = $product->id;
        
        if ($request->hasFile('image_url')) {
            $names = [];
            foreach ($request->file('image_url') as $image) {
         
                $destinationPath = public_path('/uploads/product');
                $filename = asset('uploads/product').'/'.time(). '_' . $image->getClientOriginalName();
                // $filename = time() . '_' . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                array_push($names, $filename);
            }
            //  dd($request->all());
            // var_dump($names);
            // dd(json_encode($names));
            $img_product->image_url = json_encode($names);
        }
        
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            //
            // $image_name = time() . '_' . $file->getClientOriginalName();
            $image_name = asset('uploads/product').'/'.time(). '_' . $file->getClientOriginalName();
            $file->move(public_path('/uploads/product'), $image_name);

            $img_product->main_image = $image_name;
        }
        $img_product->update();
        return redirect()->route('products.index')->with('status', 'Produto editado com sucesso');
        // dd($img_product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->is_deleted = true;
        $product->update();
        return redirect()->route('products.index')->with('status', 'Produto eliminado com sucesso');
    }
}
