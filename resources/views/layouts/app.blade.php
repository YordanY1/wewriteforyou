<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <title>{{ $title ?? 'WeWriteForYou - Academic Writing Services UK' }}</title>

    <meta name="description"
        content="{{ $description ?? 'Affordable and reliable essay writing services in the UK. High-quality academic help tailored for students.' }}">
    <meta name="keywords"
        content="{{ $keywords ?? 'essay writing UK, academic writing UK, assignment help UK, proofreading, dissertation help' }}">
    <meta name="author" content="{{ $author ?? 'WeWriteForYou Team' }}">
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
    <meta name="revisit-after" content="{{ $revisitAfter ?? '7 days' }}">
    <meta name="language" content="en-GB">
    <meta name="theme-color" content="#000000">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $title ?? 'WeWriteForYou' }}">
    <meta property="og:description" content="{{ $description ?? 'Trusted academic writing services in the UK' }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $image ?? asset('images/default-og.jpg') }}">
    <meta property="og:locale" content="en_GB">
    <meta property="og:site_name" content="WeWriteForYou">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'WeWriteForYou' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Affordable essay help for UK students' }}">
    <meta name="twitter:image" content="{{ $image ?? asset('images/default-og.jpg') }}">
    <meta name="twitter:site" content="{{ $twitter ?? '@WeWriteForYouUK' }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon & Icons --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- JSON-LD --}}
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'WeWriteForYou',
        'url' => url('/'),
        'logo' => asset('images/logo.png')
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
</body>

</html>
