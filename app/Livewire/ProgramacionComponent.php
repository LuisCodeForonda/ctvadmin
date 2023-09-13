<?php

namespace App\Livewire;

use App\Models\Programacion;
use Livewire\Component;
use Livewire\WithPagination;

class ProgramacionComponent extends Component
{
    use WithPagination;

    public $id, $titulo, $hora, $horario;
    public $modal = false;
    public $paginado = 5;
    public $search = '';

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
        Programacion::updateOrCreate(['id'=> $this->id],
        [
            'titulo' => $this->titulo,
            'hora' => $this->hora,
            'horario' => $this->horario
        ]);

        $this->cerrarModal();
        $this->limpiar();
    }

    public function edit($id){
        $programacion = Programacion::findOrFail($id);
        $this->id = $programacion->id;
        $this->titulo = $programacion->titulo;
        $this->hora = $programacion->hora;
        $this->horario = $programacion->horario;

        $this->abrirModal();
    }

    public function delete($id){
        Programacion::find($id)->delete();
    }

    public function limpiar(){
        $this->id = '';
        $this->titulo = '';
        $this->hora = '';
        $this->horario = '';
    }

    public function render()
    {
        return view('livewire.programacion-component', ['data' => Programacion::where('titulo', 'LIKE', "%".$this->search."%")->paginate($this->paginado)]);
    }
}
