<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);
            
        return view('admin.notifications.index', compact('notifications'));
    }

    public function show(Notification $notification)
    {
        $this->authorize('view', $notification);
        $notification->markAsRead();
        return view('admin.notifications.show', compact('notification'));
    }

    public function markAsRead(Notification $notification)
    {
        $this->authorize('update', $notification);
        $notification->markAsRead();
        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        Notification::where('user_id', Auth::id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
        return response()->json(['success' => true]);
    }

    public function unreadCount()
    {
        $count = Notification::where('user_id', Auth::id())
            ->whereNull('read_at')
            ->count();
        return response()->json(['count' => $count]);
    }
} 