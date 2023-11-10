<x-main title="Les messages" :user="$user">
    <div class="container">
        <section class="mt-4">
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-list-ul nav__icon"></i>
                <h5 class="h5 m-0">La liste des messages</h5>
            </div>
            <div class="px-2">
                @if($messages->isEmpty())
                    <div class="text-muted small text-center">Aucun message</div>
                @else
                    <ul class="list-group list-group-light">
                        @foreach($messages as $message)
                            @php
                                $client = \App\Models\User::findOrFail($message->user_id);
                            @endphp
                            <li class="list-group-item message px-3" >
                                <div class="d-flex flex-nowrap align-items-center">
                                    <a href="{{ route('messages.show', $message->id) }}" class="stretched-link"></a>
                                    <i class="bx bx-message nav__icon"></i>
                                    <div class="d-flex flex-nowrap align-items-center gap-2">
                                        <div><span class="small">de : </span>{{ $client->first_name }} {{ $client->last_name }}</div>
                                        @if($message->isRead == true)
                                            <span class="badge rounded-pill badge-light">lu</span>
                                        @else
                                            <span class="badge rounded-pill badge-primary">non lu</span>
                                        @endif
                                    </div>
                                </div>
                                <form method="post" action="{{ route('messages.destroy', $message->id) }}" style="z-index: 99">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent text-danger shadow-0" style="font-size: 20px;"><i class='bx bx-trash'></i></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>

    </div>
</x-main>
