<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
            background: #f9fafb;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 640px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: linear-gradient(90deg, #2563eb, #1e40af);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 22px;
        }

        .content {
            padding: 30px;
        }

        .content p {
            margin: 10px 0;
        }

        .box {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            font-size: 15px;
            line-height: 1.5;
        }

        .meta {
            font-size: 13px;
            color: #6b7280;
            margin-top: 15px;
        }

        .footer {
            background: #f9fafb;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            padding: 15px;
        }

        a.btn {
            display: inline-block;
            margin-top: 15px;
            background: #2563eb;
            color: #fff !important;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: 600;
        }

        a.btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>💬 New Client Message</h2>
        </div>
        <div class="content">
            <p><strong>Order:</strong> #{{ $chatMessage->order->reference_code }}</p>
            <p><strong>Client:</strong> {{ $chatMessage->order->email }}</p>

            <div class="box">
                {!! nl2br(e($chatMessage->message)) !!}
            </div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} BullWrite – Admin Notification
        </div>
    </div>
</body>

</html>
