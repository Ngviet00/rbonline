<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
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
        $books = Book::where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('slug', 'LIKE', '%'.$this->search.'%')->paginate(4);
        return view('livewire.books',compact('books'));
    }
}
