<div class="dropdown dropdown-end">
    <button tabindex="0" role="button" class="btn btn-ghost">
        <x-lucide-bell class="size-5" />
        @if ($notifications->isNotEmpty())
            <span class="badge">{{ $notifications->count() }}</span>
        @endif
    </button>

    <div tabindex="-1" class="menu dropdown-content bg-base-100 rounded-box z-1 mt-3 w-82 p-2 shadow">
        @forelse ($notifications as $notification)
            <div class="flex justify-between items-center p-1">
                <p>
                    {{ $notification->data['from'] }}: {{ $notification->data['name'] }}!
                </p>
                <div class="flex space-x-2">
                    <form action="/notifications/{{ $notification->id }}/read" method="post">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-circle btn-sm">
                            <x-lucide-check class="size-5 text-success" />
                        </button>
                    </form>

                    <form action="/notifications/{{ $notification->id }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-circle btn-sm">
                            <x-lucide-trash-2 class="size-5 text-error" />
                        </button>
                    </form>
                </div>
            </div>

            <form action="/notifications/{{ $notification->id }}/read" method="post" id="{{ $notification->id }}-form">
                @csrf
                @method('PATCH')
            </form>
        @empty
            <li><span>No unread notifications</span></li>
        @endforelse
    </div>
</div>