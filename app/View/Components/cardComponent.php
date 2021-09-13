<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $numberData;
    public $bgColor;
    public $textColor;

    public function __construct($title, $numberData, $bgColor, $textColor)
    {
        $this->title = $title;
        $this->numberData = $numberData;
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-component');
    }
}
