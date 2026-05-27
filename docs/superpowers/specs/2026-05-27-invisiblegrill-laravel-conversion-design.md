# InvisibleGrill — React → Laravel Blade Conversion

**Date:** 2026-05-27
**Source:** `charm-previewer/` (TanStack React + Tailwind)
**Target:** `kabutar/` (Laravel + Blade + Tailwind CDN + jQuery)

---

## Goal

Convert the single-page React "InvisibleGrill" marketing site to a Laravel application with:
- Pixel-identical visual fidelity (same colors, layout, animations)
- SEO-optimized (meta tags, JSON-LD, sitemap, semantic HTML, lazy loading)
- Fully responsive (mobile / tablet / desktop)
- Working contact form (DB persistence)
- Bilingual: English + Hindi toggle
- **All view markup in a single Blade file** — `resources/views/home.blade.php`

---

## Architecture

### Routes (`routes/web.php`)
| Method | URI | Action | Purpose |
|---|---|---|---|
| GET | `/` | `HomeController@index` | Render homepage |
| POST | `/contact` | `ContactController@store` | AJAX form submission |
| GET | `/lang/{locale}` | `LanguageController@switch` | Toggle EN ↔ HI |

`/sitemap.xml` and `/robots.txt` served as static files from `public/`.

### Controllers
- **`HomeController@index`** — Sets locale from session, returns `home` view.
- **`ContactController@store`** — Validates input (name, phone, address), saves to `contact_requests` table, returns JSON.
- **`LanguageController@switch`** — Stores `locale` in session, redirects back.

### Middleware
- **`SetLocale`** — Reads `session('locale')` (fallback `en`), calls `App::setLocale()`. Registered globally in `bootstrap/app.php`.

### Database
**Migration:** `create_contact_requests_table`
```
id              bigint pk
name            string(120)
phone           string(20)
address         text
locale          string(5)
ip_address      string(45) nullable
user_agent      string nullable
created_at, updated_at
```

**Model:** `App\Models\ContactRequest` with `$fillable = ['name','phone','address','locale','ip_address','user_agent']`.

### Localization
- `resources/lang/en/site.php` — All English strings (mirrors `t.en` from React)
- `resources/lang/hi/site.php` — All Hindi strings (mirrors `t.hi` from React)
- Used as `{{ __('site.navFeatures') }}` in Blade

### Single Blade View
- `resources/views/home.blade.php` — Complete page including:
  - `<!DOCTYPE html>` shell
  - `<head>` with all SEO meta tags + JSON-LD + Tailwind CDN + Lucide CDN + jQuery CDN + custom CSS link
  - `<body>` with floating buttons, header, hero slider, stats, features, products, process, contact, footer
  - Custom JS link at end

### Public Assets
```
public/
├── images/
│   ├── closeup.jpg
│   ├── hero.jpg
│   ├── slide1.jpg
│   ├── slide2.jpg
│   └── slide3.jpg
├── css/site.css         ← @keyframes fade-in + small overrides
├── js/site.js           ← jQuery slider + AJAX form + UI helpers
├── robots.txt
└── sitemap.xml
```

### External CDNs (loaded in `<head>`)
- Tailwind CSS: `https://cdn.tailwindcss.com`
- jQuery 3.7.1
- Lucide Icons (auto-converts `<i data-lucide="...">` to SVG)

---

## Data Flow

### Hero Slider (jQuery)
1. 3 `.slide` divs absolutely positioned, each contains its image + gradient overlays.
2. Text container reads `slides[active]` content from `data-*` attributes per slide.
3. `setInterval(5000)` rotates `active` index. CSS transitions fade opacity.
4. Dot clicks call `setActive(i)` and reset interval.
5. Slide counter updates `01 / 03` style.

### Contact Form (AJAX)
1. Form submit captured by jQuery.
2. CSRF token from `<meta name="csrf-token">` attached to request.
3. POST to `/contact` with JSON body.
4. **Validation rules:**
   - `name`: required, string, min:2, max:120
   - `phone`: required, regex Indian phone `/^[+]?[0-9]{10,15}$/`
   - `address`: required, string, min:3, max:500
5. On success: form resets, success banner shown inline.
6. On 422: inline errors per field.
7. On other failure: generic error message.

### Language Switch
1. User clicks `EN / हि` button (an `<a href="/lang/hi">` style link).
2. `LanguageController@switch` validates locale ∈ `['en','hi']`, stores in session, redirects to `URL::previous()` (preserves `#anchor`).
3. `SetLocale` middleware applies on every subsequent request.
4. Blade re-renders all strings in new locale.

---

## SEO Implementation

### Meta Tags (in `<head>`)
- `<title>` — localized
- `<meta name="description">` — localized
- `<meta name="keywords">` — invisible grill, balcony safety, etc.
- `<link rel="canonical">` to site root
- **Open Graph:** og:type=website, og:title, og:description, og:image (closeup.jpg), og:url, og:locale
- **Twitter:** twitter:card=summary_large_image, twitter:title, twitter:description, twitter:image
- `<meta name="robots" content="index,follow">`
- `<meta name="viewport" content="width=device-width, initial-scale=1">`
- `<meta name="theme-color" content="#2e3438">`
- Favicon link

### JSON-LD Schema (LocalBusiness)
```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "InvisibleGrill",
  "telephone": "+91-98765-43210",
  "email": "hello@invisiblegrill.in",
  "areaServed": "India",
  "priceRange": "₹₹",
  "aggregateRating": { "@type": "AggregateRating", "ratingValue": "4.9", "reviewCount": "5000" }
}
```

### Semantic HTML5
- `<header>`, `<nav>`, `<main>`, `<section id="...">`, `<article>`, `<footer>`
- All images have descriptive `alt` text
- `loading="eager"` for first hero slide, `loading="lazy"` for everything else
- Form has proper labels (sr-only class to hide visually)
- Heading hierarchy preserved (h1 → h2 → h3)

### `robots.txt`
```
User-agent: *
Allow: /
Sitemap: {APP_URL}/sitemap.xml
```

### `sitemap.xml`
Single URL entry for `/` with `<priority>1.0</priority>` and current `<lastmod>`.

---

## Responsive Design (Tailwind breakpoints)

| Breakpoint | Width | Notes |
|---|---|---|
| Default | < 768px | Mobile-first |
| `md:` | ≥ 768px | Tablet |
| `lg:` | ≥ 1024px | Desktop |

**Key behaviors:**
- Nav menu: `hidden md:flex` on links; mobile uses hamburger toggle that reveals fullscreen menu
- Hero text: `text-5xl md:text-7xl`
- Features grid: `grid-cols-1 md:grid-cols-3`
- Products: `grid-cols-1 md:grid-cols-2`
- Process: `grid-cols-2 md:grid-cols-4`
- Stats: `grid-cols-2 md:grid-cols-4`
- Contact form: `grid-cols-1 md:grid-cols-2`
- Floating buttons: always visible at `fixed bottom-6 right-6`

---

## Error Handling

| Scenario | Behavior |
|---|---|
| Form validation fails | 422 JSON with errors → jQuery shows inline messages |
| Form server error | Generic "Please try again" banner |
| Invalid locale in `/lang/{locale}` | Abort 404 |
| Image missing | Browser default alt text shown |
| jQuery/CDN fails to load | Page still readable (no JS-required content) |

---

## File Manifest

**Create:**
- `app/Http/Controllers/HomeController.php`
- `app/Http/Controllers/ContactController.php`
- `app/Http/Controllers/LanguageController.php`
- `app/Http/Middleware/SetLocale.php`
- `app/Models/ContactRequest.php`
- `database/migrations/2026_05_27_000000_create_contact_requests_table.php`
- `resources/views/home.blade.php`
- `resources/lang/en/site.php`
- `resources/lang/hi/site.php`
- `public/images/closeup.jpg` (copy)
- `public/images/hero.jpg` (copy)
- `public/images/slide1.jpg` (copy)
- `public/images/slide2.jpg` (copy)
- `public/images/slide3.jpg` (copy)
- `public/css/site.css`
- `public/js/site.js`
- `public/sitemap.xml`

**Modify:**
- `routes/web.php` — add 3 routes
- `bootstrap/app.php` — register `SetLocale` middleware
- `public/robots.txt` — update with sitemap location
- `resources/views/welcome.blade.php` — delete (replaced by home.blade.php)

---

## Out of Scope (YAGNI)
- Email notifications on form submit (DB save only)
- Admin panel to view submissions
- Image optimization / WebP conversion
- Service worker / PWA
- Analytics integration
- Multi-page routing (single page only)
- A11y audit beyond basics (alt, labels, semantic HTML)
