<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BullWrite – Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">

    <main class="max-w-2xl w-full p-8 bg-white rounded-lg shadow">
        {{ $slot }}
    </main>

    {{-- Fallback JS to ensure localStorage is cleared --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const path = window.location.pathname;

            if (path.includes("/payment/success")) {
                localStorage.removeItem("bullwrite_order_form");
            }
        });
    </script>

</body>

</html>
