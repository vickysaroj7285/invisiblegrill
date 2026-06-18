@extends('admin.layouts.app')

@section('title', 'Inquiry #' . $inquiry->id)
@section('page-title', 'Inquiry Details')

@section('content')
<div class="max-w-2xl">

    {{-- Back --}}
    <a href="{{ route('admin.inquiries.index') }}"
       class="inline-flex items-center gap-1.5 text-slate-500 hover:text-slate-700 text-sm font-medium transition-colors mb-5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Inquiries
    </a>

    {{-- Header banner --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl px-6 py-5 mb-4 shadow-sm shadow-blue-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <p class="text-blue-200 text-xs font-semibold uppercase tracking-widest mb-1">
                    Inquiry #{{ $inquiry->id }}
                </p>
                <h2 class="text-white text-xl sm:text-2xl font-bold">{{ $inquiry->name }}</h2>
            </div>
            <div class="text-left sm:text-right flex-shrink-0">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                    {{ $inquiry->locale === 'hi' ? 'bg-orange-400/20 text-orange-100' : 'bg-white/20 text-white' }}">
                    {{ $inquiry->locale === 'hi' ? 'Hindi (हिंदी)' : 'English' }}
                </span>
                <p class="text-blue-200 text-xs mt-2">{{ $inquiry->created_at->format('d M Y, H:i') }}</p>
                <p class="text-blue-300 text-xs">{{ $inquiry->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>

    {{-- Details card --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mb-4 space-y-5">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">Full Name</p>
                <p class="text-slate-800 font-semibold text-base">{{ $inquiry->name }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">Phone Number</p>
                <a href="tel:{{ $inquiry->phone }}"
                   class="inline-flex items-center gap-1.5 text-blue-600 hover:text-blue-700 font-semibold text-base transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    {{ $inquiry->phone }}
                </a>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">Address / Location</p>
            <p class="text-slate-800 leading-relaxed">{{ $inquiry->address }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-4 border-t border-slate-100">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">Submitted</p>
                <p class="text-slate-700 text-sm font-medium">{{ $inquiry->created_at->format('d M Y \a\t H:i') }}</p>
                <p class="text-slate-400 text-xs mt-0.5">{{ $inquiry->created_at->diffForHumans() }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">Language</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                    {{ $inquiry->locale === 'hi' ? 'bg-orange-50 text-orange-700 border border-orange-200'
                                                 : 'bg-blue-50 text-blue-700 border border-blue-200' }}">
                    {{ $inquiry->locale === 'hi' ? 'Hindi (हिंदी)' : 'English' }}
                </span>
            </div>
        </div>

        @if($inquiry->ip_address)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-4 border-t border-slate-100">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">IP Address</p>
                <p class="text-slate-500 text-sm font-mono bg-slate-50 px-2 py-1 rounded-lg inline-block">
                    {{ $inquiry->ip_address }}
                </p>
            </div>
            @if($inquiry->user_agent)
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1.5">Device Info</p>
                <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">{{ $inquiry->user_agent }}</p>
            </div>
            @endif
        </div>
        @endif
    </div>

    {{-- Action buttons --}}
    <div class="flex flex-wrap items-center gap-3">
        <a href="tel:{{ $inquiry->phone }}"
           class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 active:bg-green-800
                  text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            Call Customer
        </a>

        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}"
           target="_blank" rel="noopener noreferrer"
           class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700
                  text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors shadow-sm">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
            WhatsApp
        </a>

        <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}"
              class="ml-auto"
              onsubmit="return confirm('Delete this inquiry permanently? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center gap-2 bg-white hover:bg-red-50 text-red-600 text-sm font-semibold
                           px-5 py-2.5 rounded-xl transition-colors border border-red-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Delete
            </button>
        </form>
    </div>

</div>
@endsection
