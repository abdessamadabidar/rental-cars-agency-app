<x-main title="modèle" :user="$user">
    <div class="container">
        <section class="mt-4">
            @include('partials.flashbag-master')
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-list-ul nav__icon"></i>
                <h5 class="h5 m-0">La liste des modèles disponibles</h5>
            </div>
            <div class="data-table">
                <table>
                    <thead>
                    <tr>
                        <th>Libellé modèle</th>
                        <th>Libellé marque</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modeles as $modele)
                        <tr>
                            <td>{{ $modele->name }}</td>
                            <td>{{ $modele->brand }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('modeles.edit', $modele->id) }}" role="button"
                                       class="btn btn-secondary btn-rounded btn-sm shadow-0">
                                        <i class='bx bx-edit'></i>
                                        modifier
                                    </a>
                                    <form method="post" action="{{ route('modeles.destroy', $modele->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-rounded btn-sm shadow-0">
                                            <i class='bx bx-trash'></i>
                                            supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-main>
