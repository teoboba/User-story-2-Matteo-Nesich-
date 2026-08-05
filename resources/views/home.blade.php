<x-layouts.app title="Presto - Annunci">

    @if (session()->has('errorMessage'))
        <div class=" alert alert-danger text-center shadow rounded">
            {{ session('errorMessage', 'Si è verificato un errore.') }}
        </div>
    @endif



    <section class="hero">
        <div>
            <p class="eyebrow">Mercatino online</p>
            <h1>Dai nuova vita agli oggetti che non usi piu.</h1>
            <p class="hero-copy">
                Crea un annuncio con titolo, prezzo, descrizione e categoria. Gli utenti registrati possono pubblicare subito.
            </p>
            <a class="primary-button" href="{{ route('announcements.create') }}">Inserisci annuncio</a>
        </div>
    </section>

<section class="container py-5">
    <h2 class="text-center mb-5">Ultimi annunci</h2>

    <div class="row g-4">
        @forelse ($announcements as $announcement)
            <div class="col-12 col-md-6 col-lg-4">
                <x-card :announcement="$announcement" />
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">
                    Non ci sono ancora annunci.
                </p>
            </div>
        @endforelse
    </div>
</section>


</x-layouts.app>
