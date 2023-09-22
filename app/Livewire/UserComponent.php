<?php

namespace App\Livewire;

use \App\Models\User;
use Illuminate\Validation\Rules;
use Livewire\Component;


class UserComponent extends Component
{
    public $id;

    public $name;

    public $email;
    
    public $password;

    public $password_confirmation;

    public $modal = false;

    public function crear(){
        $this->modal = true;
    }

    public function save(){
        $validated = $this->validate([ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        User::create($validated);

        $this->modal = false;
        $this->limpiar();
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;

        $this->modal = true;
    }

    public function delete($id){
        User::findOrFail($id)->delete();
    }

    public function limpiar(){
        $this->id = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.user-component', ['data' => \App\Models\User::paginate(5)]);
    }
}
