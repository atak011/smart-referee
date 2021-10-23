<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationToast extends Component
{
    public $parameters;
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = null)
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->parameters = session()->get('notification-toast');
        if (!$this->parameters){
            $this->parameters['message'] = $this->message;
            $this->parameters['status'] = 'danger';
        }
        return view('components.notification-toast');
    }
}
