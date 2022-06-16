<?php

namespace App\Http\Livewire\Products;

use App\Models\Products;
use Illuminate\Support\Facades\Validator;
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

    protected $messages = [
        'product.type.required' => 'Product Type cannot be empty.',
        'product.product_name_en.required' => "Product Name cannot be empty.",
        'product.detail_en.required' => "Product Detail cannot be empty.",
        'product.unit_price.required' => "Price cannot be empty.",
        'photo.max' => "Image size is too big.",
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
        $this->product = new Products;;
        $this->photo = null;
    }

    public function edit($id)
    {
        $this->product = Products::find($id);
        if($this->product->photo1){
            $this->photo = Storage::url($this->product->photo1);
        }
    }

    public function store()
    {
        $this->validate();

        Validator::make(['photo' => $this->photo], ['photo' => ['image,max:1024']]);

        $this->product->usr_id = auth()->user()->id;

        if ($this->photo) {
            $this->product->photo1 = $this->photo->store('public/photos');
        }

        if ($this->product->save()) {
            $this->emit('swal:success');
            $this->reset();
            $this->emit('pd:updateList');
        };
    }
}
