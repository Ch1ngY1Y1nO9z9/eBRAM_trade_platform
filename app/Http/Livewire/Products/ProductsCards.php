<?php

namespace App\Http\Livewire\Products;

use App\Models\Products;
use Livewire\Component;

class ProductsCards extends Component
{
    public $products;

    protected $listeners = ['refreshProducts'];

    public function mount()
    {
        $this->products = auth()->user()->Products;
    }

    public function render()
    {
        return view('livewire.products.products-cards');
    }

    public function getProductProperties($id)
    {
        return Products::find($id);
    }

    public function deleteProduct($id)
    {
        if($id){
            $this->getProductProperties($id)->delete();
            session()->flash('msg','Product Deleted Successfully!');
        }
    }

    public function refreshProducts()
    {
        $this->products = auth()->user()->Products->fresh();
    }
}
