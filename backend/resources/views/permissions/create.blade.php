<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form action="">
                    <div>
                        <label for="name" class=" text-lg font-medium text-gray-900 dark:text-white">Name</label>
                        <div class="my-3">
                            <input placeholder="Enter Name" type="text" class="border-gray-300 rounded-lg shadow-sm  w-1/2">
                        </div>
                        <button class="bg-slate-200 text-sm rounded-md px-5 py-4">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
