<x-main title="compléter votre réservation" :user="$user">
    <div class="container">
        <section class="mt-4 vh-100">
            <div class="alert alert-info">
                <h6 class="small fw-semibold">Veuillez s'il vous plait compléter votre réservation</h6>
                <ul class="list-group-flush m-0">
                    <li class="list-item m-0 p-0"><p class="small m-0 p-0">Importer votre carte permis de conduire recto</p></li>
                    <li class="list-item m-0 p-0"><p class="small m-0 p-0">Importer votre carte permis de conduire verso</p></li>
                    <li class="list-item m-0 p-0"><p class="small m-0 p-0">La photo doit être claire et ne pas dépasser 10 Mo.</p></li>
                </ul>
            </div>
            <div class="border px-5 p-4 rounded">
                <form method="post" action="{{ route('reservations.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                            <label class="form-label small" for="imageRecto">carte permis - recto</label>
                            <div class="form-outline">
                                <input
                                    type="file"
                                    id="imageRecto"
                                    class="form-control"
                                    name="permis_recto"
                                    value="{{ old('permis_recto') }}"
                                />
                            </div>
                            @error('permis_recto') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label class="form-label small" for="imageVerso">carte permis - verso</label>
                            <div class="form-outline">
                                <input
                                    type="file"
                                    id="imageVerso"
                                    class="form-control"
                                    name="permis_verso"
                                    value="{{ old('permis_verso') }}"
                                />
                            </div>
                            @error('permis_verso') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-outline d-flex align-items-center">
                                <input
                                    type="date"
                                    id="DateDebut"
                                    class="form-control form-control-lg"
                                    name="date_debut"
                                    value="{{ old('date_debut') }}"
                                />
                                <label class="form-label" for="DateDebut">Date Début</label>
                            </div>
                            @error('date_debut') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="time"
                                    id="HeureDebut"
                                    class="form-control form-control-lg"
                                    name="heure_debut"
                                    value="{{ old('heure_debut') }}"
                                />
                                <label class="form-label" for="HeureDebut">Heure Début</label>
                            </div>
                            @error('heure_debut') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="date"
                                    id="DateFin"
                                    class="form-control form-control-lg"
                                    name="date_fin"
                                    value="{{ old('date_fin') }}"
                                />
                                <label class="form-label" for="DateFin">Date Fin</label>
                            </div>
                            @error('date_fin') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="time"
                                    id="HeureFin"
                                    class="form-control form-control-lg"
                                    name="heure_fin"
                                    value="{{ old('heure_fin') }}"
                                />
                                <label class="form-label" for="HeureFin">Heure Fin</label>
                            </div>
                            @error('heure_fin') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                    </div>
                    <input type="number" value="{{ $voiture->id }}" name="car_id" hidden>
                    <input type="number" value="{{ $user->id }}" name="client_id" hidden>
                    <div class="text-end mt-4" >
                        <a href="{{ route('users.index') }}" role="button" class="btn annulerBtn shadow-0">Annuler</a>
                        <button type="submit" class="btn validBtn shadow-0">Valider</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-main>
