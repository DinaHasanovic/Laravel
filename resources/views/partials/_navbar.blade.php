<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
<nav class="navbar">
    <div class="container">
        <a href="/" class="logo">Online Courses</a>
        <ul class="nav-links">                
            <li><a href="/">Home</a></li>
            <li><a href="/courses">Courses</a></li>
            @auth
            <li><span class="user"> <i class="fa-solid fa-user"></i> {{auth()->user()->name}}</span></li>
            <li><a href="/courses/manage"><i class="fa-solid fa-gear"></i> Manage Courses</a></li>
            <li>
                <form action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            <li><a href="/users/{{auth()->user()->id}}/resetPassword">Reset Password</a></li>
            @else
            <li><a href="/register"><i class="fa-solid fa-user-plus"></i> Register</a></li>
            <li><a href="/login"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a></li>
            @endauth
        </ul>
    </div>
</nav>