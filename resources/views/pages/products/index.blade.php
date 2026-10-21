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
        @if ($products)
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                @foreach ($products as $product)
                    {{-- Card --}}
                    <div class="py-4 bg-taupe-50 rounded-2xl shadow space-y-4">
                        {{-- Header --}}
                        <div class="px-4 flex justify-between items-end">
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
                        </div>

                        {{-- Description --}}
                        <div class="px-4 space-y-2 min-h-20 flex flex-col justify-between">
                            <p class="text-sm line-clamp-2">
                                {{ $product->description }}
                            </p>

                            <div class="flex justify-between">
                                <div class="text-sm">
                                    <p>₱{{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            
        @endif
    </div>
</x-layout>