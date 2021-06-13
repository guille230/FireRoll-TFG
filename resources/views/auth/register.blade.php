<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full my-4" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="age" value="{{ __('Edad') }}" />
                <x-jet-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus autocomplete="age" />
            </div>

            <div class="mt-4">
                <x-jet-label for="country" value="{{ __('Pais') }}" />
                <x-jet-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
            </div>

            <div class="mt-4">
                <x-jet-label for="location" value="{{ __('Ciudad') }}" />
                <x-jet-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" autofocus autocomplete="location" />
            </div>
        
            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('Direccion') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-jet-label for="cp" value="{{ __('Codigo Postal') }}" />
                <x-jet-input id="cp" class="block mt-1 w-full" type="number" name="cp" :value="old('cp')" autofocus autocomplete="cp" />
            </div>

            <div class="mt-4">
                <x-jet-label for="preferences" value="{{ __('Preferencias') }}" />
                <div class=" form-outline">
                    <select class="form-outline w-100 rounded" id="preferences" name="preferences" aria-label="Sistema" style="position: relative;width:100%;" required>
                        <option value="DnD">DnD</option>
                        <option value="Anima">Anima</option>
                        <option value="Pathfinder">Pathfinder</option>
                        <option value="Aquelarre">Aquelarre</option>
                        <option value="BurnBryte">BurnBryte</option>
                        <option value="Call of Cthulhu">Call of Cthulhu</option>
                        <option value="Fate">Fate</option>
                      </select>
                </div>
            </div>

            <div>
                <x-jet-input id="bio" class="block mt-1 w-full" type="hidden" name="bio" :value="'Tu bio va aqui'" autofocus/>
            </div>
            
            <div>
                <x-jet-input id="iconousado" class="block mt-1 w-full" type="hidden" name="iconousado" :value=1 autofocus autocomplete="iconousado" />
            </div>

            <div>
                <x-jet-input id="bannerusado" class="block mt-1 w-full" type="hidden" name="bannerusado" :value=1 autofocus autocomplete="bannerusado" />
            </div>

            <div>
                <x-jet-input id="type" class="block mt-1 w-full" type="hidden" name="type" :value=1 required autofocus autocomplete="type" />
            </div>

            <div>
                <x-jet-input id="games" class="block mt-1 w-full" type="hidden" name="games" :value="'0'" required autofocus autocomplete="games" />
            </div>
           

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
