<x-main title="voitures" :user="$user">
    <div class="container">
        <section class="mt-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <i class="bx bx-list-ul nav__icon"></i>
                    <h5 class="h5 m-0">La liste des voitures disponibles</h5>
                </div>
                <div class="header__search border rounded-pill">
                    <input type="search" placeholder="Search" class="header__input"/>
                    <i class="bx bx-search nav__icon"></i>
                </div>
            </div>
            <div class="cars data-table">
                <table>
                    <thead>
                    <tr>
                        <th>véhicule</th>
                        <th>Matricule</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Louée</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($voitures as $voiture)
                        <tr>
                            <td>
                                <div class="car-image-container">
                                    @if($voiture->images() !== null)
                                        <img src="{{ asset('storage/' . $voiture->images()[0] )}}" alt=""/>
                                    @else
                                        <img
                                            src="{{ asset('storage/' . \App\Models\CarImage::getPathAttribute(null)) }}"
                                            alt=""/>
                                    @endif
                                </div>
                                {{ $voiture->marque($voiture->modele_id) }} {{$voiture->modele($voiture->modele_id)}}
                            </td>
                            <td>{{ $voiture->matricule }}</td>
                            <td>{{ $voiture->marque($voiture->modele_id) }}</td>
                            <td>{{ $voiture->modele($voiture->modele_id) }}</td>
                            @if($voiture->isRented)
                                <td class="text-danger">Oui</td>
                            @else
                                <td class="text-success">Non</td>
                            @endif
                            <td>
                                <a class="btn btn-link btn-rounded btn-sm"
                                   href="{{ route('voitures.show', $voiture->id) }}" role="button">consulter</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-main>
