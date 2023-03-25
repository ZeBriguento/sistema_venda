<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Collection;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use PhpParser\ErrorHandler\Collecting;

class CategoryController extends Controller
{
    public function index()
    {
        if (Auth::user()->rol == 'ADMIN') {
            $categories = Category::where('is_deleted', 0)->get();
            return view('admin.category.index', compact('categories'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
        
    }


    public function create()
    {
        if (Auth::user()->rol == 'ADMIN') {
            return view('admin.category.create');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
        
    }


    public function store(StorecategoryRequest $request)
    {
        
        if (Auth::user()->rol == 'ADMIN') {
            // dd('teste');
            Category::create($request->all());
            return redirect()->route('categories.index')->with('status', 'Categoria criada com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }


    public function show(Category $category)
    {
        if (Auth::user()->rol == 'ADMIN') {
            return view('admin.category.show', compact('category'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    public function edit(category $category)
    {
        if (Auth::user()->rol == 'ADMIN') {
            return view('admin.category.edit', compact('category'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    public function update(UpdatecategoryRequest $request, category $category)
    {
        
        if (Auth::user()->rol == 'ADMIN') {
            $category->update($request->all());
            return redirect()->route('categories.index')->with('status', 'Categoria editada com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }

    }

    public function destroy(category $category)
    {
        if (Auth::user()->rol == 'ADMIN') {
            $category->is_deleted = true;
            $category->update();
            // $subCategory = SubCategory::where('category_id', $category->id)->update(['is_deleted'=>true ]);
            // Collection::where('subcategory_id', $subCategory->id)->update(['is_deleted'=>true ]);
            // dd($SubCategory);
            return redirect()->route('categories.index')->with('status', 'Categoria eliminada com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }
}
