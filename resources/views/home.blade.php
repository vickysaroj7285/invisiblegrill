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
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">

            {{-- Logo --}}
            <a href="#" class="flex items-center shrink-0" aria-label="SK Bird Net & Service Surat home">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255 52"
                     class="h-10 sm:h-12 w-auto max-w-[155px] sm:max-w-[245px]"
                     aria-label="SK Bird Net & Service Surat" role="img">
                    <title>SK Bird Net &amp; Service Surat</title>
                    <defs>
                        <clipPath id="logo-icon-clip">
                            <rect x="0" y="3" width="46" height="46" rx="9"/>
                        </clipPath>
                    </defs>
                    <!-- Icon bg -->
                    <rect x="0" y="3" width="46" height="46" rx="9" fill="#2e3438"/>
                    <!-- Net mesh inside icon -->
                    <g clip-path="url(#logo-icon-clip)" stroke="#6b7a85" stroke-width="1" opacity="0.45" fill="none">
                        <line x1="-3" y1="3"  x2="49" y2="49"/>
                        <line x1="-3" y1="13" x2="49" y2="59"/>
                        <line x1="-3" y1="-7" x2="49" y2="39"/>
                        <line x1="7"  y1="-7" x2="59" y2="39"/>
                        <line x1="49" y1="3"  x2="-3" y2="49"/>
                        <line x1="49" y1="13" x2="-3" y2="59"/>
                        <line x1="49" y1="-7" x2="-3" y2="39"/>
                        <line x1="39" y1="-7" x2="-13" y2="39"/>
                        <line x1="13" y1="-7" x2="65"  y2="39"/>
                    </g>
                    <!-- Flying bird -->
                    <g transform="translate(23,26)" fill="white">
                        <path d="M0,-3.5 C-4,-10 -13,-7 -16,-2 C-10,-5 -4.5,-3 0,2.5 C4.5,-3 10,-5 16,-2 C13,-7 4,-10 0,-3.5Z"/>
                        <path d="M-2.5,2.5 L0,9.5 L2.5,2.5 Q0,5.5 -2.5,2.5Z" opacity="0.72"/>
                    </g>
                    <!-- Brand text -->
                    <text x="58" y="22"
                          font-family="Inter,-apple-system,BlinkMacSystemFont,'Segoe UI',Arial,sans-serif"
                          font-size="20" font-weight="700" fill="#2e3438" letter-spacing="-0.3">SK Bird Net</text>
                    <text x="59" y="41"
                          font-family="Inter,-apple-system,BlinkMacSystemFont,'Segoe UI',Arial,sans-serif"
                          font-size="13" font-weight="500" fill="#6b7a85" letter-spacing="0.4">&amp; Service · Surat</text>
                </svg>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden md:flex items-center gap-8 text-sm text-[#1c1c1a]/70" aria-label="Main navigation">
                <a href="#features" class="hover:text-[#1c1c1a]">{{ __('site.navFeatures') }}</a>
                <a href="#products" class="hover:text-[#1c1c1a]">{{ __('site.navProducts') }}</a>
                <a href="#process" class="hover:text-[#1c1c1a]">{{ __('site.navProcess') }}</a>
                <a href="#videos" class="hover:text-[#1c1c1a]">{{ __('site.navVideos') }}</a>
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

    </header>

    {{-- Mobile menu backdrop --}}
    <div id="menu-backdrop" class="menu-backdrop" aria-hidden="true"></div>

    {{-- Mobile nav drawer (slides in from left) --}}
    <nav id="mobile-menu"
         class="mobile-drawer"
         aria-label="Mobile navigation"
         aria-hidden="true">

        {{-- Drawer top bar --}}
        <div class="flex items-center justify-between px-6 h-16 border-b border-black/10 shrink-0">
            <span class="text-sm font-semibold text-[#1c1c1a] tracking-wide uppercase">Menu</span>
            <button id="menu-close"
                    type="button"
                    class="p-2 -mr-2 text-[#1c1c1a] hover:text-[#1c1c1a]/60 transition"
                    aria-label="{{ __('site.menuClose') }}">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        {{-- Nav links --}}
        <div class="px-6 py-5 flex flex-col text-sm">
            <a href="#features" class="py-3.5 border-b border-black/[0.07] text-[#1c1c1a]/70 hover:text-[#1c1c1a] transition">{{ __('site.navFeatures') }}</a>
            <a href="#products" class="py-3.5 border-b border-black/[0.07] text-[#1c1c1a]/70 hover:text-[#1c1c1a] transition">{{ __('site.navProducts') }}</a>
            <a href="#process"  class="py-3.5 border-b border-black/[0.07] text-[#1c1c1a]/70 hover:text-[#1c1c1a] transition">{{ __('site.navProcess') }}</a>
            <a href="#videos"   class="py-3.5 border-b border-black/[0.07] text-[#1c1c1a]/70 hover:text-[#1c1c1a] transition">{{ __('site.navVideos') }}</a>
            <a href="#contact"  class="py-3.5 text-[#1c1c1a]/70 hover:text-[#1c1c1a] transition">{{ __('site.navContact') }}</a>
            <a href="#contact"  class="mt-5 rounded-full bg-[#2e3438] text-white font-medium px-4 py-2.5 text-center hover:bg-[#1c1c1a] transition">{{ __('site.ctaQuote') }}</a>
        </div>
    </nav>

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

                        <h1 id="slide-title" class="mt-6 text-4xl sm:text-5xl md:text-7xl font-semibold tracking-tight leading-[1.05]">
                            {{ __('site.' . $slides[0]['title']) }}
                        </h1>

                    </div>

                    {{-- Fixed service chips — visible on all slides, not part of #slide-text --}}
                    <div class="hero-services" aria-label="{{ __('site.heroSvcTagline') }}">
                        @foreach (['heroSvc1','heroSvc2','heroSvc3','heroSvc4','heroSvc5','heroSvc6','heroSvc7'] as $svc)
                            <span class="hero-svc-chip">{{ __('site.' . $svc) }}</span>
                        @endforeach
                        <p class="hero-svc-tagline">{{ __('site.heroSvcTagline') }}</p>
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
            <div class="max-w-7xl mx-auto px-6">

                {{-- Section header --}}
                <div class="flex items-end justify-between flex-wrap gap-6 mb-14">
                    <div>
                        <div class="text-[#6b7a85] text-sm uppercase tracking-widest">{{ __('site.rangeKicker') }}</div>
                        <h2 id="products-heading" class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight">
                            {{ __('site.rangeTitle') }}
                        </h2>
                    </div>
                    <p class="text-[#1c1c1a]/60 max-w-sm">{{ __('site.rangeDesc') }}</p>
                </div>

                {{-- Card slider --}}
                <div class="prod-slider" role="region" aria-label="{{ __('site.rangeTitle') }}">

                    <button type="button"
                            class="prod-nav-btn prod-prev"
                            aria-label="{{ __('site.prodSliderPrev') }}"
                            disabled>
                        <i data-lucide="chevron-left" class="w-5 h-5" aria-hidden="true"></i>
                    </button>

                    <div class="prod-track-outer">
                        <div class="prod-track" id="prod-track">
                            @foreach ($products as $prod)
                                <article class="prod-card">
                                    <div class="prod-card-img">
                                        <img src="{{ asset('images/' . $prod['img']) }}"
                                             alt="{{ __('site.' . $prod['title']) }}"
                                             loading="lazy"
                                             decoding="async"
                                             width="600"
                                             height="400"
                                             class="prod-img">
                                        <span class="prod-category">{{ __('site.' . $prod['cat']) }}</span>
                                    </div>
                                    <div class="prod-card-body">
                                        <h3 class="prod-card-title">{{ __('site.' . $prod['title']) }}</h3>
                                        <p class="prod-card-desc">{{ __('site.' . $prod['desc']) }}</p>
                                        <div class="prod-tags">
                                            @foreach ($prod['tags'] as $tag)
                                                <span class="prod-tag">{{ __('site.' . $tag) }}</span>
                                            @endforeach
                                        </div>
                                        <a href="#contact" class="prod-cta">
                                            {{ __('site.ctaQuote') }}
                                            <i data-lucide="arrow-right" class="w-3.5 h-3.5" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <button type="button"
                            class="prod-nav-btn prod-next"
                            aria-label="{{ __('site.prodSliderNext') }}">
                        <i data-lucide="chevron-right" class="w-5 h-5" aria-hidden="true"></i>
                    </button>

                </div>

                {{-- Slider dots --}}
                <div class="prod-dots" id="prod-dots" role="tablist" aria-label="{{ __('site.rangeTitle') }}"></div>

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

        {{-- ============ VIDEO GALLERY ============ --}}
        <section id="videos" class="py-24 border-t border-[#1c1c1a]/10" aria-labelledby="videos-heading">
            <div class="max-w-7xl mx-auto px-6">

                <div class="flex items-end justify-between flex-wrap gap-6 mb-14">
                    <div>
                        <div class="text-[#6b7a85] text-sm uppercase tracking-widest">{{ __('site.videoKicker') }}</div>
                        <h2 id="videos-heading" class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight">
                            {{ __('site.videoTitle') }}
                        </h2>
                    </div>
                    <p class="text-[#1c1c1a]/60 max-w-sm">{{ __('site.videoDesc') }}</p>
                </div>

                {{-- Card slider --}}
                <div class="vid-slider" role="region" aria-label="{{ __('site.videoTitle') }}">

                    <button type="button"
                            class="vid-nav-btn vid-prev"
                            aria-label="{{ __('site.prodSliderPrev') }}"
                            disabled>
                        <i data-lucide="chevron-left" class="w-5 h-5" aria-hidden="true"></i>
                    </button>

                    <div class="vid-track-outer">
                        <div class="vid-track" id="vid-track">
                            @foreach ($videos as $vid)
                                <button type="button"
                                        class="vid-card"
                                        data-video-file="{{ asset('videos/' . $vid['video_file']) }}"
                                        aria-label="{{ __('site.videoPlay') }}: {{ __('site.' . $vid['title']) }}">
                                    <div class="vid-thumb-wrap">
                                        <img src="{{ asset($vid['thumb']) }}"
                                             alt="{{ __('site.' . $vid['title']) }}"
                                             loading="lazy"
                                             decoding="async"
                                             width="600"
                                             height="338"
                                             class="vid-thumb">
                                        <div class="vid-play" aria-hidden="true">
                                            <div class="vid-play-btn">
                                                <i data-lucide="play" class="w-5 h-5 text-[#2e3438]" style="margin-left:3px"></i>
                                            </div>
                                        </div>
                                        <span class="vid-duration" aria-hidden="true">{{ $vid['duration'] }}</span>
                                    </div>
                                    <div class="vid-info">
                                        <h3 class="vid-title">{{ __('site.' . $vid['title']) }}</h3>
                                        <p class="vid-desc">{{ __('site.' . $vid['desc']) }}</p>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <button type="button"
                            class="vid-nav-btn vid-next"
                            aria-label="{{ __('site.prodSliderNext') }}">
                        <i data-lucide="chevron-right" class="w-5 h-5" aria-hidden="true"></i>
                    </button>

                </div>

                {{-- Slider dots --}}
                <div class="vid-dots" id="vid-dots" role="tablist" aria-label="{{ __('site.videoTitle') }}"></div>

            </div>
        </section>

        {{-- ============ REVIEWS ============ --}}
        <section id="reviews" class="py-24 border-t border-[#1c1c1a]/10 bg-white/40" aria-labelledby="reviews-heading">
            <div class="max-w-7xl mx-auto px-6">

                <div class="flex items-end justify-between flex-wrap gap-6 mb-14">
                    <div>
                        <div class="text-[#6b7a85] text-sm uppercase tracking-widest">{{ __('site.reviewsKicker') }}</div>
                        <h2 id="reviews-heading" class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight">
                            {{ __('site.reviewsTitle') }}
                        </h2>
                    </div>
                    <p class="text-[#1c1c1a]/60 max-w-sm">{{ __('site.reviewsDesc') }}</p>
                </div>

                <div class="rev-slider" role="region" aria-label="{{ __('site.reviewsTitle') }}">

                    <button type="button"
                            class="rev-nav-btn rev-prev"
                            aria-label="{{ __('site.prodSliderPrev') }}"
                            disabled>
                        <i data-lucide="chevron-left" class="w-5 h-5" aria-hidden="true"></i>
                    </button>

                    <div class="rev-track-outer">
                        <div class="rev-track" id="rev-track">
                            @foreach ($reviews as $rev)
                                <article class="rev-card">
                                    <div class="rev-card-top">
                                        <div class="rev-stars" aria-label="{{ $rev['stars'] }} out of 5 stars">
                                            @for ($s = 0; $s < $rev['stars']; $s++)★@endfor
                                        </div>
                                        <span class="rev-quote" aria-hidden="true">"</span>
                                    </div>
                                    <p class="rev-text">{{ $rev['text'] }}</p>
                                    <div class="rev-author">
                                        <img src="{{ asset('images/' . $rev['img']) }}"
                                             alt="{{ $rev['name'] }}"
                                             width="44"
                                             height="44"
                                             loading="lazy"
                                             decoding="async"
                                             class="rev-avatar">
                                        <div>
                                            <div class="rev-name">{{ $rev['name'] }}</div>
                                            <div class="rev-role">{{ $rev['role'] }}</div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <button type="button"
                            class="rev-nav-btn rev-next"
                            aria-label="{{ __('site.prodSliderNext') }}">
                        <i data-lucide="chevron-right" class="w-5 h-5" aria-hidden="true"></i>
                    </button>

                </div>

                <div class="rev-dots" id="rev-dots" role="tablist" aria-label="{{ __('site.reviewsTitle') }}"></div>

            </div>
        </section>

        {{-- ============ LOCATION / MAP ============ --}}
        <section id="location" class="py-24 border-t border-[#1c1c1a]/10" aria-labelledby="location-heading">
            <div class="max-w-7xl mx-auto px-6">

                <div class="text-[#6b7a85] text-sm uppercase tracking-widest">{{ __('site.locationKicker') }}</div>
                <h2 id="location-heading" class="mt-2 text-4xl md:text-5xl font-semibold tracking-tight max-w-2xl">
                    {{ __('site.locationTitle') }}
                </h2>
                <p class="mt-4 text-[#1c1c1a]/60 max-w-xl">{{ __('site.locationDesc') }}</p>

                <div class="mt-10 relative rounded-2xl overflow-hidden border border-[#1c1c1a]/10 shadow-sm group">

                    {{-- Transparent overlay: entire map area is clickable and opens Google Maps --}}
                    <a href="https://www.google.com/maps/search/Plot+No.+31,+Sai+Palace,+Karadva-Dirdoli,+Surat+394210"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="absolute inset-0 z-10 flex items-end"
                       aria-label="{{ __('site.locationMapAriaLabel') }}">

                        {{-- Address bar shown at bottom of map --}}
                        <div class="w-full bg-white/90 backdrop-blur-sm border-t border-[#1c1c1a]/10 px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 group-hover:bg-white transition-colors">
                            <div class="flex items-start sm:items-center gap-3 min-w-0">
                                <i data-lucide="map-pin" class="w-5 h-5 text-[#2e3438] shrink-0 mt-0.5 sm:mt-0"></i>
                                <div class="min-w-0">
                                    <div class="font-semibold text-sm text-[#1c1c1a]">SK Bird Net &amp; Service</div>
                                    <div class="text-xs text-[#1c1c1a]/60 mt-0.5 truncate">Plot No. 31, Sai Palace, Karadva-Dirdoli, Surat&#8209;394210</div>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-[#2e3438] border border-[#1c1c1a]/15 rounded-full px-3 py-1.5 shrink-0 self-start sm:self-auto bg-[#f4f3ef] group-hover:border-[#2e3438]/40 transition-colors">
                                <i data-lucide="external-link" class="w-3 h-3"></i>
                                {{ __('site.locationOpenMaps') }}
                            </span>
                        </div>
                    </a>

                    {{-- Google Maps iframe — loads lazily (no API key needed for basic embed) --}}
                    <iframe
                        src="https://maps.google.com/maps?q=Plot+No.+31%2C+Sai+Palace%2C+Karadva-Dirdoli%2C+Surat+394210&output=embed&z=15"
                        width="100%"
                        height="420"
                        loading="lazy"
                        style="border:0; display:block; pointer-events:none;"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        title="{{ __('site.locationMapTitle') }}"
                        aria-hidden="true">
                    </iframe>

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

    {{-- ============ VIDEO MODAL ============ --}}
    <div id="vid-modal"
         class="vid-modal"
         role="dialog"
         aria-modal="true"
         aria-label="{{ __('site.videoPlay') }}"
         aria-hidden="true">
        <div class="vid-modal-backdrop" aria-hidden="true"></div>
        <div class="vid-modal-box">
            <button type="button"
                    class="vid-modal-close"
                    aria-label="{{ __('site.videoClose') }}">
                <i data-lucide="x" class="w-4 h-4" aria-hidden="true"></i>
            </button>
            <div class="vid-modal-player">
                <div id="vid-player"></div>
            </div>
        </div>
    </div>

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
