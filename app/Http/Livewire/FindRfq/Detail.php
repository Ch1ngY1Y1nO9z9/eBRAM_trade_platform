<?php

namespace App\Http\Livewire\FindRfq;

use App\Models\Inquiry;
use App\Models\RFQ;
use Livewire\Component;

class Detail extends Component
{
    public $item;

    public $isOpen = 0;

    public $inquiry;

    public $allowSentInquiry = true;

    protected $rules = [
        'inquiry.number' => 'required',
        'inquiry.msg' => 'required',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function mount($id)
    {
        $this->item = RFQ::find($id);
        $this->inquiry = new Inquiry;

        // 檢查若有送出過單則隱藏送出按鈕
        $checkInquiry = Inquiry::where('seller_id',auth()->user()->id)->where('rfq_id', $this->item->id)->first();

        if($checkInquiry){
            $this->allowSentInquiry = false;
        }
    }

    public function render()
    {
        return view('livewire.find-rfq.detail');
    }

    public function sendInquire()
    {
        $this->item->seller_id = auth()->user()->id;
    }

    public function store()
    {
        $this->inquiry->buyer_id = $this->item->buyer_id;
        $this->inquiry->seller_id = auth()->user()->id;
        $this->inquiry->rfq_id = $this->item->id;
        $this->inquiry->product_name = $this->item->product_name;
        $this->inquiry->price = $this->item->product_number * $this->inquiry->number;
        $this->inquiry->status = 'unread';

        if($this->inquiry->save()){
            $this->inquiry = null;
            $this->allowSentInquiry = false;
            $this->closeModal();
            $this->emit('swal:success');
        }
    }
}
