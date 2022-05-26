<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;

class CreateProductForm extends Component
{
    public $product = [];

    protected $rules = [
        'product.usr_id' => 'required',
        'product.product' => 'required',
        'product.name_en' => 'required',
        'product.detail' => 'required',
        'product.unit_price' => 'required',
        'product.weight' => 'nullable',
        'product.height' => 'nullable',
        'product.widht' => 'nullable',
        'product.length' => 'nullable',
        'product.discount' => 'nullable',
        'product.country' => 'nullable',
        'product.safety' => 'nullable',
        'product.spec_url' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.create-product-form');
    }

    public function updateLocalization()
    {
        $this->validate();

        Products::create($this->product);
        $this->emit('saved');
    }
}
