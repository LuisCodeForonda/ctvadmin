<!-- Main modal -->
<div
    class="fixed top-0 left-0 z-10 w-full h-screen p-4 overflow-hidden md:inset-0 bg-gray-600/50 flex justify-center items-center">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Añadir nuevo
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form wire:submit="save">


                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name"
                            name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email"
                            name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" wire:model="password"
                            name="password" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            wire:model="password_confirmation" name="password_confirmation" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Status Address -->
                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Habilitar Usuario')" />
                        <x-text-input id="status" class="block mt-1 w-5 h-5" type="checkbox" wire:model="status"
                            name="status" checked  />
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ml-4">
                            @if ($id == '')
                                {{ __('Register') }}
                            @else
                                {{ __('Actualizar') }}
                            @endif
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
