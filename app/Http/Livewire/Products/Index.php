<?php

namespace App\Http\Livewire\Products;

use App\Models\RFQ;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.products.index');
    }
}