
<h2>Register</h2>
<form method="POST" action="/register">
    @csrf
    <input name="name" placeholder="Name"><br>
    <input name="email" placeholder="Email"><br>
    <input name="password" type="password" placeholder="Password"><br>
    <input name="password_confirmation" type="password" placeholder="Confirm Password"><br>
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Register</button>
</form>
 <a href="/login">Login</a> 
