<x-main title="Les messages" :user="$user">
    <div class="container">
        <section class="mt-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <i class="bx bx-list-ul nav__icon"></i>
                    <h5 class="h5 m-0">La liste des messages</h5>
                </div>
               <a href="{{ route('messages.create') }}"> <i class='bx bx-message-square-add nav__icon' style="font-size: 24px"></i></a>
            </div>
            <div class="px-2">
                @if($messages->isEmpty())
                    <div class="text-muted small text-center">Aucun message</div>
                @else
                    <div class="accordion accordion-borderless" id="accordionFlushExampleX">
                        @foreach($messages as $message)
                            @php
                                $client = \App\Models\User::findOrFail($message->user_id);
                            @endphp
                            <div class="accordion-item mb-2">
                                <h2 class="accordion-header bg-light rounded-5" id="flush-headingOne_{{ $message->id }}">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target="#flush-collapseOne_{{ $message->id }}"
                                        aria-expanded="false"
                                        aria-controls="flush-collapseOne_{{ $message->id }}"
                                    >
                                        <i class='bx bx-message-square-check nav__icon'></i>
                                        <span>{{ $message->subject }}</span>
                                    </button>
                                </h2>
                                <div
                                    id="flush-collapseOne_{{ $message->id }}"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne_{{ $message->id }}"
                                    data-mdb-parent="#accordionFlushExample_{{ $message->id }}"
                                >
                                    <div class="accordion-body small">
                                        <div class="d-flex gap-2 align-items-center flex-nowrap mb-3">
                                            <h6 class="h6 m-0">sujet :</h6>
                                            <p class="m-0">
                                                {{ $message->subject }}
                                            </p>
                                        </div>
                                        <h6 class="h6 mb-3">message :</h6>
                                        <div class="border rounded-4 px-3 py-2 m-2 mb-3">
                                            {{ $message->content }}
                                        </div>
                                        <p class="text-end small m-0">
                                            {{ $message->created_at }}
                                        </p>
                                    </div>
                                    <div class="accordion-footer d-flex flex-nowrap align-items-center gap-2 justify-content-end m-4">
                                        <a href="{{ route('messages.edit', $message->id) }}" role="button"
                                           class="btn btn-secondary btn-sm shadow-none p-2 d-flex justify-content-center align-items-center rounded-circle" style="font-size: 20px">
                                            <i class='bx bx-edit nav__icon m-0'></i>
                                        </a>
                                        <form method="post" action="{{ route('messages.destroy', $message->id) }}" style="z-index: 999">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm shadow-none p-2 d-flex justify-content-center align-items-center rounded-circle" style="font-size: 20px;">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-main>
