<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('create');
    }

    public function index() {
        Gate::authorize('viewAny', Message::class);
        $user = Auth::user();
        $messages = Message::all();
        return view('messages.index', compact('user', 'messages'));
    }

    public function create() {
        $user = Auth::user();
        return view('messages.create', compact('user'));
    }

    public function store(MessageRequest $messageRequest) {
        Gate::authorize('create', Message::class);
        $newMessage['user_id'] = Auth::user()->id;
        $newMessage['subject'] = $messageRequest->input('subject');
        $newMessage['content'] = $messageRequest->input('content');
        Message::create($newMessage);
        return to_route('users.index')->with('success', 'votre message a bien été envoyé');
    }

    public function show(Message $message) {
        Gate::authorize('view', $message);
        $user = Auth::user();
        $client = User::find($message->user_id);
        Message::where('id', $message->id)->update(['isRead' => true]);
        return view('messages.show', compact('user', 'message', 'client'));
    }

    public function edit(Message $message) {
        $user = Auth::user();
        return view('messages.edit', compact('user', 'message'));
    }

    public function update(MessageRequest $messageRequest, Message $message) {
        $message->fill($messageRequest->validated())->save();
        $message->fill(['isRead' => false])->save();
        return to_route('client.messages', $message->user_id)->with('success', 'votre message a bien été modifié');
    }

    public function destroy(Message $message) {
        $message->delete();
        $user = Auth::user();
        if ($user->isAdmin()){
            return to_route('messages.index')->with('success', 'Message a bien été supprimé');
        }
        return to_route('client.messages', $user->id)->with('success', 'Message a bien été supprimé');

    }


}
