<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BullWrite – Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TJ7V3VTS');
    </script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- @if (app()->environment('production'))
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17883089577"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'AW-17883089577');
        </script>
    @endif --}}

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

    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ7V3VTS" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>


</body>

</html>
