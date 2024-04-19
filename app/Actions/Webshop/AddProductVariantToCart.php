<?php

namespace App\Actions\Webshop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductVariantToCart
{
    public function add($variantID, $quantity = 1, $cart = null)
    {
        ($cart ?: CartFactory::make())->items()->firstOrCreate([
            'product_variant_id' => $variantID,
        ], [
            'quantity' => 0,
        ])->increment('quantity', $quantity);
    }
}
