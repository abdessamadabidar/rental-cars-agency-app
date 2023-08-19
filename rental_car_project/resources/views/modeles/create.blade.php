<x-main title="Ajouter modèle" :user="$user">
    <div class="container">
        <section class="mt-4 form-section">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-plus-circle nav__icon"></i>
                <h5 class="h5 m-0">Veuillez ajouter un modèle</h5>
            </div>
            <form method="post" action="{{ route('modeles.store') }}" >
                @csrf
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="text"
                            id="marque"
                            name="brand"
                            class="form-control"
                            role="button"
                            autocomplete="off"
                            data-mdb-toggle="modal"
                            data-mdb-target="#marqueModal"
                            value="{{ old('brand') }}"
                        />
                        <label class="form-label label" for="marque">marque</label>
                    </div>
                    @error('brand') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
               <div class="mb-4">
                   <div class="form-outline ">
                       <input
                           type="text"
                           id="name"
                           name="name"
                           class="form-control"
                           autocomplete="off"
                           value="{{ old('name') }}"
                       />
                       <label class="form-label label" for="name">Libellé modèle</label>
                   </div>
                   @error('name') <x-validation-error message="{{ $message }}" /> @enderror
               </div>

                <div class="text-end">
                    <a href="{{ route('users.index', $user->id) }}" role="button" class="btn shadow-0">Annuler</a>
                    <button type="submit" class="btn shadow-1-soft validBtn">Ajouter</button>
                </div>
            </form>
        </section>
    </div>
    <x-marques-modal :marques="$marques" />
</x-main>
