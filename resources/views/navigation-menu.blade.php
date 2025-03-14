<nav x-data="{ open: false }" class="border-gray-300 outline-black border dark:bg-gray-800"  aria-label="Main Navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="{{ route('welcome') }}">
                <img class="h-10 w-14" src="{{ asset('images/gifjam.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden sm:flex space-x-8">
            <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')" class="py-2">
                {{ __('Welcome') }}
            </x-nav-link>
            <x-nav-link href="{{ route('upload') }}" :active="request()->routeIs('upload')" class="py-2">
                {{ __('Upload') }}
            </x-nav-link>
            <x-nav-link href="{{ route('pictures.index') }}" :active="request()->routeIs('pictures.index')" class="py-2">
                {{ __('Gallery') }}
            </x-nav-link>
            @can('access-categories')
                <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')" class="py-2">
                    {{ __('Categories') }}
                </x-nav-link>
            @endcan
            @can('access-verification')
                <x-nav-link href="{{ route('verification.index') }}" :active="request()->routeIs('verification.index')" class="py-2">
                    {{ __('Verify') }}
                </x-nav-link>
            @endcan
        </div>
        

        <!-- Profile Section -->
        <div class="hidden sm:flex sm:items-center sm:ms-6 ">
            <div class="ms-3 relative">
                @if (!request()->routeIs('profile.show')) <!-- Hide buttons if route is profile -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50  transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}
                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>
                        <x-slot name="content">
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                        @endif
                </x-dropdown>
            </div>
        </div>

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Toggle navigation menu">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>


         <!-- Responsive Navigation Menu -->
         <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                    {{ __('Welcome') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('upload') }}" :active="request()->routeIs('upload')">
                    {{ __('Upload') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('pictures.index') }}" :active="request()->routeIs('pictures.index')">
                    {{ __('Gallery') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                @can('access-categories')
                    <x-responsive-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                        {{ __('Categories') }}
                    </x-responsive-nav-link>
                @endcan
            </div>
            <div class="pt-2 pb-3 space-y-1">
                @can('access-verification')
                    <x-responsive-nav-link href="{{ route('verification.index') }}" :active="request()->routeIs('verification.index')">
                        {{ __('Verify') }}
                    </x-responsive-nav-link>
                @endcan
            </div>
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif
                    <div>
                        <div class="font-medium text-base text-gray-500">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>