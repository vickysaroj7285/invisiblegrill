<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => ContactRequest::count(),
            'today' => ContactRequest::whereDate('created_at', today())->count(),
            'week'  => ContactRequest::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'month' => ContactRequest::whereMonth('created_at', now()->month)
                                     ->whereYear('created_at', now()->year)
                                     ->count(),
        ];

        $recentInquiries = ContactRequest::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries'));
    }
}
