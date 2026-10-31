@props([
    'products',
])

<x-layout>
    <div class="m-4 space-y-6">
        <x-heading title="Add recipe" description="Create recipe for {{ $product->name }}."/>

        <x-card>
            <x-card.card-content>
                <form action="/products/{{ $product->id }}/recipes/{{ $recipe->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="product_id" value={{ $product->id }}>

                    <div class="flex flex-col">
                        <label for="recipe" class="text-sm">Recipe<span class="text-red-500"> *</span></label>
                        <select 
                            name="ingredient_id" 
                            id="recipe" 
                            class="w-full border rounded-2xl py-1 px-2 text-sm"
                        >
                            @foreach ($ingredients as $ingredient)
                                <option 
                                    value="{{ $ingredient->id }}"
                                    {{ old('ingredient_id', $recipe->ingredient_id ?? '') === $ingredient->id ? 'selected' : '' }}
                                >
                                    {{ $ingredient->name }} ({{ $ingredient->unit }})
                                </option>
                            @endforeach
                        </select>
                        <x-error name="ingredient_id"/>
                    </div>
                    
                    <div>
                        <label for="quantity" class="text-sm">Quantity<span class="text-red-500"> *</span></label>
                        <input 
                            type="number" 
                            name="quantity_required" 
                            id="quantity"
                            class="w-full border rounded-2xl py-1 px-2 text-sm"
                            value="{{ $recipe->quantity_required }}"
                        >
                        <x-error name="quantity_required"/>
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