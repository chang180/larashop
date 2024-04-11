<?php

namespace App\Actions\Webshop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductVariantToCart
{
    public function add($variantID)
    {
        $cart = CartFactory::make()->items()->create([
            'product_variant_id' => $variantID,
            'quantity' => 1,
        ]);
    }
}
