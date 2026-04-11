<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use UnitEnum;

class Dropdown extends Component
{
	public string $label;
    public string $name;
    public ?array $options;
    public string $selected;

    public function __construct(string $label, string $name, ?array $options = [], $enumClass = null, string $selected = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->selected = $selected;

        if ($enumClass && is_subclass_of($enumClass, UnitEnum::class)) {
            $this->options = $enumClass::cases();

        } else {
            $this->options = $options;
        }
    }
   
    public function render(): View|Closure|string
    {
        return view('components.dropdown');
    }
}
