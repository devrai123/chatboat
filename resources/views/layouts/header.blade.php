<header style="background:#343a40;color:white;padding:15px;display:flex;justify-content:space-between;">

    <h2>Devendra Kumar Rai Admin Panel</h2>

    <div>

        @guest
            <a href="/login" style="color:white;text-decoration:none;margin-right:15px;">
                Login
            </a>

            <a href="/register" style="color:white;text-decoration:none;">
                Register
            </a>
        @endguest

        @auth

            Welcome {{ Auth::user()->name }}

            <form action="/logout" method="POST" style="display:inline;">
                @csrf

                <button type="submit">
                    Logout
                </button>
            </form>

        @endauth

    </div>

</header>