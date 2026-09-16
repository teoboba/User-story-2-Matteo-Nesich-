<div class="card mx-auto card-w shadow text-center mb-3">
   <img
    src="{{ $announcement->images->isNotEmpty()
        ? $announcement->images->first()->getUrl(300, 300)
        : 'https://picsum.photos/200' }}"
    class="card-img-top"
    alt="Immagine dell'articolo {{ $announcement->title }}"
>
    <div class="card-body">
        <h4 class="card-title">{{ $announcement->title }}</h4>
        <h6 class="card-subtitle text-body-secondary">{{ $announcement->price }} Euro</h6>
        <div class="d-flex justify-content-evenly align-items-center mt-5">
            <a href="{{ route('announcements.show', compact('announcement')) }}" class="btn btn-primary">Dettaglio</a>
            <a href="{{ route('byCategory', ['category' => $announcement->category]) }}" class="btn btn-outline-info">Categoria</a>
        </div>
    </div>
</div>
