<x-app-layout>
    <div class="py-12 background md:flex inline-flex">
        <div class="text-sm m-auto sm:px-6 lg:px-8 ">
            <figure class="relative flex flex-col-reverse rounded-lg p-6 card">
                <blockquote class="mt-6 text-slate-300">
                    <p>Email</p>
                </blockquote>
                <figcaption class="flex items-center space-x-4">
                    <div class="flex-auto">
                        <div class="text-base text-slate-900 font-semibold dark:text-slate-200">
                            John Doe
                        </div>
                        <div class="mt-0.5 dark:text-slate-300">
                            Web Developer
                        </div>
                    </div>
                </figcaption>
            </figure>
        </div>
    
    
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow rounded sm:rounded-lg card">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-800 shadow rounded sm:rounded-lg card">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-800 shadow rounded sm:rounded-lg card">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
    @include('profile.partials._footer')
</x-app-layout>
