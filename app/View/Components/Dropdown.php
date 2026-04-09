<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use UnitEnum;

class Dropdown extends Component
{
	public $label;
    public $name;
    public $options;
    public $selected;

    public function __construct($label, $name, $enumClass = null, $selected = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->selected = $selected;

        if ($enumClass && is_subclass_of($enumClass, UnitEnum::class)) {
           
            $this->options = $enumClass::cases();
        } else {
            $this->options = []; 
        }
    }
   
    public function render(): View|Closure|string
    {
        return view('components.dropdown');
    }
}
