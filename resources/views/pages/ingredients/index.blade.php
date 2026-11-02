<x-layout>
    <div class="m-4 space-y-6">
        {{-- Header --}}
        <div class="flex w-full flex-col items-start justify-between gap-4 md:flex-row md:items-end">
            <x-heading
                title="My Ingredients"
                description="The list of all your available ingredients"
            />

            <a href="/ingredients/create" class="btn btn-secondary self-end md:self-auto">
                Add Ingredient
            </a>
        </div>

        {{-- Ingredients Table --}}
        <div class="mx-auto w-full max-w-3xl overflow-x-auto rounded-box border border-base-300 bg-base-100 shadow-sm">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>Ingredient</th>
                        <th>Unit Cost</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($ingredients as $ingredient)
                        <tr>
                            <td class="font-medium">
                                {{ $ingredient->name }}
                            </td>

                            <td class="whitespace-nowrap">
                                {{ number_format($ingredient->cost_per_unit, 2) }}
                                <span class="text-base-content/60">
                                    / {{ $ingredient->unit }}
                                </span>
                            </td>

                            <td class="text-right">
                                <div class="dropdown dropdown-end">
                                    <button
                                        type="button"
                                        tabindex="0"
                                        class="btn btn-sm btn-ghost"
                                        aria-label="Ingredient actions"
                                    >
                                        <x-lucide-ellipsis-vertical class="size-5" />
                                    </button>

                                    <ul
                                        tabindex="-1"
                                        class="menu dropdown-content bg-base-100 rounded-box z-10 w-36 p-2 shadow-lg border border-base-300"
                                    >
                                        <li>
                                            <a href="/ingredients/{{ $ingredient->id }}/edit">
                                                <x-lucide-pencil class="size-4" />
                                                Edit
                                            </a>
                                        </li>

                                        <li>
                                            <button
                                                type="submit"
                                                form="{{ $ingredient->id }}-delete-form"
                                                class="text-error"
                                            >
                                                <x-lucide-trash-2 class="size-4" />
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <form
                            action="/ingredients/{{ $ingredient->id }}"
                            method="post"
                            id="{{ $ingredient->id }}-delete-form"
                        >
                            @csrf
                            @method('DELETE')
                        </form>
                    @empty
                        <tr>
                            <td colspan="3" class="py-10 text-center text-base-content/60">
                                No ingredients found. Add your first ingredient to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>