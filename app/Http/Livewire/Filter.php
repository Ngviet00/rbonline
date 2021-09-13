<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class Filter extends Component
{
    public $type = null;
    public $orderBy = null;
    public $sortBy = null;
    public $view = null;

    public function render()
    {
        $listBooks = Book::when($this->type, function ($query){
                $query->where('category_id','=', $this->type);})
            ->when($this->orderBy, function ($query){
                if ($this->orderBy == "1"){
                    $query->where('outstanding', 1);
                }else if ($this->orderBy == "2"){
                    $query->where('outstanding', 0);
                }
            })
            ->when($this->sortBy, function ($query){
                $query->orderBy('id', $this->sortBy);
            })
            ->when($this->view, function ($query){
                if($this->view == "<1k"){
                    $query->where('view', '<', 1000);
                }else if ($this->view == "1k-2k"){
                    $query->whereBetween('view', [1000, 2000]);
                }else if ($this->view == "2k-5k"){
                    $query->whereBetween('view', [2000, 5000]);
                }else if ($this->view == "5k-10k"){
                    $query->whereBetween('view', [5000, 10000]);
                }else{
                    $query->where('view', '>', 10000);
                }
            })
            ->get();
        return view('livewire.filter')->with(compact('listBooks'));
    }

    public function deleteFilter(){
        $this->type = null;
        $this->orderBy = null;
        $this->sortBy = null;
        $this->view = null;
    }
}
