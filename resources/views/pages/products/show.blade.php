@props([
    'name',
    'description',
    'price',
    'is_available',
])

<x-layout>
    <div class="m-4 space-y-6">
        <div class="w-full flex justify-between items-end">
            {{-- Heading --}}
            <x-heading
                title="{{ $product->name }}"
            />

            {{-- Create Button --}}
            <a href="/products/create" class="bg-amber-600 text-taupe-50 rounded-2xl py-1 px-3 hover:bg-amber-700">Edit Product</a>
        </div>

        <x-card.product-card :product=$product />
    </div>
</x-layout>