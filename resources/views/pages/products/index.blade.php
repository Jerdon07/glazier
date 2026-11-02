<x-layout>
    <div class="m-4 space-y-6">
        <div class="w-full flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
            {{-- Heading --}}
            <x-heading
                title="My Products"
                description="The List of all your created products"
            />

            {{-- Create Button --}}
            <a  href="/products/create" class="self-end md:self-auto btn btn-secondary">
                Add Product
            </a>
        </div>

        {{-- Products --}}
        @if (isset($products))
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                @foreach ($products as $product)
                    {{-- Card --}}
                    <x-card.product-card 
                        :product="$product"
                        show_button 
                        edit_button 
                        delete_button
                    />
                @endforeach
            </div>
        @else
            
        @endif
    </div>
</x-layout>