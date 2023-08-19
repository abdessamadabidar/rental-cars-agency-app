<x-main title="Ajouter Marque" :user="$user">
    <div class="container">
        <section class="mt-4 form-section">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-plus-circle nav__icon"></i>
                <h5 class="h5 m-0">Veuillez ajouter une marque</h5>
            </div>
            <form method="post" action="{{ route('marques.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="text"
                            id="name"
                            class="form-control"
                            autocomplete="off"
                            name="name"
                            value="{{ old('name') }}"
                        />
                        <label class="form-label label" for="name">Libellé marque</label>
                    </div>
                    @error('name') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline mb-4">
                        <input
                            type="file"
                            class="form-control"
                            name="logo"
                            value="{{ old('logo') }}"
                        />
                    </div>
                    @error('logo') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="text-end">
                    <a href="{{ route('users.index', $user->id) }}" role="button" class="btn shadow-0">Annuler</a>
                    <button type="submit" class="btn shadow-1-soft validBtn">Ajouter</button>
                </div>
            </form>
        </section>
    </div>
</x-main>
