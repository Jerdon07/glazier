@props([
    'name',
])

<div class="mt-1">
    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>