<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'color',
        'size',
        'material',
        
        // 'password',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
