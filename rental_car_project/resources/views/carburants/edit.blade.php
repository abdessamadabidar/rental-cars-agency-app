<x-main title="Modifier carburant" :user="$user">
    <div class="container">
        <section class="mt-4 form-section">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-edit nav__icon"></i>
                <h5 class="h5 m-0">Modifier carburant</h5>
            </div>
            <form action="{{ route('carburants.update', $carburant->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="text"
                            id="fuel"
                            class="form-control"
                            autocomplete="off"
                            name="type"
                            value="{{ old('type', $carburant->type) }}"
                        />
                        <label class="form-label label" for="fuel">Type de carburant</label>
                    </div>
                    @error('type') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="text-end">
                    <a href="{{ route('users.index', $user->id) }}" role="button" class="btn shadow-0">Annuler</a>
                    <button type="submit" class="btn shadow-1-soft validBtn">confirmer</button>
                </div>
            </form>
        </section>
    </div>
</x-main>
