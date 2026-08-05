<div>
<header class="site-header">
    <a class="brand" href="{{ route('home') }}">
        Presto
    </a>

    <nav class="nav">
        <a href="{{ route('announcements.create') }}">
            Inserisci annuncio
        </a>

    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('announcements.index') }}">
            Tutti gli articoli
        </a>
    </li>



    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
        </a>
        <ul class="dropdown-menu">
            @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item text-capitalize" href="{{ route('byCategory', ['category' => $category]) }}">
                        {{ $category->name }}
                    </a>
                </li>
                @if (!$loop->last)
                <hr class="dropdown-divider">
                @endif
            @endforeach
        </ul>
    </li>


    @auth
     @if (Auth::user()->is_revisor)
    <li class="nav-item">
        <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-5"
        href="{{ route('revisor.index')}}">Zona revisore
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ \App\Models\Announcement::toBeRevisionedCount() }}
        </span>
        </a>
    </li>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="link-button">Logout</button>
    </form>
@else
    <span class="auth-message">Non hai ancora un account?</span>
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Registrati</a>
@endauth

    </nav>
</header>
</div>
