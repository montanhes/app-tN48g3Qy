<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'quantity',
    ];

    public function productHistories()
    {
        return $this->hasMany(ProductHistory::class);
    }
}