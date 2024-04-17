<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-8">
                        <h2 class="text-2xl font-bold mb-4">Edit User</h2>
                        <form action="{{ route('users.update', $user) }}" method="POST" class="max-w-md">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block font-semibold">Name:</label>
                                <input type="text" id="name" name="name" class="w-full border rounded py-2 px-3" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block font-semibold">Email:</label>
                                <input type="email" id="email" name="email" class="w-full border rounded py-2 px-3" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Update</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
