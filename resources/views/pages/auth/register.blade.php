<x-auth-layout>
    <form action="/register" method="post">
        <fieldset class="fieldset mx-auto mt-4 bg-base-100 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Register</legend>

            @csrf

            <label class="label">Name</label>
            <input 
                type="text" 
                name="name" 
                class="input @error('name') input-error @enderror" 
                value="{{ old('name') }}"
                placeholder="Name" 
                required 
            />
            <x-error name="name" />

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
            
            <button class="btn btn-neutral mt-4">Register</button>

            <p class="text-end text-xs mt-2">Already have an account? <a href="/login" class="font-bold hover:underline">Sign in!</a></p>

        </fieldset>
    </form>
</x-auth-layout>