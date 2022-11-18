<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert1 extends Component
{
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type='succes')
    {
        //
        switch ($type) {
            case 'danger':
            $class="alert-danger";
            # code...
            break;
        
            case 'success':
            $class="alert-success";
            # code...
            break;
         
        default:
            $class="alert-primary";
            # code...
            break;
    }
    $this->class=$class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert1');
    }
}
