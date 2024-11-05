<x-app-layout>

    {{-- profile settings --}}
    
    <div class="py-12 background">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- update profile  --}}

            <div class="p-4 sm:p-8 bg-gray-800 shadow rounded sm:rounded-lg card">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- update password  --}}

            <div class="p-4 sm:p-8 bg-gray-800 shadow rounded sm:rounded-lg card">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- delete account  --}}

            <div class="p-4 sm:p-8 bg-gray-800 shadow rounded sm:rounded-lg card">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    @include('profile.partials._footer')
</x-app-layout>
