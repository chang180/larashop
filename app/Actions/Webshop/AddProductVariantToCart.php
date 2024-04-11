<?php

namespace App\Actions\Webshop;

use App\Models\Cart;

class AddProductVariantToCart
{
    public function add($variantID)
    {
        if(auth()->guest()) {
            $cart = Cart::firstOrCreate([
                'session_id' => session()->getId(),
            ]);
        }

        if(auth()->user()) {
            $cart = auth()->user()->cart()->firstOrCreate();
        }

        dd($cart);
    }
}
