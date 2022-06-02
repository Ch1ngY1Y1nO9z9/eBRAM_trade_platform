<?php

namespace App\Http\Livewire\FindRfq;

use App\Models\RFQ;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // 紀錄搜尋內容
    public $search;

    // 更新搜尋畫面
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // 抓取搜尋結果放到畫面
    public function render()
    {
        $perPage = 10;
        $collection = RFQ::where('product_type', 'like', '%' . $this->search . '%')
            ->orWhere('product_name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'DESC')
            ->get();

        $items = $collection->forPage($this->page, $perPage);

        $paginator = new LengthAwarePaginator($items, $collection->count(), $perPage, $this->page);
        return view('livewire.find-rfq.index', [
            'rfq_list' => $paginator
        ]);
    }

}
