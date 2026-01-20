<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BullWrite – Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (app()->environment('production'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17883089577"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'AW-17883089577');
        </script>
    @endif

</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">

    <main class="max-w-2xl w-full p-8 bg-white rounded-lg shadow">
        {{ $slot }}
    </main>

    {{-- Clear local storage after successful payment --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (window.location.pathname.includes("/payment/success")) {
                localStorage.removeItem("bullwrite_order_form");
            }
        });
    </script>

</body>

</html>
