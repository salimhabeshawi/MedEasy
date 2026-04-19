<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div class="h-10">
            <a href="/" class="flex h-full items-center">
                <img src="images/salim_logo.svg" alt="Salim logo" class="h-full w-auto max-w-40 object-contain">
            </a>
        </div>

        <div class="flex gap-5 items-center">
            @auth
             <form method="POST" action="/logout">
                @csrf

                <button>Log Out</button>
            </form>
            @endauth

            @guest
                <a href="/login">Sign In</a>
                <a href="/register" class="btn">Register</a>
            @endguest
        </div>

    </div>

</nav>