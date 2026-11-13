<div class="dropdown dropdown-end">
    <button tabindex="0" role="button" class="btn btn-ghost">
        <x-lucide-bell class="size-5" />
        @if ($notifications->isNotEmpty())
            <span class="badge">{{ $notifications->count() }}</span>
        @endif
    </button>

    <ul tabindex="-1" class="menu dropdown-content bg-base-100 rounded-box z-1 mt-3 w-64 p-2 shadow">
        @forelse ($notifications as $notification)
            <li>
                <button type="submit" form="{{ $notification->id }}-form">
                    {{ $notification->data['from'] }}: {{ $notification->data['name'] }}!
                </button>
            </li>

            <form action="/notifications/{{ $notification->id }}/read" method="post" id="{{ $notification->id }}-form">
                @csrf
                @method('PATCH')
            </form>
        @empty
            <li><span>No unread notifications</span></li>
        @endforelse
    </ul>
</div>