<div class="dropdown dropdown-end">
    <button tabindex="0" role="button" class="btn btn-ghost">
        <x-lucide-bell class="size-5" />
        @if ($notifications->isNotEmpty())
            <span class="badge">{{ $unread_count }}</span>
        @endif
    </button>

    <div tabindex="-1" class="menu dropdown-content bg-base-100 rounded-box z-1 mt-3 w-82 p-2 shadow">
        @if ($notifications->isNotEmpty())
            @foreach ($notifications as $notification)
                <div @class([
                    'flex justify-between items-center p-1', 
                    'bg-base-200 shadow-sm rounded-xl' => !$notification->read_at
                ])>
                    <p>
                        {{ $notification->data['from'] }}: {{ $notification->data['name'] }}!
                    </p>

                    <div class="flex space-x-2">
                        <form 
                            action="/notifications/{{ $notification->id }}/read" 
                            method="post"
                            @class([
                                'hidden' => $notification->read_at
                            ])
                        >
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
            @endforeach
            <form action="/notifications/read-all" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="btn w-full">Mark All As Read</button>
            </form>
        @else
            
        @endif
        @forelse ($notifications as $notification)
            

        @empty
            <li><span>No unread notifications</span></li>
        @endforelse
    </div>
</div>