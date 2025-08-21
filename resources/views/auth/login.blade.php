<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f4f8;">
     
    {{-- Wrapper to limit width --}}
    <div style="display: flex; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; padding: 40px; gap: 30px;">

        {{-- Left Side: Explanation --}}
        <div style="width: 300px;">
            <h2>Welcome Back!</h2>
            <p style="font-size: 14px;">Login to access your dashboard and manage your account.</p>
            <p style="font-size: 14px;">New here? Click below to register and get started.</p>
        </div>

        {{-- Right Side: Login Form --}}
        <div style="width: 300px;">
            <h2 style="margin-bottom: 20px;">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input name="email" placeholder="Email" style="width: 100%; padding: 10px; margin-bottom: 10px;"><br>
                <input name="password" type="password" placeholder="Password" style="width: 100%; padding: 10px; margin-bottom: 10px;"><br>
                <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px;">Login</button><br><br>
                <a href="/register">Don't have an account? Register</a>
            </form>
            @if(session('error'))
             <div style="background-color: red; color: white; padding: 10px; margin-bottom: 10px; text-align: center;">
              {{ session('error') }}
             </div>
            @endif
        </div>
 
    </div>
</div>
