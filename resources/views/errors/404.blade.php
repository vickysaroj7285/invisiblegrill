<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found — SK Bird Net Surat</title>
    <meta name="robots" content="noindex, follow">
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f4f3ef] text-[#1c1c1a] antialiased flex flex-col items-center justify-center px-6" style="font-family:'Inter',sans-serif;">

    <div class="text-center max-w-lg">
        <div class="text-[#6b7a85] font-mono text-sm uppercase tracking-widest mb-4">404</div>
        <h1 class="text-4xl sm:text-5xl font-semibold tracking-tight mb-4">Page not found.</h1>
        <p class="text-[#1c1c1a]/60 text-base leading-relaxed mb-8">
            The page you're looking for doesn't exist or may have been moved.
        </p>
        <a href="{{ url('/') }}"
           class="inline-flex items-center gap-2 rounded-full bg-[#2e3438] text-white font-medium px-6 py-3 hover:bg-[#1c1c1a] transition">
            ← Back to Home
        </a>
        <div class="mt-10 text-sm text-[#1c1c1a]/40">
            Need help?
            <a href="tel:+917043719519" class="underline hover:text-[#1c1c1a]">Call +91 70437 19519</a>
        </div>
    </div>

</body>
</html>
