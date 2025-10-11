<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 640px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #eef2ff;
            color: #3730a3;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>📦 Order Update</h2>
        <p>Hello,</p>
        <p>Your order <strong>#{{ $order->reference_code }}</strong> has been updated.</p>

        <p><strong>New Status:</strong></p>
        <p class="status">{{ ucfirst(str_replace('_', ' ', $order->order_status)) }}</p>


        @if ($order->user_id)
            <p style="margin-top:20px;">
                You can log in to your account to see more details.
            </p>
        @endif

        <p style="font-size:12px; color:#666; margin-top:30px;">
            Sent on {{ now()->format('M d, Y H:i') }}
            <br>
            &copy; {{ date('Y') }} BullWrite
        </p>
    </div>
</body>

</html>
