<nav x-data="{ open: false }">
    <!-- Header -->
    <header class="bg-black font-poppins py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a
                href="/dashboard"
                class="text-gray-400 text-6xl uppercase tracking-wide font-protest"
            >
                <x-application-logo
                    class="block h-6 w-auto fill-current text-gray-800 dark:text-gray-200"
                />
            </a>
            <nav class="hidden md:flex space-x-10">
                <a href="/dashboard" class="text-2xl text-neutral-500 hover:text-gray-300"><i class="fa-solid fa-house"></i> Home</a>
                <a href="/games" class="text-2xl text-neutral-500 hover:text-gray-300"><i class="fa-solid fa-gamepad"></i> Games</a>
                <a href="/library" class="text-2xl text-neutral-500 hover:text-gray-300"><i class="fa-solid fa-briefcase"></i> Library</a>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 rounded bg-transparent text-2xl text-gray-300 hover:bg-neutral-500">
                                <div class="mr-2 text-2xl"><i class="fa-solid fa-user"></i></div>
                                <div class="text-xl">{{ Auth::user()->name }}</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile Settings') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </nav>
            <button class="md:hidden" @click="open = !open">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </header>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Home') }}</x-responsive-nav-link>
            <x-responsive-nav-link href="/games">{{ __('Games') }}</x-responsive-nav-link>
            <x-responsive-nav-link href="/library">{{ __('Library') }}</x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>