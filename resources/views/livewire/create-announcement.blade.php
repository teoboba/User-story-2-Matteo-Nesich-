
    <div class="form-shell">
    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form wire:submit="save" class="form">
        <label>
            Titolo
            <input type="text" wire:model.blur="title" placeholder="Es. Scrivania in legno">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </label>

        <label>
            Prezzo
            <input type="number" step="0.01" min="0" wire:model.blur="price" placeholder="Es. 49.90">
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </label>

        <label>
            Categoria
            <select wire:model.blur="category_id">
                <option value="">Scegli una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="error">{{ $message }}</span> @enderror
        </label>

        <label>
            Descrizione
            <textarea rows="6" wire:model.blur="description" placeholder="Descrivi lo stato dell'oggetto e le informazioni utili"></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </label>

        <button type="submit" class="primary-button" wire:loading.attr="disabled">
            Inserisci annuncio
        </button>
    </form>
</div>


