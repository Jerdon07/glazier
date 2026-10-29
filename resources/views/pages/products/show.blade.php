@props([
    'name',
    'description',
    'price',
    'is_available',
])

<x-layout>
    <div class="m-4 space-y-6">
        <div class="w-full flex justify-between items-end">
            {{-- Heading --}}
            <x-heading
                title="{{ $product->name }}"
            />
        </div>

        <x-card.product-card 
            :product=$product 
            edit_button
            delete_button
            add_recipe_button
        />
            <table class="w-full max-w-150 bg-taupe-50 shadow rounded-2xl overflow-hidden mx-auto">
                <caption>Recipe for this product</caption>

                <thead class="h-10 rounded-t-2xl border-b border-b-taupe-300">
                    <tr>
                        <th>Recipe</th>
                        <th>Measure</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($product->recipes as $recipe)
                    <tr>
                        <td class="px-4 md:px-6 py-1">{{ $recipe->ingredient->name }}</td>
                        <td>{{ $recipe->quantity_required }} {{ $recipe->ingredient->unit }}</td>
                        <td class="flex justify-center space-x-4">
                            <a 
                                href="/products/{{ $product->id }}/recipes/{{ $recipe->id }}/edit" 
                                class="text-blue-600 hover:underline"
                            >
                                Edit
                            </a>

                            <button 
                                type="submit" 
                                form="{{ $recipe->id }}-delete-form" 
                                class="text-red-500 cursor-pointer hover:underline"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>

                    <form action="/products/{{ $product->id }}/recipes/{{ $recipe->id }}" method="post" id="{{ $recipe->id }}-delete-form">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>