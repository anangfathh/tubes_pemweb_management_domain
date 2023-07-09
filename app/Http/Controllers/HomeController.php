<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\User;
use App\Models\Unit;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $notifications = Notification::join('domains', 'notifications.domain_id', '=', 'domains.id')
            ->where('domains.user_id', $userId)
            ->select('notifications.*')
            ->with('user', 'domain', 'response')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $domainCount = Domain::where('user_id', $userId)->count();
        $httpStatusCount = Domain::where('http_status', 'aktif')->where('user_id', $userId)->count();

        return view('home', compact('notifications', 'domainCount', 'httpStatusCount'));
    }
    public function adminHome()
    {
        $userCount = User::all()->count();
        $unitCount = Unit::all()->count();
        return view('admin-home', compact('userCount', 'unitCount'));
    }
}
