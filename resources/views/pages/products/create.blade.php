<x-layout>
    <form 
        action="/products"
        method="post"
    >
        <fieldset class="fieldset mx-auto bg-base-100 border-base-300 rounded-box md:w-fit border p-4">
            <legend class="fieldset-legend">Add a new product</legend>

            @csrf

            <label for="name" class="label">Product Name<span class="text-red-500"> *</span></label>
            <input 
                type="text" 
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="Product"
                class="input @error('name') input-error @enderror"
            >
            <x-error name="name"/>

            <label for="price" class="label">Price<span class="text-red-500"> *</span></label>
            <input 
                type="number" 
                name="price" 
                id="price"
                placeholder="00"
                value="{{ old('price') }}"
                class="input @error('price') input-error @enderror"
            >
            <x-error name="price"/>

            <label for="is_available" class="label">
                <input 
                    type="checkbox" 
                    name="is_available" 
                    id="is_available"
                    checked
                    class="checkbox"
                >
                is this available?
            </label>

            <label for="description" class="text-sm">Description</label>
            <textarea 
                name="description" 
                id="description" 
                class="textarea @error('description') input-error @enderror"
                placeholder="Description of the product..."
            ></textarea>
            <x-error name="description"/>

            <div class="w-full grid grid-cols-2 gap-4">
                <a href="/products" class="btn btn-wide btn-soft">Cancel</a>

                <button type="submit" class="btn btn-wide btn-secondary">
                    Create Product
                </button>
            </div>
        </fieldset>
    </form>
</x-layout>