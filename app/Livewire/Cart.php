<?php

namespace App\Livewire;

use Laravel\Jetstream\InteractsWithBanner;
use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component
{
    use InteractsWithBanner;

    public function getItemsProperty()
    {
        return CartFactory::make()->items;
    }

    public function increment($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->increment('quantity');

        $this->dispatch('cartUpdated');
    }

    public function decrement($itemId)
    {
        $item = CartFactory::make()->items()->where('id', $itemId)->first();
        if ($item->quantity > 1) {
            $item->decrement('quantity');
            $this->dispatch('cartUpdated');
        }
    }

    public function delete($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->delete();

        $this->dangerBanner('Cart item removed');

        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
