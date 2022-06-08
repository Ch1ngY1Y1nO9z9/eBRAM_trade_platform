<?php

namespace App\Http\Livewire\RFQ;

use App\Models\RFQ;
use Livewire\Component;
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
        'resetInput'
    ];

    public function mount()
    {
        $this->rfq = new RFQ();
    }

    protected $rules = [
        'rfq.product_type' => 'required',
        'rfq.product_name' => 'required',
        'rfq.product_number' => 'required',
        'rfq.unit' => 'required',
        'rfq.detail' => 'required'
    ];

    public function render()
    {
        return view('livewire.r-f-q.create-rfq-form');
    }

    public function resetInput()
    {
        $this->reset();
        $this->rfq = null;
        $this->photo = null;
    }

    public function edit($id)
    {
        $this->rfq = RFQ::find($id);
        $this->photo = Storage::url($this->rfq->product_image);
    }

    public function store()
    {

        $this->validate();

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
