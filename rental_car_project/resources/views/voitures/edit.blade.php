<x-main title="Modifier voiture" :user="$user">
    <div class="container">
        <div class="d-flex align-items-center mt-4">
            <i class="bx bx-edit nav__icon"></i>
            <h5 class="h5 m-0">Modifier voiture</h5>
        </div>
        <section class=" form-section">
            <form action="{{ route('voitures.update', $voiture->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input
                                type="text"
                                id="modele"
                                class="form-control"
                                role="button"
                                autocomplete="off"
                                data-mdb-toggle="modal"
                                data-mdb-target="#modeleModal"
                                name="modele"
                                value="{{ old('modele', $voiture->modele($voiture->modele_id)) }}"
                            />
                            <label class="form-label label" for="modele">Modele</label>
                        </div>
                        @error('modele') <x-validation-error message="{{ $message }}" /> @enderror
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input
                                type="text"
                                id="matricule"
                                class="form-control"
                                autocomplete="off"
                                name="matricule"
                                value="{{ old('matricule', $voiture->matricule) }}"
                            />
                            <label class="form-label label" for="matricule">Matricule</label>
                        </div>
                        @error('matricule') <x-validation-error message="{{ $message }}" /> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="file"
                            id="image"
                            class="form-control"
                            accept="image/*"
                            name="images[]"
                            multiple
                        />
                    </div>
                    @error('images') <x-validation-error message="{{ $message }}" /> @enderror
                </div>

                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="number"
                            id="kilometrage"
                            class="form-control"
                            min="0"
                            name="kilometrage"
                            value="{{ old('kilometrage', $voiture->kilometrage) }}"
                        />
                        <label class="form-label label" for="kilometrage">Kilométrage</label>
                    </div>
                    @error('kilometrage') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="number"
                            id="puissance"
                            class="form-control"
                            min="0"
                            name="puissance"
                            value="{{ old('puissance', $voiture->puissance) }}"
                        />
                        <label class="form-label label" for="puissance">Puissance</label>
                    </div>
                    @error('puissance') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="text"
                            id="color"
                            class="form-control"
                            name="couleur"
                            value="{{ old('couleur', $voiture->couleur) }}"
                        />
                        <label class="form-label label" for="color">Couleur</label>
                    </div>
                    @error('couleur') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="number"
                            id="nbrPlaces"
                            class="form-control"
                            min="2"
                            max="9"
                            name="nbr_de_places"
                            value="{{ old('nbr_de_places', $voiture->nbr_de_places) }}"
                        />
                        <label class="form-label label" for="nbrPlaces">Nombre de places</label>
                    </div>
                    @error('nbr_de_places') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="number"
                            id="priceHour"
                            class="form-control"
                            min="0"
                            name="prix"
                            value="{{ old('prix', $voiture->prix) }}"
                        />
                        <label class="form-label label" for="priceHour">Prix par heure</label>
                    </div>
                    @error('prix') <x-validation-error message="{{ $message }}" /> @enderror
                </div>

                <div class="mb-4">
                    <div class="row radio rounded-2 w-100 mx-0">
                        <div class="col-4 p-0">
                            <p class="label m-0">Boite vitesse</p>
                        </div>
                        <div class="col-4 form-check d-flex justify-content-center">
                            <input
                                class="form-check-input me-2"
                                type="radio"
                                value="manuelle"
                                name="boite_vitesse"
                                id="manual"
                            />
                            <label class="form-check-label" for="manual">Manuelle</label>
                        </div>
                        <div class="col-4 form-check d-flex justify-content-center">
                            <input
                                class="form-check-input me-2"
                                type="radio"
                                value="automatique"
                                name="boite_vitesse"
                                id="automatic"
                            />
                            <label class="form-check-label" for="automatic">Automatique</label>
                        </div>
                    </div>
                    @error('boite_vitesse') <x-validation-error message="{{ $message }}" /> @enderror
                </div>

                <div class="d-block text-end">
                    <a href="{{ route('voitures.index') }}" role="button" class="btn annulerBtn shadow-0">Annuler</a>
                    <button type="submit" class="btn validBtn shadow-0">Modifier</button>
                </div>
            </form>
        </section>
    </div>
    <x-marques-modal :marques="$marques" />
    <x-modeles-modal :modeles="$modeles" />
</x-main>

