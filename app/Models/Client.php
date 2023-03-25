<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'phone',
        'nif_number',
        'img_url',
        // 'password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
