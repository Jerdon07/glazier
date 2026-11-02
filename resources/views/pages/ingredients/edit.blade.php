<x-layout>
    <form 
        action="/ingredients/{{ $ingredient->id }}" 
        method="post"
    >
        <fieldset class="fieldset mx-auto mt-16 bg-base-100 border-base-300 rounded-box md:w-xs border p-4">
            <legend class="fieldset-legend">Edit Ingredient</legend>

            @csrf
            @method('PUT')

            <label for="name" class="label">Ingredient<span class="text-red-500"> *</span></label>
            <input 
                type="text" 
                name="name" 
                id="name"
                value="{{ old('name') ?? $ingredient->name }}"
                class="input @error('name') input-error @enderror"
            >
            <x-error name="name"/>

            <label for="unit" class="label">Unit of Measurement<span class="text-error"> *</span></label>
            <select 
                name="unit" 
                id="unit"
                class="select @error('unit') select-error @enderror"
            >
                <option disabled selected>Select a unit</option>
                @foreach ($units as $unit)
                    <option 
                        :value="$unit"
                        {{ $unit == $ingredient->unit ? 'selected' : '' }}
                    >
                        {{ $unit }}</option>
                @endforeach
            </select>
            <x-error name="unit"/>

            <label for="cost_per_unit" class="label">Cost per Unit<span class="text-error"> *</span></label>
            <input 
                type="number" 
                name="cost_per_unit" 
                id="cost_per_unit"
                value="{{ old('cost_per_unit') ?? $ingredient->cost_per_unit }}"
                class="input @error('cost_per_unit') input-error @enderror"
            >
            <x-error name="cost_per_unit"/>

            <div class="grid grid-cols-3 gap-4">
                <a href="/ingredients" class="btn btn-soft btn-wide">Cancel</a>

                <button type="submit" class="btn btn-wide btn-secondary col-span-2">
                    Update Ingredient
                </button>
            </div>
        </fieldset>
    </form>
</x-layout>