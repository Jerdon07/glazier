<x-layout>
    <form 
        action="/ingredients" 
        method="post"
    >
        <fieldset class="fieldset mx-auto bg-base-100 border-base-300 rounded-box md:w-fit border p-4">
            <legend class="legend">Add a new ingredient</legend>

            @csrf

            <label for="name" class="label">Ingredient Name<span class="text-red-500"> *</span></label>
            <input 
                type="text" 
                name="name" 
                id="name"
                value="{{ old('name', $ingredient->name) }}"
                class="input @error('name') input-error @enderror"
            >
            <x-error name="name"/>

            <label for="unit" class="label">Unit of Measurement<span class="text-red-500"> *</span></label>
            <select
                name="unit"
                id="unit"
                class="select @error('unit') select-error @enderror"
            >
                @foreach ($units as $unit)
                    <option
                        value="{{ $unit->value }}"
                        @selected(old('unit', $ingredient->unit->value) === $unit->value)
                    >
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
            <x-error name="unit"/>

            <label for="cost_per_unit" class="label">Cost per Unit<span class="text-red-500"> *</span></label>
            <input 
                type="text" 
                name="cost_per_unit" 
                id="cost_per_unit"
                value="{{ old('cost_per_unit', $ingredient->cost_per_unit) }}"
                class="input @error('name') input-error @enderror"
            >
            <x-error name="cost_per_unit"/>

            <div class="grid grid-cols-3 gap-4">
                <a href="/ingredients" class="btn btn-soft btn-wide">Cancel</a>

                <button type="submit" class="btn btn-wide btn-secondary col-span-2">
                    Create Ingredient
                </button>
            </div>
        </fieldset>
    </form>
</x-layout>