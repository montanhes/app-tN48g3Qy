<?php

namespace App\Services;

use Throwable;
use App\Models\Product;
use App\Enums\Operation;
use Illuminate\Support\Str;
use App\Models\ProductHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductService
{
    public function create($arrayProduct): Product
    {
        try {
            DB::beginTransaction();
                $product = Product::create([
                    "name" => $arrayProduct['name'],
                    "sku" => Str::upper($arrayProduct['sku']),
                    "quantity" => $arrayProduct['quantity'],
                ]);

                $this->createProductHistory($product, $product->quantity, Operation::IN);
            DB::commit();
        } catch (Throwable $error) {
            DB::rollBack();
            throw $error;
        }

        return $product;
    }

    public function createProductHistory(Product $product, $quantity, $operation): ProductHistory
    {
        return $product->productHistories()->create([
            'quantity' => $quantity,
            'operation' => $operation
        ]);
    }

    public function handleProductQuantity(Product $product, $request): JsonResponse
    {
        $operation = intval($request->operation);

        if($operation == Operation::OUT && $product->quantity < $request->quantity) {
            return throw ValidationException::withMessages(['quantity' => 'Quantidade existente no estoque menor que a quantidade que deseja reduzir.']);
        }

        try {
            DB::beginTransaction();
                if($operation == Operation::OUT) {
                    $product->quantity -= $request->quantity;
                } else {
                    $product->quantity += $request->quantity;
                }

                $product->save();
                $productHistory = $this->createProductHistory($product, $request->quantity, Operation::fromValue($operation)->value);
            DB::commit();
        } catch (Throwable $error) {
            DB::rollBack();
            throw $error;
        }

        return response()->json($productHistory);
    }
}