<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">
            {{ __('profile.delete_account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
            {{ __('profile.delete_account_warning') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('profile.delete_account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                {{ __('profile.delete_account_confirm') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" :value="__('profile.password')" class="sr-only dark:text-gray-300" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 dark:bg-gray-800 dark:text-white dark:border-gray-600"
                    placeholder="{{ __('profile.password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('profile.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('profile.delete_account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
