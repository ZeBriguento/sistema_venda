<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveImage(Request $request, string $path='', string $img_name = '' )
    {   
        if ($request->hasFile($img_name)) {
            $file = $request->file($img_name);
            $extension = $request->file($img_name)->guessExtension();
            $image_name = strtolower(trim(asset('uploads/'.$path).'/'.time(). '.' .$extension));
            $file->move(public_path('uploads/'.$path), $image_name);
            return $image_name;
        }
        return null;
    }
}
