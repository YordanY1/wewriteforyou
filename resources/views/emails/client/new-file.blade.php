<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            padding: 20px;
        }

        .container {
            max-width: 640px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .05);
        }

        .header {
            background: linear-gradient(90deg, #2563eb, #1e40af);
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .file-box {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            border: 1px solid #e5e7eb;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            margin-top: 20px;
        }

        a.btn {
            display: inline-block;
            margin-top: 20px;
            background: #2563eb;
            color: #fff !important;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>📂 New File Available</h2>
        </div>
        <p>Hello,</p>
        <p>A new file has been uploaded for your order:</p>

        <p><strong>Order Reference:</strong> #{{ $file->order->reference_code }}</p>

        <div class="file-box">
            <p><strong>File:</strong> {{ $file->original_name }}</p>
            <p><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $file->type)) }}</p>
            <p><strong>Uploaded:</strong> {{ $file->created_at->format('M d, Y H:i') }}</p>
        </div>

        @if (!$file->order?->user_id)
            <p>The file is attached to this email.</p>
        @else
            <a href="{{ route('orders.show', $file->order) }}" class="btn">
                🔍 View Order & Download
            </a>
        @endif

        <div class="footer">
            &copy; {{ date('Y') }} WeWriteForYou
        </div>
    </div>
</body>

</html>
