<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class NotificationController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        Gate::authorize('viewAny', Notification::class);
        $user = Auth::user();
        $notifications = Notification::all();
        return view('notifications.index', compact('user', 'notifications'));
    }

    public function show(Notification $notification){
        Gate::authorize('view', $notification);
        $user = Auth::user();
        $notification->fill(['isRead' => true])->save();
        return view('notifications.show', compact('user', 'notification'));
    }

    public function create() {
        Gate::authorize('create', Notification::class);
        $user = Auth::user();
        return view('notifications.create', compact('user'));
    }

    public function store(NotificationRequest $notificationRequest) {
        $user_id = DB::table('users')->where('email', $notificationRequest->input('email'))->value('id');
        if ($user_id !== null) {
            $newNotification['title'] = $notificationRequest->input('title');
            $newNotification['content'] = $notificationRequest->input('content');
            $newNotification['user_id'] = $user_id;
            Notification::create($newNotification);
            return to_route('users.index')->with('success', 'la notification a été envoyée avec succès');
        }
        return back()->withErrors(['error' => 'Client introuvable'])->withInput();
    }


    public function edit(Notification $notification) {
        Gate::authorize('edit', Notification::class);
        $user = User::where('id', $notification->user_id)->first();
        return view('notifications.edit', compact('user', 'notification'));
    }

    public function update(NotificationRequest $notificationRequest, Notification $notification) {
        $user_id = DB::table('users')->where('email', $notificationRequest->input('email'))->value('id');
        if ($user_id !== null) {
            $updatedNotification['title'] = $notificationRequest->input('title');
            $updatedNotification['content'] = $notificationRequest->input('content');
            $updatedNotification['user_id'] = $user_id;
            $notification->fill($updatedNotification)->save();
            $notification->fill(['isRead' => false])->save();
            return to_route('notifications.index')->with('success', 'la notification a été modifiée avec succès');
        }
        return back()->withErrors(['error' => 'Client introuvable'])->withInput();
    }

    public function destroy(Notification $notification) {
        Gate::authorize('delete', Notification::class);
        $notification->delete();
        return to_route('users.notifications', $notification->user_id)->with('success', 'la notification a été supprimée avec succès');
    }
}
