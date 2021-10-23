<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddButton extends Component
{

    public $href;
    public $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href,$model)
    {
        $this->href = $href;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-button');
    }
}
