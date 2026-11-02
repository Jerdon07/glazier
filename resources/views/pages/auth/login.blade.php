<x-auth-layout>
    <form action="/login" method="post">
        <fieldset class="fieldset mx-auto mt-16 bg-base-100 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Login</legend>

            @csrf

            <label class="label">Email</label>
            <input type="email" name="email" class="input" placeholder="Email" required />
            
            <label class="label">Password</label>
            <input type="password" name="password" class="input" placeholder="Password" required />
            
            <button class="btn btn-neutral mt-4">Login</button>
        </fieldset>
    </form>
</x-auth-layout>