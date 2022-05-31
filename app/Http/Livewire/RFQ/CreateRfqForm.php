<?php

namespace App\Http\Livewire\RFQ;

use App\Models\RFQ;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRfqForm extends Component
{
    use WithFileUploads;

    public $rfq;

    public $photo;

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

    public function create()
    {
        $this->rfq->buyer_id = auth()->user()->id;

        $this->rfq->product_image = $this->photo->store('public/photos');

        if($this->rfq->save()){
            $this->emit('swal:success');
            $this->reset();
            $this->rfq = new RFQ();
            $this->emit('rfq:updateList');
        }
    }
}
