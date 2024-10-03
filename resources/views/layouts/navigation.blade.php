<nav x-data="{ open: false }" style="background-color: #1E40AF; border-bottom: 1px solid #1E3A8A;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto" style="fill: white;" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" style="color: white;">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" style="color: white;">
                        {{ __('Catégories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('subcategories.index')" :active="request()->routeIs('subcategories.index')" style="color: white;">
                        {{ __('Sous Catégories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('subsubcategories.index')" :active="request()->routeIs('subsubcategories.index')" style="color: white;">
                        {{ __('Sous sous Catégories') }}
                    </x-nav-link>
                    <!-- Lien pour les Articles -->
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')" style="color: white;">
                        {{ __('Articles') }}
                    </x-nav-link>
                    <!-- Lien pour le Portfolio -->
                    <x-nav-link :href="route('admin.portfolios.index')" :active="request()->routeIs('admin.portfolios.index')" style="color: white;">
                        {{ __('Portfolio') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button style="color: white; background-color: #1E40AF;" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" style="color: #1E40AF;">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" style="color: #1E40AF;">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
