<?php

namespace App\Livewire;

use Laravel\Jetstream\InteractsWithBanner;
use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component
{
    use InteractsWithBanner;

    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    public function getItemsProperty()
    {
        return $this->cart->items;
    }

    public function increment($itemId)
    {
        $this->cart->items()->where('id', $itemId)->increment('quantity');

        $this->dispatch('cartUpdated');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->where('id', $itemId)->first();
        if ($item->quantity > 1) {
            $item->decrement('quantity');
            $this->dispatch('cartUpdated');
        }
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();

        $this->dangerBanner('Cart item removed');

        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
