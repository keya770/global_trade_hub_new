<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Detail extends Component
{
    public string $label;
    public $value;
    public bool $mono;

    public function __construct(string $label, $value = null, bool $mono = false)
    {
        $this->label = $label;
        $this->value = $value;
        $this->mono = $mono;
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.detail');
    }
}