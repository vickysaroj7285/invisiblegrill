@extends('admin.layouts.app')

@section('title', 'All Inquiries')
@section('page-title', 'All Inquiries')

@section('content')
<div class="space-y-5">

    {{-- Search + Filter Bar --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 lg:p-5">
        <form method="GET" action="{{ route('admin.inquiries.index') }}"
              class="flex flex-col sm:flex-row gap-3">

            {{-- Search input --}}
            <div class="flex-1 relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search by name, phone or address…"
                       class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-xl text-sm
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none
                              transition-colors placeholder-slate-400">
            </div>

            {{-- Date filters --}}
            <div class="flex flex-wrap gap-2">
                @foreach(['all' => 'All', 'today' => 'Today', 'week' => 'This Week', 'month' => 'This Month'] as $val => $label)
                    <button type="submit" name="filter" value="{{ $val }}"
                            class="px-3.5 py-2.5 rounded-xl text-xs font-semibold transition-colors whitespace-nowrap
                                   {{ $filter === $val
                                       ? 'bg-blue-600 text-white shadow-sm'
                                       : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </form>
    </div>

    {{-- Table card --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <div class="flex items-center gap-2">
                <h2 class="font-semibold text-slate-800 text-sm">Inquiries</h2>
                <span class="bg-slate-100 text-slate-500 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                    {{ $inquiries->total() }}
                </span>
            </div>
            @if(request('search') || $filter !== 'all')
                <a href="{{ route('admin.inquiries.index') }}"
                   class="text-slate-400 hover:text-slate-600 text-xs font-medium transition-colors">
                    Clear filters ×
                </a>
            @endif
        </div>

        @if($inquiries->isEmpty())
            <div class="flex flex-col items-center justify-center py-20 px-5">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-3 3z"/>
                    </svg>
                </div>
                <p class="text-slate-500 font-medium">No inquiries found</p>
                @if(request('search') || $filter !== 'all')
                    <a href="{{ route('admin.inquiries.index') }}"
                       class="text-blue-600 hover:text-blue-700 text-sm mt-2 transition-colors">
                        Clear filters and view all
                    </a>
                @else
                    <p class="text-slate-400 text-sm mt-1">Inquiries from your website will appear here.</p>
                @endif
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 w-12">#</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3">Name</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 hidden sm:table-cell">Phone</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 hidden lg:table-cell">Address</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3 hidden md:table-cell">Lang</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wide px-5 py-3">Date</th>
                            <th class="px-5 py-3 w-16"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($inquiries as $inquiry)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-5 py-4 text-slate-400 text-sm">{{ $inquiry->id }}</td>
                            <td class="px-5 py-4">
                                <span class="text-slate-800 text-sm font-medium">{{ $inquiry->name }}</span>
                            </td>
                            <td class="px-5 py-4 hidden sm:table-cell">
                                <a href="tel:{{ $inquiry->phone }}"
                                   class="text-blue-600 hover:underline text-sm font-medium">
                                    {{ $inquiry->phone }}
                                </a>
                            </td>
                            <td class="px-5 py-4 hidden lg:table-cell">
                                <span class="text-slate-500 text-sm">{{ Str::limit($inquiry->address, 40) }}</span>
                            </td>
                            <td class="px-5 py-4 hidden md:table-cell">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                    {{ $inquiry->locale === 'hi' ? 'bg-orange-50 text-orange-700' : 'bg-blue-50 text-blue-700' }}">
                                    {{ $inquiry->locale === 'hi' ? 'HI' : 'EN' }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <span class="text-slate-600 text-sm">{{ $inquiry->created_at->format('d M Y') }}</span>
                                <span class="text-slate-400 text-xs block leading-tight">{{ $inquiry->created_at->format('H:i') }}</span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}"
                                   class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-700 text-sm font-medium transition-colors">
                                    View
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($inquiries->hasPages())
                <div class="px-5 py-4 border-t border-slate-100">
                    {{ $inquiries->links('pagination::tailwind') }}
                </div>
            @endif
        @endif
    </div>

</div>
@endsection
