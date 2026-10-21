@props([
    'title',
    'description' => null,
])

<header>
    <h1 class="text-lg font-bold">{{ $title ?? config('app.name', 'Glazier') }}</h1>
    <p class="text-xs md:text-sm">{{ $description }}</p>
</header>