<?php

namespace App\Livewire;

use Livewire\Component;

class Parrafo extends Component
{

    public $texto = '';

    public function limpiar(){
        $this->texto = '';
    }

    public function render()
    {
        return view('livewire.parrafo');
    }
}
