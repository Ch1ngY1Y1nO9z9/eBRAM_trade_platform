<?php

namespace App\Http\Livewire\Products;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Storage;

class CreateProductForm extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $product;

    public $photo;

    public $listeners = [
        'pd:edit' => 'edit',
        'resetInput'
    ];

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

    public function resetInput()
    {
        $this->reset();
        $this->product = null;
        $this->photo = null;
    }

    public function edit($id)
    {
        $this->product = Products::find($id);
        $this->photo = Storage::url($this->product->photo1);
    }

    public function store()
    {
        $this->validate();

        $this->product->usr_id = auth()->user()->id;

        if($this->photo){
            $this->product->photo1 = $this->photo->store('public/photos');
        }

        if($this->product->save()){
            $this->emit('swal:success');
            $this->reset();
            $this->product = new Products;
            $this->photo = null;
            $this->emit('pd:updateList');
        };
    }
}
