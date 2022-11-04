<x-app-layout>
    <x-slot name="header">
        <h2 class="m-2 text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
            <div class="flex flex-row justify-start m-2">
                <p class="m-2 uppercase">TU(S) ROLE(S) ACTUAL ES:</p>
                @foreach ($user->roles as $role)
                    <p class="m-2 underline uppercase text-large">{{ $role->role }}</p>
                @endforeach
            </div>
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (Auth::user()->hasRoles('BLOQUEADO'))

                <x-blocked-contact-form></x-blocked-contact-form>
                <x-jet-section-border />

            @elseif (!Auth::user()->hasVerifiedEmail())
            <div class="flex flex-col justify-end">
                <h2>
                    DEBES VERIFICAR TU MAIL ANTES DE PODER CREAR ANUNCIOS O REALIZAR OFERTAS. TE DEJAMOS ESTE LINK PARA QUE PROCEDAS
                </h2>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Resend Verification Email') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>

                <x-jet-section-border />
            @endif
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
