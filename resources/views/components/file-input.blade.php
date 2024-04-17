
@props(['id', 'name', 'class' => '', 'attributes' => []])

<input id="{{ $id }}" name="{{ $name }}" type="file" {{ $attributes->merge(['class' => 'focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md shadow-sm sm:text-sm border-gray-300']) }}>
