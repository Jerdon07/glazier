<x-layout>
    <x-heading title="Edit your product" />

    <x-card>
        <form 
            action="/products/{{ $product->id }}"
            method="post"
        >
            @csrf
            @method('PUT')

            <x-card.card-content>
                <div>
                    <label for="name" class="text-sm">Product Name<span class="text-red-500"> *</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        value="{{ $product->name }}"
                        class="w-full border rounded-2xl py-1 px-2 text-sm"
                    >
                    <div class="h-1 mt-1">
                        @error('name')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="price" class="text-sm">Price<span class="text-red-500"> *</span></label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price"
                        value="{{ $product->price }}"
                        class="w-full border rounded-2xl py-1 px-2 text-sm"
                    >
                    <div class="h-1 mt-1">
                        @error('price')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex space-x-2">
                    <label for="is_available" class="text-sm">Available</label>
                    <input 
                        type="checkbox" 
                        name="is_available" 
                        id="is_available"
                        checked
                    >
                </div>

                <div>
                    <label for="description" class="text-sm">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="w-full border rounded-2xl py-1 px-2 text-sm"
                    >{{ $product->description }}</textarea>
                    <div class="h-1 mt-1">
                        @error('description')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="/products" class="rounded-2xl bg-taupe-200 hover:bg-taupe-300 font-semibold p-2 flex justify-center">Cancel</a>

                    <button type="submit" class="rounded-2xl p-2 bg-amber-500 hover:bg-amber-600 shadow cursor-pointer text-taupe-50 font-semibold">
                        Update Product
                    </button>
                </div>
            </x-card.card-content>
        </form>
    </x-card>
</x-layout>