<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_url',
        'main_image',
       
        
        // 'password',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
