<?php

namespace App\Actions\Webshop;

use App\Models\Cart;

class AddProductVariantToCart
{
    public function add($variantID)
    {
        $cart = match(auth()->guest()){
            true => Cart::firstOrCreate([
                'session_id' => session()->getId(),
            ]),
            false => auth()->user()->cart()->firstOrCreate(),
        };

        $cart->items()->create([
            'product_variant_id' => $variantID,
            'quantity' => 1,
        ]);
    }
}
