<?php

namespace App\Services;

use App\Models\Product;
use App\Enums\Operation;
use App\Models\ProductHistory;

class ProductService
{
    public function create($arrayProduct): Product
    {
        $product = Product::create([
            "name" => $arrayProduct['name'],
            "sku" => mb_strtoupper($arrayProduct['sku'], 'UTF-8'),
            "quantity" => $arrayProduct['quantity'],
        ]);

        $this->createProductHistory($product, $product->quantity, Operation::IN);

        return $product;
    }

    public function createProductHistory(Product $product, $quantity, $operation): ProductHistory
    {
        return $product->productHistories()->create([
            'quantity' => $quantity,
            'operation' => $operation
        ]);
    }
}