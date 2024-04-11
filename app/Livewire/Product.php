<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use App\Models\Product as ModelsProduct;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;
    public $productID;

    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id'],
    ];

    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantID: $this->variant,
        );

        $this->banner('Product added to cart');

        $this->dispatch('productAddedToCart');
    }

    public function getProductProperty()
    {
        return ModelsProduct::findOrFail($this->productID);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
