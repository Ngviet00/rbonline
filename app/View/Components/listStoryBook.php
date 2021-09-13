<?php

namespace App\View\Components;

use Illuminate\View\Component;

class listStoryBook extends Component
{
    public $column;
    public $storyBooks;
    public function __construct($column, $storyBooks)
    {
        $this->column = $column;
        $this->$storyBooks = $storyBooks;
    }

    public function render()
    {
        return view('components.list-story-book');
    }
}
