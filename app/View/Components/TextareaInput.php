<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextareaInput extends Component
{
    public $label;
    public $name;
    public $placeholder;
    public $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$placeholder,$model = null ,$label = null)
    {
        //
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.textarea-input');
    }
}
