<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\Process\Process;

class Categories extends Component
{
    use WithPagination;

    public $search ='';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $list_categories = Category::where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('slug', 'LIKE', '%'.$this->search.'%')->orderBy('id','desc')->paginate(5);
        return view('livewire.categories', [
            'list_categories' => $list_categories
        ]);
    }
}
