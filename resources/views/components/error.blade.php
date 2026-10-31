@props([
    'name',
])

<div class="h-1 mt-1">
    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>