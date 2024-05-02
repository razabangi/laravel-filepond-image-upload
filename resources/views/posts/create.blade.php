<x-layout>
    <x-slot:title>
        Postify | Create Post
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 md:max-w-xl md:mx-auto w-full">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold text-center">Create Post</h1>
                    </div>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input autocomplete="off" id="title" name="title" type="text"
                                        class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                        placeholder="Enter a title" />
                                    <label for="title"
                                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Enter a title</label>
                                </div>
                                <div class="relative mt-3">
                                    <textarea autocomplete="off" id="description" name="description" type="description"
                                        class="peer mt-10 placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                        placeholder="Decription"> </textarea>
                                    <label for="description"
                                        class="absolute mt-5 left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Desctiption</label>
                                </div>
                                <input type="file" name="image" />
                                <div class="relative">
                                    <button class="bg-blue-500 text-white rounded-md px-2 py-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
