<x-main title="Profile" :user="$user">
    <div class="container">
        <div class="card testimonial-card shadow-0">
            <div class="card-body px-md-5">
                <form method="post" action="{{ route('users.update', $user->id) }}" class="d-flex flex-column row-gap-4" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="avatar profil-image-container shadow-sm mb-4 p-2" >
                        <div class="round shadow-1-soft">
                            <input type="file" name="image" id="image"/>
                            <i class="fa fa-camera"></i>
                        </div>
                        <img src="{{ asset('storage/' . $user->image) }}" alt="" style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;"/>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    id="firstName"
                                    class="form-control form-control-lg"
                                    name="first_name"
                                    value="{{ old('first_name', $user->first_name) }}"
                                />
                                <label class="form-label" for="firstName">Prénom</label>
                            </div>
                            @error('first_name') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    id="lastName"
                                    class="form-control form-control-lg"
                                    name="last_name"
                                    value="{{old('last_name',  $user->last_name) }}"
                                />
                                <label class="form-label" for="lastName">Nom</label>
                            </div>
                            @error('last_name') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    id="CIN"
                                    class="form-control form-control-lg"
                                    name="cin"
                                    value="{{ old('cin', $user->cin) }}"
                                />
                                <label class="form-label" for="CIN">CIN</label>
                            </div>
                            @error('cin') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    id="email"
                                    class="form-control form-control-lg"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                />
                                <label class="form-label" for="email">Adresse email</label>
                            </div>
                            @error('email') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="tel"
                                    id="telephone"
                                    class="form-control form-control-lg"
                                    name="phone"
                                    value="{{ old('phone', $user->phone) }}"
                                />
                                <label class="form-label" for="telephone">Téléphone</label>
                            </div>
                            @error('phone') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    id="adresse"
                                    class="form-control form-control-lg"
                                    name="address"
                                    value="{{ old('address', $user->address) }}"
                                />
                                <label class="form-label" for="adresse">Adresse</label>
                            </div>
                            @error('address') <x-validation-error message="{{ $message }}" /> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-end">
                            <a href="{{ route('users.index', $user->id) }}" role="button" class="btn annulerBtn shadow-0">Annuler</a>
                            <button type="submit" class="btn validBtn shadow-0">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
