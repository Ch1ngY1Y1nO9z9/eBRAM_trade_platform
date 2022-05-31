<?php

namespace App\Http\Livewire\Find;

use App\Models\Products;
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
        $collection = Products::where('product_name_en', 'like', '%' . $this->search . '%')
            ->orWhere('product_name_zh', 'like', '%' . $this->search . '%')
            ->orWhere('product_name_cn', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'DESC')
            ->get();

        $items = $collection->forPage($this->page, $perPage);

        $paginator = new LengthAwarePaginator($items, $collection->count(), $perPage, $this->page);
        return view('livewire.find.index', [
            'products' => $paginator
        ]);
    }
}
