<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BullWrite – Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Google Ads global site tag --}}
    @if (app()->environment('production'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17814106672"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'AW-17814106672');
        </script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">

    <main class="max-w-2xl w-full p-8 bg-white rounded-lg shadow">
        {{ $slot }}
    </main>

    {{-- Purchase conversion – ONLY on success page --}}
    @if (app()->environment('production') && request()->is('payment/success'))
        <script>
            // Safety: ensure consent (user already accepted cookies earlier)
            gtag('consent', 'update', {
                ad_storage: 'granted',
                analytics_storage: 'granted'
            });

            // Google Ads PURCHASE conversion
            gtag('event', 'conversion', {
                send_to: 'AW-17814106672/64NVCO2vhNYbELDktq5C',
                value: {{ $order->total ?? 1.0 }},
                currency: 'GBP'
            });
        </script>
    @endif

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
