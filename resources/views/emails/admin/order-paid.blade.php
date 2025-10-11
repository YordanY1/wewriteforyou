<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 640px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: linear-gradient(90deg, #16a34a, #166534);
            color: #fff;
            padding: 24px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 8px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .content {
            padding: 32px;
            color: #333;
        }

        .content h2 {
            margin-top: 0;
            color: #2563eb;
        }

        .details {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            margin-top: 16px;
        }

        .details ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .details li {
            margin: 8px 0;
            font-size: 15px;
        }

        .highlight {
            font-weight: bold;
            color: #16a34a;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            padding: 20px;
            background: #f3f4f6;
        }

        .btn {
            display: inline-block;
            margin-top: 24px;
            background: #2563eb;
            color: white !important;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>✅ New Paid Order Received</h1>
            <p>Reference: <strong>{{ $order->reference_code }}</strong></p>
        </div>
        <div class="content">
            <h2>Order Details</h2>
            <p>
                A new order has just been paid successfully by a customer.
                Please review the details below and assign a writer as soon as possible.
            </p>

            <div class="details">
                <ul>
                    <li>📧 <strong>Customer Email:</strong> {{ $order->email }}</li>
                    <li>📚 <strong>Subject:</strong> {{ $order->subject?->name }}</li>
                    <li>📝 <strong>Topic:</strong> {{ $order->topic ?? '—' }}</li>
                    <li>✍️ <strong>Word Count:</strong> {{ $order->words }}</li>
                    <li>⏰ <strong>Deadline:</strong> {{ $order->deadline_option }}
                        ({{ $order->deadline_at?->format('d M Y, H:i') }})</li>
                    <li>💷 <strong>Total Paid:</strong> £{{ number_format($order->final_price, 2) }}</li>
                    <li>
                        📌 <strong>Payment Status:</strong>
                        <span class="highlight">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </li>

                    <li>
                        🚦 <strong>Order Status:</strong>
                        <span class="highlight">
                            {{ ucfirst(str_replace('_', ' ', $order->order_status)) }}
                        </span>
                    </li>

                    <li>🗓 <strong>Created At:</strong> {{ $order->created_at->format('d M Y, H:i') }}</li>
                </ul>
            </div>

            {{-- <a href="{{ url('/admin/orders/' . $order->id) }}" class="btn">
                🔍 View in Admin Dashboard
            </a> --}}
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} BullWrite – Internal Admin Notification
        </div>
    </div>
</body>

</html>
