<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ImageUpload extends Component
{
    public $name;
    public $label;
    public $currentImage;
    public $required;
    public $accept;
    public $maxSize;

    public function __construct($name, $label, $currentImage = null, $required = false, $accept = 'image/*', $maxSize = '2MB')
    {
        $this->name = $name;
        $this->label = $label;
        $this->currentImage = $currentImage;
        $this->required = $required;
        $this->accept = $accept;
        $this->maxSize = $maxSize;
    }

    public function render()
    {
        return view('components.admin.image-upload');
    }
}
