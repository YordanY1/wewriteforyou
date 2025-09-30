<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeWriteForYou</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-light text-gray-900 antialiased flex flex-col min-h-screen font-sans">


    <livewire:layouts.header />

    @livewire('order-modal')


    <!-- Main -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-10 mt-16">
        <div class="container mx-auto px-6">
            <p class="text-lg font-semibold">&copy; {{ date('Y') }} WeWriteForYou</p>
            <p class="mt-2 text-sm text-gray-400">Trusted academic writing services – UK & International</p>
            <div class="flex justify-center space-x-6 mt-4">
                <a href="#reviews" class="hover:text-gold transition">Reviews</a>
                <a href="#contact" class="hover:text-gold transition">Contact</a>
            </div>
        </div>
    </footer>

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
