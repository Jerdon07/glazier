@props([
    'product' => [
        'name',
        'description' => '...',
        'price',
        'is_available'
    ],
    'delete_button' => false,
    'show_button' => false,
    'edit_button' => false,
    'add_recipe_button' => false,
])

<div class="card bg-base-100">
    {{-- Header --}}
    <div class="card-body">
        <h2 class="card-title">
            {{ $product->name }}

            @if ($product->is_available)
                <div class="badge badge-info">
                    <p class="text-info-content">Available</p>
                </div>
            @else
                <div class="badge badge-error">
                    <p class="text-error-content">Closed</p>
                </div>
            @endif
        </h2>

        {{-- Description --}}
        <p class="text-sm line-clamp-2">
            {{ $product->description }}
        </p>

        <div class="card-actions justify-between">
            <p>₱{{ $product->price }}</p>

            <div class="flex space-x-2">
                <a 
                    href="/products/{{ $product->id }}"
                    data-test="show-button"
                    class="btn btn-soft btn-xs
                    {{ $show_button ? 'visible' : 'hidden' }}"
                >
                    <x-lucide-eye class="size-4"/>
                </a>

                <a 
                    href="/products/{{ $product->id }}/recipes/create"
                    data-test="create-button"
                    class="btn btn-accent btn-soft btn-xs
                    {{ $add_recipe_button ? 'visible' : 'hidden' }}"
                >
                    <x-lucide-plus class="size-4"/>
                </a>

                <a 
                    href="/products/{{ $product->id }}/edit"
                    data-test="edit-button"
                    class="btn btn-info btn-soft btn-xs
                    {{ $edit_button ? 'visible' : 'hidden' }}"
                >
                    <x-lucide-pencil class="size-4"/>
                </a>

                <button 
                    type="submit" 
                    form="{{ $product->id }}-delete-form"
                    data-test="delete-button"
                    class="btn btn-error btn-soft btn-xs
                    {{ $delete_button ? 'visible' : 'hidden' }}"
                >
                    <x-lucide-trash-2 class="size-4"/>
                </button>
            </div>
        </div>
    </div>

    
    
    <div>
        <div class="flex justify-between">
            <div class="text-sm">
                
            </div>

            <div class="flex">
                
            </div>
        </div>
    </div>

    <form action="/products/{{ $product->id }}" method="post" id="{{ $product->id }}-delete-form">
        @csrf
        @method('DELETE')
    </form>
</div>