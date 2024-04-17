<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User creation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-8">
                        <h2 class="text-2xl font-bold mb-4">Create User</h2>
                        <form action="{{ route('users.store') }}" method="POST" class="max-w-md">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block font-semibold">Name:</label>
                                <input type="text" id="name" name="name" class="w-full border rounded py-2 px-3" value="{{ old('name') }}" >
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block font-semibold">Email:</label>
                                <input type="email" id="email" name="email" class="w-full border rounded py-2 px-3" value="{{ old('email') }}" >
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block font-semibold">Password:</label>
                                <input type="password" id="password" name="password" class="w-full border rounded py-2 px-3">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Create</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
