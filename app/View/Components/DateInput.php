<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DateInput extends Component
{

    public $required;
    public $name;
    public $label;
    public $model;
    public $placeholder;
    public $hidden;
    /**
     * @var null
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$value=null,$label = null ,$model=null,$placeholder = null,$required = false,$hidden = false)
    {
        $this->required = $required;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->hidden = $hidden;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.date-input');
    }
}
