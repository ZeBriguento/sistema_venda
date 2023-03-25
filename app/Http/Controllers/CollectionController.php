<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\Collection;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->rol == 'ADMIN') {
            $collections = Collection::where('is_deleted', '0')->get();
            return view('admin.collection.index', compact('collections'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        if (Auth::user()->rol == 'ADMIN') {
            $subCategories = SubCategory::where('is_deleted', '0')->get();
            return view('admin.collection.create', compact('subCategories'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollectionRequest $request)
    {
        //
        // dd($request->all());

        if (Auth::user()->rol == 'ADMIN') {
            Collection::create($request->all());
            return redirect()->route('collections.index')->with('status', 'Coleção criada com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //

        if (Auth::user()->rol == 'ADMIN') {
            return view('admin.collection.show', compact('collection'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //

        if (Auth::user()->rol == 'ADMIN') {

            $subCategories = SubCategory::where('is_deleted', '0');
            return view('admin.collection.edit', compact('subCategories', 'collection'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollectionRequest  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        //
        if (Auth::user()->rol == 'ADMIN') {

            $collection->update($request->all());
            return redirect()->route('collections.index')->with('status', 'Coleção editada com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //

        if (Auth::user()->rol == 'ADMIN') {

            $collection->is_deleted = true;
            $collection->update();
            return redirect()->route('collections.index')->with('status', 'Coleção eliminada com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }
}
