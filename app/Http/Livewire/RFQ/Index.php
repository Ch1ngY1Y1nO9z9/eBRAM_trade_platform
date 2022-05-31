<?php

namespace App\Http\Livewire\RFQ;

use App\Models\RFQ;
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
        'rfq:delete' => 'delete',
        'rfq:updateList' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function delete($id)
    {
        RFQ::find($id)->delete();
        $this->emit('rfq:delete_success');
    }

    public function render()
    {
        $perPage = 10;

        $user = auth()->user();
        $collection = $user->RFQ($user->role)->get();
        $items = $collection->forPage($this->page, $perPage);
        $paginator = new LengthAwarePaginator($items, $collection->count(), $perPage, $this->page);


        return view('livewire.r-f-q.index', ['rfq_list' => $paginator]);
    }
}
