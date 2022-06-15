<?php

namespace App\Http\Livewire\Notification;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $sortField = 'title';

    public $sortDirection = 'asc';

    public $selectType = [];

    public $checkedItem = [];

    public $listeners = [
        'inq:delete' => 'delete'
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $perPage = 10;

        $user = auth()->user();
        $collection = $user->Inquiry($user->role)->get();
        $items = $collection->forPage($this->page, $perPage);
        $paginator = new LengthAwarePaginator($items, $collection->count(), $perPage, $this->page);

        $this->changeStatus();

        return view('livewire.notification.index', ['list' => $paginator]);
    }

    public function changeStatus()
    {
        $user = auth()->user();
        $list = $user->Inquiry($user->role)->where('status','unread')->get();

        foreach($list as $inq){
            $inq->status = 'read';
            $inq->save();
        }
    }

    public function delete($id)
    {
        $inq = Inquiry::find($id);

        $inq->delete();
        $this->emit('inq:delete_success');
    }
}
