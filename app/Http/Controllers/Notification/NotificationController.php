<?php

namespace App\Http\Controllers\Notification;

use App\Models\User;
use App\Models\Domain;
use App\Models\Response;
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
        $notification->status = "Unrespond";
        $notification->message = $request->input('message');
        $notification->save();

        return redirect()->route('administrator.domain.index')->with('success', 'Notification created successfully.');
    }

    public function delete(Notification $notification)
    {
        try {
            $notification->delete();
            return redirect()->route('administrator.notification.index')->with('success', 'Notification deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('administrator.notification.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function showNotifications()
    {
        $userId = Auth::user()->id;

        $notifications = Notification::join('domains', 'notifications.domain_id', '=', 'domains.id')
            ->where('domains.user_id', $userId)
            ->select('notifications.*')
            ->with('user', 'domain', 'response')
            ->get();
        return view('pages.pic.notif.index', compact('notifications'));
    }

    public function showRecentNotifications()
    {
        $userId = Auth::user()->id;

        $notifications = Notification::join('domains', 'notifications.domain_id', '=', 'domains.id')
            ->where('domains.user_id', $userId)
            ->select('notifications.*')
            ->with('user', 'domain', 'response')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('home', compact('notifications'));
    }

    public function showResponse(string $id)
    {
        $notification = Notification::with('user', 'domain', 'response')
            ->where('id', $id)
            ->first();

        if (Auth::user()->is_admin != 1) {
            return view('pages.pic.notif.response', compact('notification'));
        } else {
            return view('pages.administrator.notif.show', compact('notification'));
        }
    }

    public function sendResponse(Request $request, string $id)
    {
        $notification = Notification::findOrFail($id);

        $request->validate([
            'message' => 'required',
            'target_date' => 'date|required'
        ]);

        $response = new Response();
        $response->notification_id = $notification->id;
        $response->user_id = Auth::user()->id;
        $response->message = $request->input('message');
        $response->status = 'doing';
        $response->target_date = $request->input('target_date');
        $response->save();

        $notification->status = 'doing';
        $notification->save();

        return redirect()->route('pic.response', ['id' => $response->notification_id])->with('success', 'Response Has Been Send');
    }

    public function targetDone($id)
    {
        $response = Response::findOrFail($id);

        $response->status = $response->status === 'doing' ? 'done' : 'doing';
        $response->save();

        return redirect()->route('pic.response', ['id' => $response->notification_id])->with('success', 'Response Has Been Send');
    }

    public function fixedButton($id)
    {
        $notification = Notification::findOrFail($id);

        $notification->status = 'done';
        $notification->save();

        return redirect()->route('pic.notif')->with('success', 'Problem Has been Fixed');
    }
}
