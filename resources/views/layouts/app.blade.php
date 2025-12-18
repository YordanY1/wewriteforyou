<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
    $faviconVersion = filemtime(public_path('favicon.ico'));
    $appleVersion = filemtime(public_path('apple-touch-icon.png'));
    $logoVersion = filemtime(public_path('images/logo.jpg'));
@endphp

<head>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        // Default GDPR-safe state
        gtag('consent', 'default', {
            ad_storage: 'denied',
            analytics_storage: 'denied'
        });
    </script>

    @if (app()->environment('production'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17814106672"></script>
        <script>
            gtag('js', new Date());
            gtag('config', 'AW-17814106672');
        </script>
    @endif


    @if (request()->cookie('cookie_consent'))
        <script>
            gtag('consent', 'update', {
                ad_storage: 'granted',
                analytics_storage: 'granted'
            });
        </script>
    @endif


    <!-- SweetAlert & Quill -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

    <title>{{ $title ?? 'BullWrite – Academic Editing & Writing Support for UK Students' }}</title>

    <meta name="description"
        content="{{ $description ?? 'Boost your academic writing with BullWrite. Professional editing, proofreading, and structure feedback for essays and reports – trusted by UK students.' }}">
    <meta name="keywords"
        content="{{ $keywords ?? 'academic editing UK, proofreading service, essay feedback, writing improvement, academic support, structure feedback' }}">
    <meta name="author" content="{{ $author ?? 'BullWrite Team' }}">
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
    <meta name="revisit-after" content="{{ $revisitAfter ?? '7 days' }}">
    <meta name="language" content="en-GB">
    <meta name="theme-color" content="#b81414">

    {{-- Favicon & Icons (Universal: Desktop, iOS, Android) --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v={{ $faviconVersion }}">
    <link rel="alternate icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('images/favicon-96x96.png') }}?v={{ $faviconVersion }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}?v={{ $faviconVersion }}">


    <meta name="msapplication-TileColor" content="#b81414">
    <meta name="msapplication-TileImage" content="{{ asset('images/web-app-manifest-192x192.png') }}">
    <meta name="application-name" content="BullWrite">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="BullWrite">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    {{-- Open Graph (Facebook, LinkedIn, etc.) --}}
    <meta property="og:title" content="{{ $title ?? 'BullWrite' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Academic editing and writing guidance trusted by UK students.' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $image ?? asset('images/logo.jpg') }}?v={{ $logoVersion }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="BullWrite logo">
    <meta property="og:locale" content="en_GB">
    <meta property="og:site_name" content="BullWrite">
    <meta property="fb:app_id" content="1234567890">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'BullWrite' }}">
    <meta name="twitter:description"
        content="{{ $description ?? 'Boost your writing confidence with professional editing and feedback.' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/logo.jpg') }}?v={{ $logoVersion }}">
    <meta name="twitter:site" content="{{ $twitter ?? '@BullWriteUK' }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- JSON-LD Schema --}}
    <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'BullWrite',
    'url' => url('/'),
    'logo' => asset('images/logo.jpg') . '?v=' . $logoVersion,
    'sameAs' => [
        'https://www.instagram.com/bull.write/',
        'https://www.tiktok.com/@bullwrite',
    ],
    'description' => 'Academic editing and writing guidance trusted by UK students.',
    'contactPoint' => [
        [
            '@type' => 'ContactPoint',
            'contactType' => 'Customer Support',
            'email' => 'support@bullwrite.com',
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>



<body class="bg-light text-gray-900 antialiased flex flex-col min-h-screen">
    <livewire:layouts.header />

    @livewire('order-modal')


    <!-- Main -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    @livewire('footer')

    <livewire:cookie-consent />
    @livewire('register-prompt-modal')


    @livewireScripts

    <script>
        window.addEventListener('cookie-accepted', () => {
            if (typeof gtag === 'function') {
                gtag('consent', 'update', {
                    ad_storage: 'granted',
                    analytics_storage: 'granted'
                });
            }
        });

        window.addEventListener('cookie-rejected', () => {
            if (typeof gtag === 'function') {
                gtag('consent', 'update', {
                    ad_storage: 'denied',
                    analytics_storage: 'denied'
                });
            }
        });
    </script>


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('redirect-to-stripe', (event) => {
                if (event.url) {
                    window.location.href = event.url;
                }
            });
        });
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        window.onRecaptchaSuccess = function(token) {
            const el = document.querySelector('#contact-form');
            if (!el) return;

            const id = el.getAttribute('wire:id');
            const component = Livewire.find(id);

            if (component) {
                component.set('recaptchaToken', token);
            }
        };
    </script>
    <!-- Floating Live Chat Button -->
    <div x-data="{ open: false }" class="fixed z-[9999] flex flex-col items-end space-y-2 bottom-6 right-6">
        <!-- Chat Icon Button -->
        <button @click="open = !open"
            class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-primary to-secondary
               text-white rounded-full shadow-xl hover:shadow-2xl transform hover:scale-105
               transition-all duration-300 cursor-pointer"
            title="Live Chat">
            💬
        </button>

        <!-- Chat Card -->
        <div x-show="open" x-transition @click.outside="open = false"
            class="w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 p-5 animate-fadeIn">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Live Chat</h3>
            <p class="text-gray-600 text-sm mb-4">
                Talk directly with our support team.
            </p>

            @auth
                <a href="{{ route('dashboard') }}"
                    class="block text-center bg-green-100 text-green-800 px-4 py-2 rounded-lg font-semibold hover:bg-green-200 transition">
                    Open in Dashboard →
                </a>
            @else
                <button wire:click="$dispatch('openRegisterModal')"
                    class="w-full bg-gold text-black px-4 py-2 rounded-lg font-semibold hover:bg-secondary hover:text-white transition cursor-pointer">
                    Join to Access
                </button>
            @endauth
        </div>
    </div>


    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.25s ease-out;
        }
    </style>
</body>

</html>
