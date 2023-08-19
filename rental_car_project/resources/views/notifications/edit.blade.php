<x-main title="Envoyer une notification" :user="$user">
    <div class="container mt-4">
        <div class="contact px-5">
            <div class="d-flex align-items-center">
                <i class="bx bx-edit nav__icon"></i>
                <h5 class="h5 m-0">Veuillez modifier la notification</h5>
            </div>
            <form method="post" action="{{ route('notifications.update', $notification->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="email"
                            id="email"
                            class="form-control"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                        />
                        <label class="form-label" for="email">Adresse email - destination</label>
                    </div>
                    @error('email') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <input
                            type="text"
                            id="titre"
                            class="form-control"
                            name="title"
                            value="{{ old('title', $notification->title) }}"
                        />
                        <label class="form-label" for="titre">Titre</label>
                    </div>
                    @error('title') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="mb-4">
                    <div class="form-outline">
                        <textarea class="form-control" id="message" name="content" rows="4">{{ old('content', $notification->content) }}</textarea>
                        <label class="form-label" for="message">Message</label>
                    </div>
                    @error('content') <x-validation-error message="{{ $message }}" /> @enderror
                </div>
                <div class="d-block text-end">
                    <a href="{{ route('users.index') }}" role="button" class="btn annulerBtn shadow-0">Annuler</a>
                    <button type="submit" class="btn validBtn shadow-0">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</x-main>

