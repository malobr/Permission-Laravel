<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Hello!') }} 
                    <span class="text-xl font-bold text-blue-500 dark:text-blue-300">
                        {{ Auth::user()?->name }},
                    </span>
                    {{ __('You\'re logged in') }}!
                </div>

                <!-- User Details -->
            </div>

            <div class="bg-white dark:bg-gray-800 mt-2 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">{{ __('Your Details') }}</h3>
                        <ul class="mt-2">
                            <li><strong>{{ __('Name:') }}</strong> <span class="text-indigo-500 dark:text-indigo-300">{{ Auth::user()?->name }}</span></li>
                            <li><strong>{{ __('Email:') }}</strong> <span class="text-indigo-500 dark:text-indigo-300">{{ Auth::user()?->email }}</span></li>
                            <li><strong>{{ __('Role:') }}</strong> <span class="text-indigo-500 dark:text-indigo-300">{{ Auth::user()?->roles->first()->name ?? __('No role assigned') }}</span></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
