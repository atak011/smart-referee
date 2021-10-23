<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileuploadInput extends Component
{
    public $multiple;
    public $image;
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$multiple = false,$image = null)
    {
        //
        $this->multiple = $multiple;
        $this->image = $image;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fileupload-input');
    }
}
