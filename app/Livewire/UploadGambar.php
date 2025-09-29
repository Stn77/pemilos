<?php

namespace App\Livewire;

use Livewire\Component;

class UploadGambar extends Component
{

    public $modalDelete = false;

    public function render()
    {
        return view('livewire.upload-gambar');
    }
}
