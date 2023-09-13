<div>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit="save">
        <input type="text" wire:model.live="texto">
    </form>
    <h2>{{ $texto }}</h2>
    @include('livewire.dato')
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique eius id delectus officiis fugiat quo doloremque, esse illum reprehenderit recusandae ipsa sed libero consectetur culpa suscipit! Temporibus dolor blanditiis id.</p>
</div>
