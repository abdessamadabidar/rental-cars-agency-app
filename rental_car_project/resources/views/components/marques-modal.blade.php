{{-- marques modal --}}
<div
    class="modal fade"
    id="marqueModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Marques</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                @foreach($marques as $marque)
                    <div class="form-check radio--item border mb-2">
                        <input
                            class="form-check-input radio-marque"
                            type="radio"
                            name="marque"
                            id="{{ $marque->id }}"
                            value="{{ $marque->name }}"
                        />
                        <label class="form-check-label marque--label" for="{{ $marque->id }}">
                            <img src="{{ asset('storage/' . $marque->logo) }}" alt="" />
                            <h6 class="h6 fw-semibold m-0">{{ $marque->name }}</h6>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" id="marqueBtn" class="btn shadow-sm validBtn" data-mdb-dismiss="modal">Ajouter</button>
            </div>
        </div>
    </div>
</div>
