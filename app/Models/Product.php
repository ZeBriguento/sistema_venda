<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'sell_price',
        'stock',
        'min_qty',
        'promotion',
        'is_deleted',
        // 'password',
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

}
