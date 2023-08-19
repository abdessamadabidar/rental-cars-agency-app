{{-- modeles modal --}}
<div
    class="modal fade"
    id="modeleModal"
    tabindex="-2"
    aria-labelledby="ModeleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModeleModalLabel">Modeles</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                @foreach($modeles as $modele)
                    <div class="form-check radio--item border mb-2">
                        <input
                            class="form-check-input radio-modele"
                            type="radio"
                            name="model"
                            id="{{ $modele->id }}"
                            value="{{ $modele->name }}"
                        />
                        <label class="form-check-label marque--label" for="{{ $modele->id }}">
                            <img src="{{ asset('storage/' . \Illuminate\Support\Facades\DB::table('marques')->where('id', $modele->brand_id)->value('logo')) }}" alt="" />
                            <h6 class="h6 fw-semibold m-0">{{ $modele->name }}</h6>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" id="modeleBtn" class="btn shadow-sm validBtn" data-mdb-dismiss="modal">Ajouter</button>
            </div>
        </div>
    </div>
</div>
