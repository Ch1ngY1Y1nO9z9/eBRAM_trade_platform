<?php

namespace App\Http\Livewire\Products;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateProductForm extends Component
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

    public function mount()
    {
        $this->product = new Products;
    }

    public function render()
    {
        return view('livewire.products.create-product-form');
    }

    public function create()
    {
        $this->validate();

        $this->product->usr_id = Auth::user()->id;

        if($this->product->save()){
            $this->emit('saved');
            $this->reset();
            $this->product = new Products;
            $this->emit('refreshProducts');
        };
    }
}
