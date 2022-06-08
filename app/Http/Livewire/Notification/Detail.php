<?php

namespace App\Http\Livewire\Notification;

use App\Models\Inquiry;
use Livewire\Component;

class Detail extends Component
{
    public $inquiry;

    public function mount($id)
    {
        $this->inquiry = Inquiry::find($id);
    }

    public function render()
    {
        return view('livewire.notification.detail');
    }
}
