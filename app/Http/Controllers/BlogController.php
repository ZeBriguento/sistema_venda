<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\ImgBlog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->rol == 'ADMIN') {
            $blogs = Blog::where('is_deleted', '0')->get();
            return view('admin.blog.index', compact('blogs'));
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
        //
        if (Auth::user()->rol == 'ADMIN') {
            return view('admin.blog.create');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        //

        if (Auth::user()->rol == 'ADMIN') {
            $blog = new Blog;
            $img_blog = new ImgBlog;

            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->except = $request->except;
            $blog->status = $request->status;
            $blog->slug = Str::slug($blog->title, '-');
            $blog->user_id = Auth::user()->id;

            $blog->save();

            $img_blog->blog_id = $blog->id;
            $img_blog->img_url = $this->saveImage($request, 'blog', 'img_url');    

            $img_blog->save();
            return redirect()->route('blogs.index')->with('status', 'Blog criado com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
        if (Auth::user()->rol == 'ADMIN') {
            $img_blog = ImgBlog::where('blog_id', $blog->id)->first();
            // dd($img_blog);
            return view('admin.blog.show', compact('img_blog', 'blog'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        if (Auth::user()->rol == 'ADMIN') {
            // $collections = Collection::get()->where('is_deleted', '0');
            $img_blog = ImgBlog::get()->where('blog_id', $blog->id)->first();
            return view('admin.blog.edit', compact('blog', 'img_blog'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
        if (Auth::user()->rol == 'ADMIN') {
            
            // Blog
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->except = $request->except;
            $blog->slug = Str::slug($blog->title, '-', 'pt-ao');
            $blog->status = $request->status;
            $blog->user_id = Auth::user()->id;
            $blog->update();

            // IMG Blog
            $img_blog = ImgBlog::where('blog_id', $blog->id)->first();
            $image = $this->saveImage($request, 'blog', 'img_url'); 
            if ($image!=null) {
                $img_blog->img_url = $image;
                $img_blog->update();    
            }


            
            return redirect()->route('blogs.index')->with('status', 'Blog editado com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        if (Auth::user()->rol == 'ADMIN') {
            $blog->is_deleted = true;
            $blog->update();
            return redirect()->route('blogs.index')->with('status', 'Blog eliminado com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }
}
