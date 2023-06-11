<?php

namespace App\Http\Controllers\Notification;

use App\Models\User;
use App\Models\Domain;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::user()->id)->get();
        return view('pages.administrator.notif.index', compact('notifications'));
    }

    public function create(Domain $domain)
    {
        return view('pages.administrator.notif.create', compact('domain'));
    }

    public function store(Request $request, string $id)
    {
        $domain = Domain::findOrFail($id);

        $request->validate([
            'message' => 'required',
        ]);

        $notification = new Notification();
        $notification->user_id = Auth::id();
        $notification->domain_id = $domain->id;
        $notification->subject = $request->input('subject');
        $notification->problem = $request->input('problem');
        $notification->status = $request->input('status');
        $notification->message = $request->input('message');
        $notification->save();

        return redirect()->route('administrator.domain.index')->with('success', 'Notification created successfully.');
    }
}
