<x-main title="message show" :user="$user">
    <div class="container">
        <div class="d-flex flex-nowrap justify-content-between align-items-center bg-light p-2 px-3 rounded-4 mt-4 mb-3">
            <div class="car-infos__header">
                <i class='bx bx-message-rounded nav__icon'></i>
                <p class="m-0">Sujet : {{ $message->subject }}</p>
            </div>
            <form method="post" action="{{ route('messages.destroy', $message->id) }}">
                @method('DELETE')
                @csrf
                <button type="submit" class="border-0 bg-transparent text-danger shadow-0 d-flex flex-nowrap align-items-center gap-2" style="font-size: 20px">
                    <span style="font-size: 14px !important;">supprimer</span>
                    <i class='bx bx-trash'></i>
                </button>
            </form>
        </div>
        <div class="d-flex flex-column flex-nowrap bg-light p-3 rounded-4">
            <div class="border rounded px-3 py-2 mb-2 bg-white" style="height: 200px;">
                {{ $message->content }}
            </div>
            <div class="d-flex flex-nowrap justify-content-between px-1">
                <span class="small">Envoyé par : <a href="{{ route('clients.show', $client->id) }}">{{ $client->first_name }} {{ $client->last_name }}</a> </span>
                <span class="small">Depuis : {{ $message->created_at  }} </span>
            </div>
        </div>
    </div>
</x-main>
