<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Articles / Edit
            </h2>
            <a href="{{route('articles.index')}}" class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">Back</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <form action="{{ route('articles.update', $article->id) }}" method="POST">
                    @vite ('resources/css/app.css')
                    @csrf
                    <div>
                        <label for="name" class=" text-lg font-medium text-gray-900 dark:text-white">Title</label>
                        <div class="my-3">
                            <input value="{{old('title', $article)}}" name="title" placeholder="Title" type="text" class="border-gray-300 text-black rounded-lg shadow-sm  w-1/2">
                            @error('title')
                            <p class="text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-black-500 rounded-lg">
                        <label for="name" class=" text-lg font-medium text-gray-900 dark:text-white">Content</label>
                        <div class="my-3">
                            <textarea name="text" placeholder="Content" id="text" class="border-gray-300 text-black rounded-lg shadow-sm  w-1/2 h-40"> {{old('text', $article->text)}}</textarea>

                        </div>

                        <label for="name" class=" text-lg font-medium text-gray-900 dark:text-white">Author</label>
                        <div class="my-3">
                            <input value="{{old('author', $article->author)}}" name="author" placeholder="Author" type="text" class="border-gray-300 text-black rounded-lg shadow-sm  w-1/2">
                            @error('author')
                            <p class="text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>

                        <button class="bg-slate-700 hover:bg-slate-600 text-sm rounded-md px-4 py-3">Update</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
