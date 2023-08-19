<x-main title="Notifications" :user="$user">
    <div class="container">
        <section class="mt-4">
            @include('partials.flashbag-master')
            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-list-ul nav__icon"></i>
                <h5 class="h5 m-0">La liste des notifications</h5>
            </div>
            <div class="notifications">
                <table class="table">
                    <thead>
                    <tr class="border-bottom">
                        <th scope="col">status</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date</th>
                        <th scope="col">Opération</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notifications as $notification)
                        <tr class="border-bottom">
                            <td>
                                @if(!$notification->isRead)
                                    <span
                                        class="px-2 fw-semibold small rounded-pill bg-primary text-white">Non lu</span>
                                @else
                                    <span class="px-3 fw-semibold small rounded-pill bg-secondary text-white">lu</span>
                                @endif
                            </td>
                            <td>{{ $notification->title }}</td>
                            <td>{{ $notification->created_at }}</td>
                            <td>
                                <a href="{{ route('notifications.show', compact('user', 'notification')) }}"
                                   role="button" class="btn btn-link btn-rounded btn-sm fw-semibold">Lire</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-main>

