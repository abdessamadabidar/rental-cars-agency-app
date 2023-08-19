<x-main title="Informations" :user="$user">
    <div class="container">
        <section class="profil-form">
            <div class="card testimonial-card mt-3 shadow-0">
                <div class="avatar profil-image-container shadow-sm mb-4 p-2" >
                    <img src="{{ asset('storage/' . $user->image) }}" alt="" style="border-radius: 50%; width: 100%; height: 100%; object-fit: cover;"/>
                </div>
                <div class="card-body px-md-5">
                    <div class="d-flex flex-column">
                        <div class="row gy-4">
                            <div class="col-12 col-md-6">
                                <div class="info border-bottom">
                                    <h6 class="h6 m-0">Préom :</h6>
                                    <p class="m-0">{{ $user->first_name }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info border-bottom">
                                    <h6 class="h6 m-0">Nom :</h6>
                                    <p class="m-0">{{ $user->last_name }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info border-bottom">
                                    <h6 class="h6 m-0">CIN :</h6>
                                    <p class="m-0">{{ $user->cin }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info border-bottom">
                                    <h6 class="h6 m-0">Email :</h6>
                                    <p class="m-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info border-bottom">
                                    <h6 class="h6 m-0">Téléphone :</h6>
                                    <p class="m-0">{{ $user->phone }}</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="info border-bottom">
                                    <h6 class="h6 m-0">Adresse :</h6>
                                    <p class="m-0">{{ $user->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-md-row  gap-2 justify-content-end flex-wrap">
                    <a href="{{ route('users.edit', $user->id) }}" role="button" class="btn btn-secondary shadow-0 d-block d-md-inline">
                        <i class='bx bx-edit'></i>
                        Modifier
                    </a>
                    <form method="post" action="{{ route('users.destroy', $user->id) }}" class="d-block d-md-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger shadow-0 w-100">
                            <i class='bx bx-trash'></i>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-main>
