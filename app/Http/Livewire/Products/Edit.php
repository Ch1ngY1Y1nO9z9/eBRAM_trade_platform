<?php

namespace App\Http\Livewire\Products;

use App\Models\Products;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class Edit extends Component
{
    public $product;

    public function mount($id)
    {
        $product = Products::find($id);
        if($product->usr_id == auth()->user()->id){
            $this->product = $product;
        }else{
            return App::abort(403, 'Unauthorized action.');
        }
    }

    public function getProductProperties($id)
    {
        return Products::find($id);
    }

    public function render()
    {
        return view('livewire.products.edit');
    }
}
