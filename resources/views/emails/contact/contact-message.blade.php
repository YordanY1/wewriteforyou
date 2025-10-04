<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 30px;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info strong {
            display: inline-block;
            width: 80px;
            color: #555;
        }

        .message {
            background: #f4f6f8;
            padding: 15px;
            border-radius: 6px;
            line-height: 1.6;
            font-size: 15px;
            white-space: pre-line;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2>📩 New Contact Form Message</h2>

        <div class="info">
            <strong>Name:</strong> {{ $name }}
        </div>
        <div class="info">
            <strong>Email:</strong> {{ $email }}
        </div>

        <div class="info">
            <strong>Message:</strong>
        </div>
        <div class="message">
            {{ $messageText }}
        </div>

        <div class="footer">
            This message was sent via the <strong>WeWriteForYou</strong> website contact form.
        </div>
    </div>
</body>

</html>
