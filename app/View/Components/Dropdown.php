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
    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $name
     * @param string|null $enumClass Fully qualified Enum class name
     * @param mixed $selected
     */
    public function __construct($label, $name, $enumClass = null, $selected = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->selected = $selected;

        if ($enumClass && is_subclass_of($enumClass, UnitEnum::class)) {
            // Generate options from enum cases
            $this->options = $enumClass::cases();
        } else {
            $this->options = []; // fallback empty
        }
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown');
    }
}
