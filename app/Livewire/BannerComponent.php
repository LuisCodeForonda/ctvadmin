<?php

namespace App\Livewire;

use App\Models\Banner;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class BannerComponent extends Component
{
    use WithPagination;

    public $id;

    #[Rule('required')]
    public $titulo = '';

    #[Rule('image|max:1024')]
    public $image = '';

    public $modal = false;

    public function crear(){
        $this->abrirModal();
        $this->limpiar();
    }

    public function cerrarModal(){
        $this->modal = false;
    }

    public function abrirModal(){
        $this->modal = true;
    }

    public function save(){

        $this->validate();

        Banner::updateOrCreate(['id'=> $this->id],
        [
            'titulo' => $this->titulo,
            'image' => $this->image,
        ]);

        $this->cerrarModal();
        $this->limpiar();
    }

    public function edit($id){
        $banner = Banner::findOrFail($id);
        $this->id = $banner->id;
        $this->titulo = $banner->titulo;
        $this->image = $banner->hora;
        

        $this->abrirModal();
    }

    public function delete($id){
        Banner::find($id)->delete();
    }

    public function limpiar(){
        $this->id = '';
        $this->titulo = '';
        $this->image = '';
    }

    public function render()
    {
        return view('livewire.banner-component', ['data' => Banner::paginate(5)]);
    }
}
