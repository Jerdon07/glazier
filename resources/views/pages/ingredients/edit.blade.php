<x-layout>
    <x-heading title="Edit your ingredients" />

    <x-card>
        <form 
            action="/ingredients/{{ $ingredient->id }}" 
            method="post"
        >
            @csrf
            @method('PUT')

            <x-card.card-content>
                <div>
                    <label for="name" class="text-sm">Ingredient<span class="text-red-500"> *</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        value="{{ $ingredient->name }}"
                        class="w-full border rounded-2xl py-1 px-2 text-sm"
                    >
                    <x-error name="name"/>

                    <div>
                        <label for="unit" class="text-sm">Unit of Measurement<span class="text-red-500"> *</span></label>
                        <select 
                            name="unit" 
                            id="unit"
                            class="w-full border rounded-2xl py-1 px-2 text-sm"
                        >
                            <option value="" disabled selected>Select a unit</option>
                            @foreach ($units as $unit)
                                <option 
                                    :value="$unit"
                                    {{ $unit == $ingredient->unit ? 'selected' : '' }}
                                >
                                    {{ $unit }}</option>
                            @endforeach
                        </select>
                        <x-error name="unit"/>
                    </div>

                    <div>
                        <label for="cost_per_unit" class="text-sm">Cost per Unit<span class="text-red-500"> *</span></label>
                        <input 
                            type="number" 
                            name="cost_per_unit" 
                            id="cost_per_unit"
                            value="{{ $ingredient->cost_per_unit }}"
                            class="w-full border rounded-2xl py-1 px-2 text-sm"
                        >
                        <x-error name="cost_per_unit"/>
                    </div>
                </div>

                <button type="submit" class="rounded-2xl p-2 bg-amber-500 hover:bg-amber-600 shadow cursor-pointer text-taupe-50 font-semibold">
                    Update Ingredient
                </button>
            </x-card.card-content>
        </form>
    </x-card>
</x-layout>