<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $label, $name, $type, $value, $required, $class;

    public function __construct($label, $name, $type = 'text', $value = '', $required = false, $class = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->required = $required;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.form.input');
    }
    /**
     * Create a new component instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Get the view / contents that represent the component.
     */
    // public function render(): View|Closure|string
    // {
    //     return view('components.form.input');
    // }
}
