<x-layout>
    <form 
        action="/products/{{ $product->id }}/recipes" 
        method="post"
    >
        <fieldset class="fieldset mx-auto bg-base-100 border-base-300 rounded-box mt-8 md:w-fit border p-4">
            <legend class="legend">Create a Recipe</legend>

            @csrf

            <input type="hidden" name="product_id" value={{ $product->id }}>

            <label for="recipe" class="label">Ingredient<span class="text-red-500"> *</span></label>
            <select 
                name="ingredient_id" 
                id="recipe" 
                class="select @error('ingredient_id') select-error @enderror"
            >
                <option selected disabled>Select an ingredient</option>
                @foreach ($ingredients as $ingredient)
                    <option 
                        value="{{ $ingredient->id }}"
                        {{ old('ingredient_id') === $ingredient->id ? 'selected' : '' }}
                    >
                        {{ $ingredient->name }} ({{ $ingredient->unit }})
                    </option>
                @endforeach
            </select>
            <x-error name="ingredient_id"/>
            
            <label for="quantity" class="label">Quantity<span class="text-red-500"> *</span></label>
            <input 
                type="number" 
                name="quantity_required" 
                id="quantity"
                class="input @error('quantity_required') input-error @enderror"
                value="{{ old('quantity_required') }}"
            >
            <x-error name="quantity_required"/>

            <div class="grid grid-cols-3 gap-4">
                <a href="/products/{{ $product->id }}" class="btn btn-soft btn-wide">
                    Cancel
                </a>

                <button type="submit" class="btn btn-wide btn-secondary col-span-2">
                    Add Recipe
                </button>
            </div>
        </fieldset>
    </form>
</x-layout>