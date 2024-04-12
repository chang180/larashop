<?php

namespace App\Actions\Webshop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductVariantToCart
{
    public function add($variantID)
    {
        CartFactory::make()->items()->firstOrCreate([
            'product_variant_id' => $variantID,
        ], [
            'quantity' => 0,
        ])->increment('quantity');
    }
}
