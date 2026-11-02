<x-auth-layout>
    <form action="/login" method="post">
        <fieldset class="fieldset mx-auto mt-16 bg-base-100 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Login</legend>

            @csrf

            <label class="label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="input @error('email') input-error @enderror" 
                value="{{ old('email') }}"
                placeholder="Email" 
                required
            />
            <x-error name="email" />
            
            <label class="label">Password</label>
            <input 
                type="password" 
                name="password" 
                class="input @error('password') input-error @enderror" 
                placeholder="Password" 
                required 
            />
            <x-error name="password" />

            <button class="btn btn-neutral mt-4">Login</button>

            <p class="text-end text-xs mt-2">Don't have an account? <a href="/register" class="font-bold hover:underline">Click here!</a></p>
            
        </fieldset>
    </form>
</x-auth-layout>