<nav class="navbar bg-base-100 shadow-sm flex-nowrap">

    {{-- Logo and dropdown --}}
    <div class="navbar-start flex-1 min-w-0">
        <div class="dropdown flex-none">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <x-lucide-menu class="size-6" />
            </div>

            <ul tabindex="-1"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow space-y-1">
                @guest
                    <li><a href="/login" class="btn btn-wide btn-secondary">Login</a></li>
                    <li><a href="/register" class="btn btn-wide btn-primary">Register</a></li>
                @endguest

                @auth
                    <li class="w-full text-center p-2">
                        {{ auth()->user()->name }}
                    </li>
                    <li>
                        <button type="submit" form="logout-form" class="btn btn-wide">
                            Logout
                        </button>
                    </li>
                @endauth
            </ul>
        </div>

        <a href="{{ route('home') }}" class="btn btn-ghost text-xl whitespace-nowrap">
            <x-lucide-donut class="size-5" />
            Glazier
        </a>
    </div>

    {{-- Pages --}}
    <div class="navbar-end flex-none">
        @auth
            <ul class="menu menu-horizontal flex-nowrap px-1">
                @cannot('is-admin')
                    <li>
                        <a 
                            href="{{ route('products.index') }}"
                            @class([
                                'whitespace-nowrap', 
                                'bg-base-200 shadow-sm' => request()->routeIs('products.index'),
                            ])
                        >
                            Products
                        </a>
                    </li>
                @endcannot

                @can('is-admin')
                    <li>
                        <a 
                            href="{{ route('ingredients.index') }}"
                            @class([
                                'whitespace-nowrap', 
                                'bg-base-200 shadow-sm' => request()->routeIs('ingredients.index'),
                            ])
                        >
                            Ingredients
                        </a>
                    </li>
                @endcan
            </ul>

            <x-notifications-dropdown />
        @endauth
    </div>

    <form action="{{ route('sessions.destroy') }}" method="post" id="logout-form">
        @csrf
        @method('delete')
    </form>
</nav>