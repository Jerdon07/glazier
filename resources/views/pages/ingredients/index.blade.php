<x-layout>
    <div class="m-4 space-y-6">
        <div class="w-full flex justify-between items-end">
            {{-- Heading --}}
            <x-heading
                title="My Ingredients"
                description="The list of all your available ingredients"
            />

            {{-- Create Button --}}
            <a href="/ingredients/create" class="bg-amber-600 text-taupe-50 rounded-2xl py-1 px-3 hover:bg-amber-700">Add Ingredient</a>
        </div>

        {{-- Ingredients --}}
        <table class="w-full max-w-150 bg-taupe-50 shadow rounded-2xl overflow-hidden mx-auto">
            <thead class="h-10 rounded-t-2xl border-b border-b-taupe-300">
                <tr>
                    <th>Ingredient</th>
                    <th>Unit Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($ingredients as $ingredient)
                    <tr>
                        <td class="px-4 md:px-6 py-1">{{ $ingredient->name }}</td>
                        <td>{{ $ingredient->cost_per_unit }} per {{ $ingredient->unit }}</td>
                        <td class="flex justify-center space-x-4">
                            <a
                                href="/ingredients/{{ $ingredient->id }}/edit"
                                class="text-blue-600 hover:underline"
                            >
                                Edit
                            </a>

                            <button 
                                type="submit"
                                form="{{ $ingredient->id }}-delete-form"
                                class="text-red-500 cursor-pointer hover:underline"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>

                    <form action="/ingredients/{{ $ingredient->id }}" method="post" id="{{ $ingredient->id }}-delete-form">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>