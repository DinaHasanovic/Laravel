<link rel="stylesheet" href="{{ asset('css/partials/navbar.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Elsie&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
<nav class="navbar">
    <div class="container">
        <a href="/" class="logo">Local Foodies</a>
        <button class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="/posts">Post</a></li>
            @auth
            <li><span class="user">
                @if (auth()->user()->picture != "null")
                <img src="{{ asset('storage/' . auth()->user()->picture) }}" alt="{{ auth()->user()->name }}" style="width:20px;height:20px;border-radius:8px; margin-right:5px">
                @else
                    <i class="fa-solid fa-user" style="margin-right:5px"></i>
                @endif
                 {{auth()->user()->name}}</span></li>
            @if(auth()->user()->role == 'moderator')
            <li><a href="/posts/manage"><i class="fa-solid fa-gear"></i> Manage Posts</a></li>
            @endif
            @if (auth()->user()->role == 'admin')
            <li><a href="/users/manage"><i class="fa-solid fa-gear"></i> Manage Users</a></li>
            @endif

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
