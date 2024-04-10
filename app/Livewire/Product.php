<?php

namespace App\Livewire;

use App\Models\Product as ModelsProduct;
use Livewire\Component;

class Product extends Component
{
    public $productID;

    public function mount()
    {

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
