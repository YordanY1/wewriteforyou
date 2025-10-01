<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
        }

        .header {
            background: #2d3748;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
        }

        .footer {
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            ✅ Order Confirmation – {{ $order->reference_code }}
        </div>
        <div class="content">
            <p>Hi {{ $order->email }},</p>
            <p>Thank you for your payment! Your order has been confirmed and is now being processed.</p>

            <h3>Order Details:</h3>
            <ul>
                <li><strong>Reference:</strong> {{ $order->reference_code }}</li>
                <li><strong>Topic:</strong> {{ $order->topic }}</li>
                <li><strong>Subject:</strong> {{ $order->subject?->name }}</li>
                <li><strong>Word Count:</strong> {{ $order->words }}</li>
                <li><strong>Deadline:</strong> {{ $order->deadline_option }}</li>
                <li><strong>Total Paid:</strong> £{{ number_format($order->final_price, 2) }}</li>
            </ul>

            <p>We’ll send you updates as soon as your paper is ready.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} WeWriteForYou – All rights reserved.
        </div>
    </div>
</body>

</html>
