<nav class="navbar bg-base-100 shadow-sm">

    {{-- Logo --}}
    <div class="navbar-start">
        <div class="dropdown flex-none">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <svg aria-label="Menu" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /> </svg>
            </div>

            <ul tabindex="-1" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow space-y-1">
                @guest
                <li><a href="/login" class="btn btn-wide btn-secondary">Login</a></li>
                <li><a href="/register" class="btn btn-wide btn-primary">Register</a></li>
                @endguest

                @auth
                    <button type="submit" form="logout-form" class="btn btn-ghost btn-wide">Logout</button>
                @endauth
            </ul>
        </div>

        <div class="flex-1">
            <a href="/" class="btn btn-ghost text-xl">Glazier</a>
        </div>
    </div>

    {{-- Pages --}}
    <div class="navbar-end">
        <ul class="menu menu-horizontal px-1">
            <li><a href="/products">Products</a></li>
            <li><a href="/ingredients">Ingredients</a></li>
        </ul>
    </div>

    <form action="/logout" method="post" id="logout-form">
        @csrf
        @method('delete')
    </form>
</nav>