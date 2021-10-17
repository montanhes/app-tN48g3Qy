<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'operation',
        'product_id',
    ];

    protected $hidden = [
        'id',
        'product',
        'created_at',
        'updated_at',
        'product_id',
    ];

    protected $appends = [
        'sku',
        'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getSkuAttribute()
    {
        return $this->product->sku;
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('d/m/Y, H:i:s');
    }
}