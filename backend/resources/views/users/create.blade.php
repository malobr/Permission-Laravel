<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Users / Create
            </h2>
            <a href="{{route('users.index')}}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Back</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form action="{{ route('users.store')}}" method="POST">
                    @vite ('resources/css/app.css')
                    @csrf
                    <div>
                        <label for="name" class=" text-lg font-medium text-gray-900 dark:text-white">Name</label>
                        <div class="my-3">
                            <input value="{{old('name')}}" name="name" placeholder="Enter Name" type="text" class="border-gray-300 text-black rounded-lg shadow-sm  w-1/2">
                            @error('name')
                              <p class="text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <label for="email" class=" text-lg font-medium text-gray-900 dark:text-white">E-mail</label>
                        <div class="my-3">
                            <input value="{{old('email')}}" name="email" placeholder="Enter email" type="text" class="border-gray-300 text-black rounded-lg shadow-sm  w-1/2">
                            @error('email')
                              <p class="text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <label for="email" class=" text-lg font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="my-3">
                            <input value="{{old('password')}}" name="password" placeholder="Enter Password" type="password" class="border-gray-300 text-black rounded-lg shadow-sm  w-1/2">
                            @error('password')
                              <p class="text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <label for="email" class=" text-lg font-medium text-gray-900 dark:text-white">Confirm Password</label>
                        <div class="my-3">
                            <input value="{{old('confirm_password')}}" name="confirm_password" placeholder="Confirm your Password" type="password" class="border-gray-300 text-black rounded-lg shadow-sm  w-1/2">
                            @error('confirm_password')
                              <p class="text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-4 mb-3">
                            @if ($roles->isNotEmpty())
                                @foreach ($roles as $role)
                                    <div class="mt-3">
                                    <input type="checkbox" id="role-{{$role->id}}" class="rounded" name="role[]" value="{{$role->name}}" >
                                       {{-- {{ $hasRoles->contains($role->id) ? 'checked' : '' }} --}}
                                    <label for="role-{{$role->id}}">{{$role->name}}</label>

                                    </div>     
                                @endforeach
                            @endif
                        </div>

                        <button class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md px-4 py-3">Create</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
