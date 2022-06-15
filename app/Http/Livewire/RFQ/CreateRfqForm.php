<?php

namespace App\Http\Livewire\RFQ;

use App\Models\RFQ;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Storage;

class CreateRfqForm extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $rfq;

    public $photo;

    public $listeners = [
        'rfq:edit' => 'edit',
        'rfq:resetInput' => 'resetInput'
    ];

    protected $rules = [
        'rfq.product_type' => 'required',
        'rfq.product_name' => 'required',
        'rfq.product_number' => 'required',
        'rfq.unit' => 'required',
        'rfq.detail' => 'required'
    ];

    protected $messages = [
        'rfq.product_type.required' => 'Product Type cannot be empty.',
        'rfq.product_name.required' => "Product Name cannot be empty.",
        'rfq.product_number.required' => "Require Number cannot be empty.",
        'rfq.unit.required' => "Unit cannot be empty.",
        'rfq.detail.required' => "Detail cannot be empty.",
        'photo.max' => "Image size is too big.",
    ];


    public function mount()
    {
        $this->rfq = new RFQ();
    }

    public function render()
    {
        return view('livewire.r-f-q.create-rfq-form');
    }

    public function resetInput()
    {
        $this->reset();
        $this->rfq = new RFQ();
        $this->photo = null;
    }

    public function edit($id)
    {
        $this->rfq = RFQ::find($id);
        if($this->rfq->product_image){
            $this->photo = Storage::url($this->rfq->product_image);
        }
    }

    public function store()
    {

        $this->validate();

        Validator::make(['photo' => $this->photo], ['photo' => ['image,max:1024']]);

        $this->rfq->buyer_id = auth()->user()->id;

        if($this->photo){
            $this->rfq->product_image = $this->photo->store('public/photos');
        }

        if ($this->rfq->save()) {
            $this->emit('swal:success');
            $this->reset();
            $this->rfq = new RFQ();
            $this->photo = null;
            $this->emit('rfq:updateList');
        }
    }

}
