<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'operation',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}