<x-main title="notification title" :user="$user">
    <div class="container">
        <section class="mt-4">
            <div class="border rounded-4">
                <div class="p-3 border-bottom bg-light d-flex flex-nowrap justify-content-between align-items-center">
                    <p class="m-0 small">
                       {{ $notification->title }}
                    </p>
                    <div class="d-flex flex-nowrap align-items-center gap-2">
                        @can('edit', \App\Models\Notification::class)
                            <a  href="{{ route('notifications.edit', $notification->id) }}" class="d-flex align-items-center gap-1" style="font-size: 20px" role="button">
                                <span style="font-size: 14px !important;">Modifier</span>
                                <i class='bx bx-edit nav-link'></i>
                            </a>
                        @endcan
                        @can('delete', \App\Models\Notification::class)
                            <form method="post" action="{{ route('notifications.destroy', $notification->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-transparent border-0 text-danger d-flex align-items-center gap-1" style="font-size: 20px">
                                    <span style="font-size: 14px !important;">Supprimer</span>
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
                <div class="p-3 bg-white">
                    <p class="small">
                        {{ $notification->content }}
                    </p>
                </div>
            </div>
        </section>
    </div>
</x-main>
