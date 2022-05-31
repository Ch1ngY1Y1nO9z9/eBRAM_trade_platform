<?php

namespace App\Http\Livewire\Products;

use App\Models\Products;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class UpdateProductForm extends Component
{
    public $product;

    protected $rules = [
        'product.type' => 'required',
        'product.product_name_en' => 'required',
        'product.detail_en' => 'required',
        'product.unit_price' => 'required',
        'product.weight' => 'nullable',
        'product.height' => 'nullable',
        'product.width' => 'nullable',
        'product.length' => 'nullable',
        'product.discount' => 'nullable',
        'product.country' => 'nullable',
        'product.safety' => 'nullable',
        'product.spec_url' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.products.update-product-form');
    }

    public function update()
    {
        $this->product->save();
        $this->emit('saved');
    }
}
