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

                <form action="{{ route('permissions.store') }}" method="POST">
                    @vite ('resources/css/app.css')
                    @csrf
                    <div>
                        <label for="name" class=" text-lg font-medium text-gray-900 dark:text-white">Name</label>
                        <div class="my-3">
                            <input value="{{old('name')}}" name="name" placeholder="Enter Name" type="text" class="border-gray-300 rounded-lg shadow-sm  w-1/2">
                            @error('name')
                              <p class="text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <button class="bg-slate-700 text-sm rounded-md px-4 py-3">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
