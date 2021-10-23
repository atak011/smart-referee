<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectInput extends Component
{
    public $label;
    public $name;
    public $dataset;
    public $placeholder;
    public $multiple;
    public $id;
    public $hidden;
    /**
     * @var false
     */
    public $dataKeyValue;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = null, $name, $id = null, $dataset = null, $placeholder = null, $multiple = false, $hidden = false,$dataKeyValue = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->dataset = $dataset;
        $this->placeholder = $placeholder;
        $this->multiple = $multiple;
        $this->id = $id;
        $this->hidden = $hidden;
        $this->dataKeyValue = $dataKeyValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.select-input');
    }
}
