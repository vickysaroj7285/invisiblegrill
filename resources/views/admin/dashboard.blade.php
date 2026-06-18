@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Welcome --}}
    <div>
        <h2 class="text-xl font-bold text-slate-800">Welcome back, {{ auth()->user()->name }}!</h2>
        <p class="text-slate-500 text-sm mt-0.5">Here's what's happening with your website inquiries.</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-6a2 2 0 012-2h8z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-slate-800">{{ $stats['total'] }}</p>
            <p class="text-slate-500 text-xs font-medium mt-1 uppercase tracking-wide">Total Inquiries</p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-slate-800">{{ $stats['today'] }}</p>
            <p class="text-slate-500 text-xs font-medium mt-1 uppercase tracking-wide">Today</p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-slate-800">{{ $stats['week'] }}</p>
            <p class="text-slate-500 text-xs font-medium mt-1 uppercase tracking-wide">This Week</p>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-slate-800">{{ $stats['month'] }}</p>
            <p class="text-slate-500 text-xs font-medium mt-1 uppercase tracking-wide">This Month</p>
        </div>
    </div>

    {{-- Recent Inquiries --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <h2 class="font-semibold text-slate-800">Recent Inquiries</h2>
            <a href="{{ route('admin.inquiries.index') }}"
               class="text-blue-600 hover:text-blue-700 text-sm font-medium transition-colors">
                View all →
            </a>
        </div>

        @if($recentInquiries->isEmpty())
            <div class="flex flex-col items-center justify-center py-16 px-5">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-3 3z"/>
                    </svg>
                </div>
                <p class="text-slate-400 font-medium">No inquiries yet</p>
                <p class="text-slate-300 text-sm mt-1">They'll show up here once visitors contact you.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3">Name</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 hidden sm:table-cell">Phone</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 hidden md:table-cell">Language</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3">Received</th>
                            <th class="px-5 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($recentInquiries as $inquiry)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-5 py-3.5">
                                <span class="text-slate-800 text-sm font-medium">{{ $inquiry->name }}</span>
                            </td>
                            <td class="px-5 py-3.5 hidden sm:table-cell">
                                <a href="tel:{{ $inquiry->phone }}"
                                   class="text-blue-600 hover:underline text-sm">{{ $inquiry->phone }}</a>
                            </td>
                            <td class="px-5 py-3.5 hidden md:table-cell">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                    {{ $inquiry->locale === 'hi' ? 'bg-orange-50 text-orange-700' : 'bg-blue-50 text-blue-700' }}">
                                    {{ $inquiry->locale === 'hi' ? 'Hindi' : 'English' }}
                                </span>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="text-slate-500 text-sm">{{ $inquiry->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}"
                                   class="text-blue-600 hover:text-blue-700 text-sm font-medium transition-colors">
                                    View →
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
@endsection
