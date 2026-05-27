<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ============ SEO META ============ --}}
    <title>{{ __('site.metaTitle') }}</title>
    <meta name="description" content="{{ __('site.metaDescription') }}">
    <meta name="keywords" content="{{ __('site.metaKeywords') }}">
    <meta name="author" content="InvisibleGrill">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1">
    <meta name="theme-color" content="#2e3438">
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="alternate" hreflang="en" href="{{ url('/') }}">
    <link rel="alternate" hreflang="hi" href="{{ url('/') }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="InvisibleGrill">
    <meta property="og:title" content="{{ __('site.metaTitle') }}">
    <meta property="og:description" content="{{ __('site.metaDescription') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('images/closeup.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="{{ app()->getLocale() === 'hi' ? 'hi_IN' : 'en_IN' }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ __('site.metaTitle') }}">
    <meta name="twitter:description" content="{{ __('site.metaDescription') }}">
    <meta name="twitter:image" content="{{ asset('images/closeup.jpg') }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    {{-- Preconnect for performance --}}
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="preconnect" href="https://unpkg.com" crossorigin>
    <link rel="preconnect" href="https://code.jquery.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Custom site CSS (animations + small overrides) --}}
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">

    {{-- ============ JSON-LD STRUCTURED DATA ============ --}}
    {{-- Blade @-directives escaped with @@ in JSON keys --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "@@id": "{{ url('/') }}#business",
        "name": "InvisibleGrill",
        "url": "{{ url('/') }}",
        "telephone": "+91-98765-43210",
        "email": "hello@invisiblegrill.in",
        "image": "{{ asset('images/closeup.jpg') }}",
        "logo": "{{ asset('images/closeup.jpg') }}",
        "description": "{{ __('site.metaDescription') }}",
        "priceRange": "₹₹",
        "areaServed": {
            "@@type": "Country",
            "name": "India"
        },
        "address": {
            "@@type": "PostalAddress",
            "addressCountry": "IN"
        },
        "aggregateRating": {
            "@@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "5000"
        },
        "openingHoursSpecification": {
            "@@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
            "opens": "09:00",
            "closes": "20:00"
        }
    }
    </script>
</head>
<body class="min-h-screen bg-[#f4f3ef] text-[#1c1c1a] antialiased">

    {{-- ============ FLOATING CONTACT BUTTONS ============ --}}
    <div class="fixed bottom-6 right-6 z-[60] flex flex-col gap-3 no-print" aria-label="Quick contact">
        <a href="https://wa.me/919876543210"
           target="_blank"
           rel="noopener noreferrer"
           class="float-btn w-12 h-12 rounded-full bg-[#25D366] text-white grid place-items-center shadow-lg"
           title="WhatsApp"
           aria-label="WhatsApp">
            <i data-lucide="message-circle" class="w-5 h-5"></i>
        </a>
        <a href="tel:+919876543210"
           class="float-btn w-12 h-12 rounded-full bg-[#2e3438] text-white grid place-items-center shadow-lg"
           title="{{ __('site.callNow') }}"
           aria-label="{{ __('site.callNow') }}">
            <i data-lucide="phone" class="w-5 h-5"></i>
        </a>
    </div>

    {{-- ============ HEADER / NAV ============ --}}
    <header class="fixed top-0 inset-x-0 z-50 backdrop-blur-md bg-[#f4f3ef]/80 border-b border-black/10 no-print" role="banner">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

            {{-- Logo --}}
            <a href="#" class="flex items-center gap-2 font-semibold tracking-tight" aria-label="InvisibleGrill home">
                <span class="w-7 h-7 rounded-md bg-gradient-to-br from-[#6b7a85] to-[#2e3438] grid place-items-center text-white">
                    <i data-lucide="shield" class="w-4 h-4"></i>
                </span>
                InvisibleGrill<span class="text-[#6b7a85]">.</span>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden md:flex items-center gap-8 text-sm text-[#1c1c1a]/70" aria-label="Main navigation">
                <a href="#features" class="hover:text-[#1c1c1a]">{{ __('site.navFeatures') }}</a>
                <a href="#products" class="hover:text-[#1c1c1a]">{{ __('site.navProducts') }}</a>
                <a href="#process" class="hover:text-[#1c1c1a]">{{ __('site.navProcess') }}</a>
                <a href="#contact" class="hover:text-[#1c1c1a]">{{ __('site.navContact') }}</a>
            </nav>

            <div class="flex items-center gap-3">
                {{-- Language switcher --}}
                @php($nextLocale = app()->getLocale() === 'en' ? 'hi' : 'en')
                <a href="{{ route('lang.switch', ['locale' => $nextLocale]) }}"
                   class="flex items-center gap-1.5 rounded-full border border-[#1c1c1a]/15 bg-white/60 px-3 py-1.5 text-xs font-medium hover:bg-white transition"
                   title="{{ __('site.switchLang') }}"
                   aria-label="{{ __('site.switchLang') }}">
                    <i data-lucide="globe" class="w-3.5 h-3.5 text-[#6b7a85]"></i>
                    <span class="uppercase">{{ app()->getLocale() === 'en' ? 'EN' : 'हि' }}</span>
                </a>

                <a href="#contact" class="rounded-full bg-[#2e3438] text-white text-sm font-medium px-4 py-2 hover:bg-[#1c1c1a] transition hidden sm:inline-flex">
                    {{ __('site.ctaQuote') }}
                </a>

                {{-- Mobile menu toggle --}}
                <button id="menu-toggle"
                        type="button"
                        class="md:hidden p-2 -mr-2 text-[#1c1c1a]"
                        aria-label="{{ __('site.menuToggle') }}"
                        aria-controls="mobile-menu"
                        aria-expanded="false">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <nav id="mobile-menu"
             class="mobile-menu md:hidden border-t border-black/10 bg-[#f4f3ef]/95 backdrop-blur-md"
             aria-label="Mobile navigation">
            <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col gap-4 text-sm">
                <a href="#features" class="py-2 hover:text-[#1c1c1a]/70">{{ __('site.navFeatures') }}</a>
                <a href="#products" class="py-2 hover:text-[#1c1c1a]/70">{{ __('site.navProducts') }}</a>
                <a href="#process" class="py-2 hover:text-[#1c1c1a]/70">{{ __('site.navProcess') }}</a>
                <a href="#contact" class="py-2 hover:text-[#1c1c1a]/70">{{ __('site.navContact') }}</a>
                <a href="#contact" class="mt-2 rounded-full bg-[#2e3438] text-white font-medium px-4 py-2 inline-block text-center">{{ __('site.ctaQuote') }}</a>
            </div>
        </nav>
    </header>

    <main>

        {{-- ============ HERO SLIDER ============ --}}
        <section class="relative pt-16 h-screen min-h-[640px] overflow-hidden" aria-label="Hero">

            {{-- Image layers (slides passed from HomeController) --}}
            @foreach ($slides as $i => $slide)
                <div class="slide-layer{{ $i === 0 ? ' is-active' : '' }}"
                     data-kicker="{{ __('site.' . $slide['kicker']) }}"
                     data-title="{{ __('site.' . $slide['title']) }}"
                     data-sub="{{ __('site.' . $slide['sub']) }}"
                     aria-hidden="{{ $i === 0 ? 'false' : 'true' }}">
                    <img src="{{ asset('images/' . $slide['img']) }}"
                         alt="{{ __('site.' . $slide['title']) }}"
                         width="1920"
                         height="1080"
                         loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                         fetchpriority="{{ $i === 0 ? 'high' : 'low' }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#f4f3ef] via-[#f4f3ef]/70 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#f4f3ef]/80 via-transparent to-transparent"></div>
                </div>
            @endforeach

            <div class="relative h-full max-w-7xl mx-auto px-6 flex items-center">
                <div class="max-w-2xl">
                    <div id="slide-text" class="animate-fade-in">
                        <span class="inline-flex items-center gap-2 rounded-full border border-[#1c1c1a]/15 bg-white/60 backdrop-blur px-3 py-1 text-xs">
                            <i data-lucide="sparkles" class="w-3.5 h-3.5 text-[#6b7a85]"></i>
                            <span id="slide-kicker">{{ __('site.' . $slides[0]['kicker']) }}</span>
                        </span>

                        <h1 id="slide-title" class="mt-6 text-5xl md:text-7xl font-semibold tracking-tight leading-[1.05]">
                            {{ __('site.' . $slides[0]['title']) }}
                        </h1>

                        <p id="slide-sub" class="mt-6 text-lg text-[#1c1c1a]/70 max-w-xl">
                            {{ __('site.' . $slides[0]['sub']) }}
                        </p>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="#contact" class="rounded-full bg-[#2e3438] text-white font-medium px-6 py-3 hover:bg-[#1c1c1a] transition">
                            {{ __('site.heroBook') }}
                        </a>
                        <a href="#features" class="rounded-full border border-[#1c1c1a]/20 px-6 py-3 hover:bg-white/60 transition">
                            {{ __('site.heroExplore') }}
                        </a>
                    </div>
                </div>

                {{-- Slider controls --}}
                <div class="absolute bottom-10 left-6 right-6 max-w-7xl mx-auto flex items-center justify-between">
                    <div class="flex gap-2" role="tablist" aria-label="Slide selector">
                        @foreach ($slides as $i => $slide)
                            <button type="button"
                                    class="slide-dot h-1.5 rounded-full transition-all {{ $i === 0 ? 'w-10 bg-[#2e3438]' : 'w-5 bg-[#1c1c1a]/30 hover:bg-[#1c1c1a]/50' }}"
                                    data-idx="{{ $i }}"
                                    aria-label="{{ __('site.slideAria') }} {{ $i + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="hidden md:flex items-center gap-6 text-xs text-[#1c1c1a]/60 font-mono">
                        <span id="slide-counter">01 / 0{{ count($slides) }}</span>
                        <span class="uppercase tracking-widest">{{ __('site.sliderAutoLabel') }}</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============ STATS STRIP ============ --}}
        <section class="border-y border-[#1c1c1a]/10 bg-white/40" aria-label="Key statistics">
            <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center md:text-left">
                @foreach ([
                    ['5000+', __('site.statsHomes')],
                    ['10 yr', __('site.statsWarranty')],
                    ['4.9★',  __('site.statsRating')],
                    ['72 hr', __('site.statsInstall')],
                ] as [$num, $label])
                    <div>
                        <div class="text-3xl font-semibold tracking-tight">{{ $num }}</div>
                        <div class="text-xs uppercase tracking-widest text-[#1c1c1a]/60 mt-1">{{ $label }}</div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ============ FEATURES ============ --}}
        <section id="features" class="py-24" aria-labelledby="features-heading">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex items-end justify-between flex-wrap gap-6">
                    <div>
                        <div class="text-[#6b7a85] text-sm uppercase tracking-widest">{{ __('site.whyKicker') }}</div>
                        <h2 id="features-heading" class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight max-w-2xl">
                            {{ __('site.whyTitle') }}
                        </h2>
                    </div>
                    <p class="text-[#1c1c1a]/60 max-w-sm">{{ __('site.whyDesc') }}</p>
                </div>

                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ([
                        ['shield',   'featSafe',      'featSafeDesc'],
                        ['eye',      'featInvisible', 'featInvisibleDesc'],
                        ['wrench',   'featZero',      'featZeroDesc'],
                        ['sparkles', 'featPremium',   'featPremiumDesc'],
                        ['check',    'featEasy',      'featEasyDesc'],
                        ['shield',   'featWeather',   'featWeatherDesc'],
                    ] as [$icon, $title, $desc])
                        <article class="group rounded-2xl border border-[#1c1c1a]/10 bg-white p-6 hover:border-[#2e3438]/40 hover:shadow-lg transition">
                            <i data-lucide="{{ $icon }}" class="w-6 h-6 text-[#6b7a85]"></i>
                            <h3 class="mt-4 font-medium text-lg">{{ __('site.' . $title) }}</h3>
                            <p class="mt-2 text-sm text-[#1c1c1a]/60 leading-relaxed">{{ __('site.' . $desc) }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ PRODUCTS / SHOWCASE ============ --}}
        <section id="products" class="py-24 border-t border-[#1c1c1a]/10 bg-white/40" aria-labelledby="products-heading">
            <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <img src="{{ asset('images/closeup.jpg') }}"
                         alt="Close-up of invisible grill stainless steel cables"
                         loading="lazy"
                         width="1024"
                         height="1024"
                         class="rounded-3xl w-full h-auto object-cover border border-[#1c1c1a]/10">
                    <div class="absolute -bottom-6 -right-6 bg-[#2e3438] text-white rounded-2xl px-5 py-4 shadow-2xl">
                        <div class="text-2xl font-semibold">2.5"</div>
                        <div class="text-xs opacity-80">{{ __('site.cableSpacing') }}</div>
                    </div>
                </div>

                <div>
                    <div class="text-[#6b7a85] text-sm uppercase tracking-widest">{{ __('site.rangeKicker') }}</div>
                    <h2 id="products-heading" class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight">
                        {{ __('site.rangeTitle') }}
                    </h2>
                    <p class="mt-4 text-[#1c1c1a]/70">{{ __('site.rangeDesc') }}</p>

                    <ul class="mt-8 space-y-4">
                        @foreach ([
                            ['rangeBalcony', 'rangeBalconyDesc'],
                            ['rangeWindow',  'rangeWindowDesc'],
                            ['rangeStair',   'rangeStairDesc'],
                            ['rangeDuct',    'rangeDuctDesc'],
                        ] as [$title, $desc])
                            <li class="flex gap-4 border-b border-[#1c1c1a]/10 pb-4">
                                <i data-lucide="check" class="w-5 h-5 text-[#6b7a85] mt-1 shrink-0"></i>
                                <div>
                                    <div class="font-medium">{{ __('site.' . $title) }}</div>
                                    <div class="text-sm text-[#1c1c1a]/60">{{ __('site.' . $desc) }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        {{-- ============ PROCESS ============ --}}
        <section id="process" class="py-24 border-t border-[#1c1c1a]/10" aria-labelledby="process-heading">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-[#6b7a85] text-sm uppercase tracking-widest">{{ __('site.processKicker') }}</div>
                <h2 id="process-heading" class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight max-w-2xl">
                    {{ __('site.processTitle') }}
                </h2>

                <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach ([
                        ['01', 'step1Title', 'step1Desc'],
                        ['02', 'step2Title', 'step2Desc'],
                        ['03', 'step3Title', 'step3Desc'],
                        ['04', 'step4Title', 'step4Desc'],
                    ] as [$num, $title, $desc])
                        <article class="rounded-2xl border border-[#1c1c1a]/10 p-6 bg-white">
                            <div class="text-[#6b7a85] font-mono text-sm">{{ $num }}</div>
                            <h3 class="mt-3 font-medium text-lg">{{ __('site.' . $title) }}</h3>
                            <p class="mt-2 text-sm text-[#1c1c1a]/60">{{ __('site.' . $desc) }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ CONTACT ============ --}}
        <section id="contact" class="py-24 border-t border-[#1c1c1a]/10 bg-white/40" aria-labelledby="contact-heading">
            <div class="max-w-5xl mx-auto px-6">
                <div class="rounded-3xl border border-[#1c1c1a]/10 bg-gradient-to-br from-[#e7e5df] via-white to-[#dcdcd6] p-8 sm:p-10 md:p-16 shadow-sm">

                    <h2 id="contact-heading" class="text-4xl md:text-5xl font-semibold tracking-tight max-w-2xl">
                        {{ __('site.contactTitle') }}
                    </h2>
                    <p class="mt-4 text-[#1c1c1a]/70 max-w-xl">{{ __('site.contactDesc') }}</p>

                    {{-- Direct Call / WhatsApp --}}
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="tel:+919876543210"
                           class="inline-flex items-center gap-2 rounded-full bg-[#2e3438] text-white font-medium px-5 py-2.5 hover:bg-[#1c1c1a] transition">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                            {{ __('site.callNow') }}
                        </a>
                        <a href="https://wa.me/919876543210"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 rounded-full bg-[#25D366] text-white font-medium px-5 py-2.5 hover:bg-[#128C7E] transition">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            {{ __('site.whatsapp') }}
                        </a>
                    </div>

                    {{-- Contact form --}}
                    <form id="contact-form"
                          action="{{ route('contact.store') }}"
                          method="POST"
                          class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-4"
                          data-error="{{ __('site.contactError') }}"
                          novalidate>
                        @csrf

                        <div class="flex flex-col">
                            <label for="contact-name" class="sr-only">{{ __('site.placeholderName') }}</label>
                            <input id="contact-name"
                                   name="name"
                                   type="text"
                                   required
                                   maxlength="120"
                                   class="bg-white border border-[#1c1c1a]/10 rounded-xl px-4 py-3 placeholder-[#1c1c1a]/40 focus:outline-none focus:border-[#2e3438]"
                                   placeholder="{{ __('site.placeholderName') }}">
                            <span class="field-error" role="alert"></span>
                        </div>

                        <div class="flex flex-col">
                            <label for="contact-phone" class="sr-only">{{ __('site.placeholderPhone') }}</label>
                            <input id="contact-phone"
                                   name="phone"
                                   type="tel"
                                   required
                                   inputmode="tel"
                                   maxlength="20"
                                   class="bg-white border border-[#1c1c1a]/10 rounded-xl px-4 py-3 placeholder-[#1c1c1a]/40 focus:outline-none focus:border-[#2e3438]"
                                   placeholder="{{ __('site.placeholderPhone') }}">
                            <span class="field-error" role="alert"></span>
                        </div>

                        <div class="flex flex-col md:col-span-2">
                            <label for="contact-address" class="sr-only">{{ __('site.placeholderAddress') }}</label>
                            <input id="contact-address"
                                   name="address"
                                   type="text"
                                   required
                                   maxlength="500"
                                   class="bg-white border border-[#1c1c1a]/10 rounded-xl px-4 py-3 placeholder-[#1c1c1a]/40 focus:outline-none focus:border-[#2e3438]"
                                   placeholder="{{ __('site.placeholderAddress') }}">
                            <span class="field-error" role="alert"></span>
                        </div>

                        <button id="contact-submit"
                                type="submit"
                                data-submitting="{{ __('site.contactSubmitting') }}"
                                class="md:col-span-2 rounded-xl bg-[#2e3438] text-white font-medium py-3 hover:bg-[#1c1c1a] transition disabled:opacity-60 disabled:cursor-not-allowed">
                            {{ __('site.contactBtn') }}
                        </button>

                        <div id="form-feedback" class="form-feedback md:col-span-2" role="status" aria-live="polite"></div>
                    </form>

                    {{-- Contact info --}}
                    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-[#1c1c1a]/70">
                        <a href="tel:+919876543210" class="flex items-center gap-3 hover:text-[#1c1c1a]">
                            <i data-lucide="phone" class="w-4 h-4 text-[#6b7a85]"></i> {{ __('site.phone') }}
                        </a>
                        <a href="mailto:hello@invisiblegrill.in" class="flex items-center gap-3 hover:text-[#1c1c1a]">
                            <i data-lucide="mail" class="w-4 h-4 text-[#6b7a85]"></i> {{ __('site.email') }}
                        </a>
                        <div class="flex items-center gap-3">
                            <i data-lucide="map-pin" class="w-4 h-4 text-[#6b7a85]"></i> {{ __('site.location') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- ============ FOOTER ============ --}}
    <footer class="border-t border-[#1c1c1a]/10 py-10 text-center text-sm text-[#1c1c1a]/50" role="contentinfo">
        © <span id="current-year">2026</span> {{ __('site.footerText') }}
    </footer>

    {{-- ============ SCRIPTS ============ --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
