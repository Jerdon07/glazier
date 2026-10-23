<x-layout>
    <div class="m-4 space-y-6">
        <div class="w-full flex justify-between items-end">
            {{-- Heading --}}
            <x-heading
                title="My Products"
                description="The List of all your created products"
            />

            {{-- Create Button --}}
            <a href="/products/create" class="bg-amber-600 text-taupe-50 rounded-2xl py-1 px-3 hover:bg-amber-700">Add Product</a>
        </div>

        {{-- Products --}}
        @if (isset($products))
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                @foreach ($products as $product)
                    {{-- Card --}}
                    <x-card.product-card :product="$product" />
                @endforeach
            </div>
        @else
            
        @endif
    </div>
</x-layout>