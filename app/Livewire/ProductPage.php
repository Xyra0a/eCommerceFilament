<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPage extends Component
{
    use WithPagination;
    public function render()
    {

        $products = Product::query()->where('is_active', 1)->paginate(6);

        return view('livewire.product-page', [
            'products' => $products
        ]);
    }
}
