@props([
    'product' => [
        'name',
        'description' => '...',
        'price',
        'is_available'
    ],
    'delete_button' => false,
    'show_button' => false,
    'edit_button' => false,
])

<x-card>
    {{-- Header --}}
    <x-card.card-header>
        <p class="font-bold">
            {{ $product->name }}
        </p>

        @if ($product->is_available)
            <div class="rounded-2xl font-semibold bg-green-500 text-taupe-50" shadow>
                <p class="py-1 px-3 text-xs">Available</p>
            </div>
        @else
            <div class="rounded-2xl font-semibold bg-taupe-200 text-taupe-950 shadow">
                <p class="p-1 px-3 text-xs">Closed</p>
            </div>
        @endif
    </x-card.card-header>

    {{-- Description --}}
    <x-card.card-content>
        <p class="text-sm line-clamp-2">
            {{ $product->description }}
        </p>

        <div class="flex justify-between">
            <div class="text-sm">
                <p>₱{{ $product->price }}</p>
            </div>

            <div class="flex">
                <a 
                    href="products/{{ $product->id }}" 
                    class="py-1 px-2 rounded-2xl text-xs font-semibold text-amber-800 hover:bg-taupe-100 hover:text-amber-600
                    {{ $show_button ? 'block' : 'hidden' }}"
                >Show</a>

                <a 
                    href="products/{{ $product->id }}" 
                    class="py-1 px-2 rounded-2xl text-xs font-semibold text-indigo-900 hover:bg-taupe-100 hover:text-indigo-500
                    {{ $edit_button ? 'block' : 'hidden' }}"
                >Edit</a>

                <a 
                    href="products/{{ $product->id }}" 
                    class="py-1 px-2 rounded-2xl text-xs font-semibold text-red-800 hover:bg-taupe-100 hover:text-red-500
                    {{ $delete_button ? 'block' : 'hidden' }}"
                >Delete</a>
            </div>
        </div>
    </x-card.card-content>
</x-card>