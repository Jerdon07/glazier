<x-layout>
    <x-heading
        title="Create an ingredient"
        description="Fill the form and submit"
    />

    <x-card>
        <form 
            action="/ingredients" 
            method="post"
        >
            @csrf

            <x-card.card-content>
                <div>
                    <label for="name" class="text-sm">Ingredient Name<span class="text-red-500"> *</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        value="{{ old('name') }}"
                        class="w-full border rounded-2xl py-1 px-2 text-sm"
                    >
                    <div class="h-1 mt-1">
                        @error('name')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="unit" class="text-sm">Unit of Measurement<span class="text-red-500"> *</span></label>
                    <select 
                        name="unit" 
                        id="unit" 
                        class="w-full border rounded-2xl py-1 px-2 text-sm"
                    >
                        <option value="" disabled selected>Select a unit</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit }}">{{ $unit }}</option>
                        @endforeach
                    </select>
                    <div class="h-1 mt-1">
                        @error('unit')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="cost_per_unit" class="text-sm">Cost per Unit<span class="text-red-500"> *</span></label>
                    <input 
                        type="number" 
                        name="cost_per_unit" 
                        id="cost_per_unit"
                        value="{{ old('cost_per_unit') }}"
                        class="w-full border rounded-2xl py-1 px-2 text-sm"
                    >
                    <div class="h-1 mt-1">
                        @error('cost_per_unit')
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="rounded-2xl p-2 bg-amber-500 hover:bg-amber-600 shadow cursor-pointer text-taupe-50 font-semibold">
                    Add Ingredient
                </button>
            </x-card.card-content>
        </form>
    </x-card>
</x-layout>