@props([
    'products',
])

<x-layout>
    <div class="m-4 space-y-6">
        <x-heading title="Add recipe"/>

        <x-card>
            <x-card.card-content>
                <form action="/products/{{ $product->id }}/recipes" method="POST">
                    @csrf

                    <div class="flex flex-col">
                        <label for="recipe" class="text-sm">Recipe<span class="text-red-500"> *</span></label>
                        <select 
                            name="recipe" 
                            id="recipe" 
                            class="w-full border rounded-2xl py-1 px-2 text-sm"
                        >
                            <option value="" selected disabled>Select a recipe</option>
                            @foreach ($ingredients as $ingredient)
                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }} ({{ $ingredient->unit }})</option>
                            @endforeach
                        </select>
                        <div class="h-1 mt-1">
                            @error('recipe')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="quantity" class="text-sm">Quantity<span class="text-red-500"> *</span></label>
                        <input 
                            type="number" 
                            name="quantity" 
                            id="quantity"
                            class="w-full border rounded-2xl py-1 px-2 text-sm"
                        >
                        <div class="h-1 mt-1">
                            @error('quantity')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end items-center space-x-1">
                        <a href="/products/{{ $product->id }}" class="text-red-500 text-sm">Cancel</a>
                        <button type="submit" class="bg-amber-600 text-taupe-50 rounded-lg shadow ms-4 px-2 py-1 text-sm cursor-pointer">Add</button>
                    </div>
                </form>
            </x-card.card-content>
        </x-card>
    </div>
</x-layout>