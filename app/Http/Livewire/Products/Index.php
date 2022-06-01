<?php

namespace App\Http\Livewire\Products;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{
    use WithPagination;

    public $sortField = 'title';

    public $sortDirection = 'asc';

    public $selectType = [];

    public $checkedItem = [];

    public $listeners = [
        'pd:delete' => 'delete',
        'pd:updateList' => '$refresh'
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

    public function delete($id)
    {
        Products::find($id)->delete();
        $this->emit('pd:delete_success');
    }

    public function render()
    {
        $perPage = 10;

        $user = auth()->user();
        $collection = $user->Products()->get();
        $items = $collection->forPage($this->page, $perPage);
        $paginator = new LengthAwarePaginator($items, $collection->count(), $perPage, $this->page);

        return view('livewire.products.index', ['products' => $paginator]);
    }
}
