<!DOCTYPE html>
<html>
<head>
    <title>Laravel Role Auth</title>
</head>
<body>
    <nav style="background-color: rgb(21, 56, 70); padding:5px; color: white; display: flex;">
        @auth
            <form  action="/logout" method="POST">
                @csrf
                <button class="btn success" type="submit">Logout</button>
            </form>
            <h2 style="margin-left:10%;">Job Application System</h2>

        @endauth
    </nav>
    <hr>
    <div style="display: flex;">
        @include('sidebar')
        @yield('content')
    </div>
</body>
</html>
