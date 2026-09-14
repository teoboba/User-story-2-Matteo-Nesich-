<x-layouts.app title="Lavora con noi">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow border-0">
                    <div class="card-body p-4">

                        <h1 class="text-center mb-3">Lavora con noi</h1>

                        <p class="text-center text-muted mb-4">
                            Compila il form per richiedere di diventare revisore.
                        </p>

                        <form method="POST" action="{{ route('become.revisor') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Nome
                                </label>

                                <input
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    value="{{ Auth::user()->name }}"
                                    readonly
                                >
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <input
                                    id="email"
                                    type="email"
                                    class="form-control"
                                    value="{{ Auth::user()->email }}"
                                    readonly
                                >
                            </div>

                            <div class="mb-4">
                                <label for="motivation" class="form-label">
                                    Perché vuoi diventare revisore?
                                </label>

                                <textarea
                                    id="motivation"
                                    name="motivation"
                                    class="form-control @error('motivation') is-invalid @enderror"
                                    rows="5"
                                    placeholder="Scrivi qui la tua motivazione..."
                                    required
                                >{{ old('motivation') }}</textarea>

                                @error('motivation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Invia richiesta
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layouts.app>
