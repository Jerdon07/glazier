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
        </div>

        <x-card.product-card 
            :product=$product 
            edit_button
            delete_button
        />
    </div>
</x-layout>