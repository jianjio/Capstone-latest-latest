<section class="space-y-6">

    {{-- header of the delete password  --}}

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        {{-- short description warning about deleting the account  --}}

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, game over') }}
        </p>
    </header>

    {{-- delete account button  --}}

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    {{-- modal pop-up for deleting the account  --}}

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 card">
            @csrf
            @method('delete')

            {{-- header for comfirming the deletion of the account  --}}

            <h2 class="text-lg font-medium text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            {{-- short description for deleting the account  --}}

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, GAME OVER.') }}
            </p>

            {{-- password input for account deletion --}}

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            {{-- cancel button for deleting the account  --}}

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                {{-- delete button  --}}

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
