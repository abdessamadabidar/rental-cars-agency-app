<x-main title="Carburants" :user="$user">
    <div class="container">
        <section class="mt-4">
            @include('partials.flashbag-master')
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-list-ul nav__icon"></i>
                <h5 class="h5 m-0">La liste des carburants disponibles</h5>
            </div>
            <div class="data-table">
                <table>
                    <thead>
                    <tr>
                        <th>Type de carburant</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carburants as $carburant)
                        <tr>
                            <td>{{ $carburant->type }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('carburants.edit', $carburant->id) }}" role="button"
                                       class="btn btn-secondary btn-rounded btn-sm shadow-0">
                                        <i class='bx bx-edit'></i>
                                        modifier
                                    </a>
                                    <form method="post" action="{{ route('carburants.destroy', $carburant->id) }}">
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
                    <tfoot></tfoot>
                </table>
            </div>
        </section>
    </div>
</x-main>
