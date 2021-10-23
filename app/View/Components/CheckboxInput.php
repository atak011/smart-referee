<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CheckboxInput extends Component
{

    public $name;
    public $label;
    public $value;
    /**
     * @var false
     */
    public $checked;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label,$value=null, $checked = false)
    {
        //
        $this->name = $name;
        $this->label = $label;
        $this->checked = $checked;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkbox-input');
    }
}
