<x-main title="Ajouter Marque" :user="$user">
    <div class="container">
        <section class="mt-4 form-section">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-edit nav__icon"></i>
                <h5 class="h5 m-0">Modifier marque</h5>
            </div>
            <form method="post" action="{{ route('marques.update', $marque->id) }}" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="text"
                            id="name"
                            class="form-control"
                            autocomplete="off"
                            name="name"
                            value="{{ old('name', $marque->name) }}"
                        />
                        <label class="form-label label" for="name">Libellé marque</label>
                    </div>
                    @error('name') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="file"
                            class="form-control"
                            name="logo"
                        />
                    </div>
                    @error('logo') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="text-end">
                    <a href="{{ route('marques.index') }}" role="button" class="btn shadow-0">Annuler</a>
                    <button type="submit" class="btn shadow-1-soft validBtn">Modifier</button>
                </div>
            </form>
        </section>
    </div>
</x-main>
