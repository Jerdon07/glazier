<x-layout>
    <x-heading
        title="Create a product"
        description="Fill the form and submit"
    />

    <form 
        action="/products" 
        method="post"
        class="bg-taupe-50 w-100 p-8 my-4 mx-auto shadow rounded-2xl"
    >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="text-sm">Product Name<span class="text-red-500"> *</span></label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    class="w-full border rounded-2xl py-1 px-2 text-sm"
                >
            </div>

            <div>
                <label for="price" class="text-sm">Price<span class="text-red-500"> *</span></label>
                <input 
                    type="text" 
                    name="price" 
                    id="price"
                    class="w-full border rounded-2xl py-1 px-2 text-sm"
                >
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
                <textarea name="description" id="description" class="w-full border rounded-2xl py-1 px-2 text-sm"></textarea>
            </div>

            <button type="submit" class="rounded-2xl p-2 bg-amber-500 hover:bg-amber-600 shadow cursor-pointer text-taupe-50 font-semibold">
                Add Product
            </button>
        </div>
    </form>
</x-layout>