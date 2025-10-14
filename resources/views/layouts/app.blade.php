<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Quill JS -->
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

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $title ?? 'BullWrite' }}">
    <meta property="og:description"
        content="{{ $description ?? 'Academic editing and writing guidance trusted by UK students.' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $image ?? asset('images/og/bullwrite.jpg') }}">
    <meta property="og:locale" content="en_GB">
    <meta property="og:site_name" content="BullWrite">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'BullWrite' }}">
    <meta name="twitter:description"
        content="{{ $description ?? 'Boost your writing confidence with professional editing and feedback.' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/og/bullwrite.jpg') }}">
    <meta name="twitter:site" content="{{ $twitter ?? '@BullWriteUK' }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon & Icons --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- JSON-LD Schema --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'BullWrite',
        'url' => url('/'),
        'logo' => asset('images/logo.png'),
        'sameAs' => [
            'https://twitter.com/BullWriteUK',
            'https://www.facebook.com/BullWrite',
            'https://www.instagram.com/BullWrite'
        ],
        'description' => 'Academic editing and writing guidance trusted by UK students.',
        'contactPoint' => [
            [
                '@type' => 'ContactPoint',
                'contactType' => 'Customer Support',
                'email' => 'support@bullwrite.com'
            ]
        ]
    ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-light text-gray-900 antialiased flex flex-col min-h-screen font-sans">


    <livewire:layouts.header />

    @livewire('order-modal')


    <!-- Main -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    @livewire('footer')

    <livewire:cookie-consent />


    @livewireScripts

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
                component.call('send');
            }

            grecaptcha.reset();
        };

        window.onRecaptchaExpired = function() {
            alert('reCAPTCHA expired. Please verify again.');
        };
    </script>

</body>

</html>
