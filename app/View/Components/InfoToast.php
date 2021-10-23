<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoToast extends Component
{
    public $parameters;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->parameters = session()->get('info-toast');
        return view('components.info-toast');
    }
}
