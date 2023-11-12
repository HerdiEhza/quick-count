<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Forms\LogoutForm;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.qc')" :active="request()->routeIs('dashboard.qc')" wire:navigate>
                        {{ __('QC Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('qc.input-suara')" :active="request()->routeIs('qc.input-suara')" wire:navigate>
                        {{ __('QC Input Suara') }}
                    </x-nav-link>
                    <x-nav-link :href="route('timses.dashboard')" :active="request()->routeIs('timses.dashboard')" wire:navigate>
                        {{ __('TIMSES Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('timses.input-timses')" :active="request()->routeIs('timses.input-timses')" wire:navigate>
                        {{ __('TIMSES Input Timses') }}
                    </x-nav-link>
                    <x-nav-link :href="route('timses.input-relawan')" :active="request()->routeIs('timses.input-relawan')" wire:navigate>
                        {{ __('TIMSES Input Relawan') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown-laravel align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-laravel-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-laravel-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-left">
                            <x-dropdown-laravel-link>
                                {{ __('Log Out') }}
                            </x-dropdown-laravel-link>
                        </button>
                    </x-slot>
                </x-dropdown-laravel>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard.qc')" :active="request()->routeIs('dashboard.qc')" wire:navigate>
                {{ __('QC Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('qc.input-suara')" :active="request()->routeIs('qc.input-suara')" wire:navigate>
                {{ __('QC Input Suara') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('timses.dashboard')" :active="request()->routeIs('timses.dashboard')" wire:navigate>
                {{ __('TIMSES Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('timses.input-timses')" :active="request()->routeIs('timses.input-timses')" wire:navigate>
                {{ __('TIMSES Input Timses') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('timses.input-relawan')" :active="request()->routeIs('timses.input-relawan')" wire:navigate>
                {{ __('TIMSES Input Relawan') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200" x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-left">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
