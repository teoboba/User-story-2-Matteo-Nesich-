<x-layouts.app>

<div class="container-fluid">
    <div class="row py-5 justify-content-center align-items-center text-center">
        <div class="col-12">
            <h1 class="display-1">Risultati per la ricerca "<span class="fst-italic">{{ $query }}</span>"</h1>
        </div>
    </div>
    <div class="row justify-content-center height-custom align-items-center py-5">
        @forelse ($announcements as $announcement)
            <div class="col-12 col-md-3">
                <x-card :announcement="$announcement" />
            </div>
        @empty
            <div class="col-12">
                <h3 class="text-center">Nessun articolo corrisponde alla tua ricerca.</h3>
            </div>
        @endforelse
    </div>
</div>
<div calss="d-flex justify-content-center">
    <div>
    {{ $announcements->links() }}
    </div>
</div>


</x-layouts.app>
