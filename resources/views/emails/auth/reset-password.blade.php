<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset - WeWriteForYou</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f9fafb; margin: 0; padding: 40px;">

    <div
        style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">

        <!-- Header -->
        <div style="text-align: center; margin-bottom: 30px;">
            <h1 style="font-size: 24px; font-weight: bold; color: #111827; margin: 0;">
                WeWrite<span style="color: #f59e0b;">ForYou</span>
            </h1>
        </div>

        <!-- Greeting -->
        <h2 style="font-size: 20px; font-weight: bold; color: #1f2937;">Hello, {{ $user->name ?? 'Student' }} 👋</h2>

        <p style="color: #374151; font-size: 15px; line-height: 1.6;">
            We received a request to reset your password for your <strong>WeWriteForYou</strong> account.
        </p>

        <!-- CTA Button -->
        <p style="text-align: center; margin: 30px 0;">
            <a href="{{ $url }}"
                style="background: #f59e0b; color: #fff; padding: 14px 24px; border-radius: 8px; font-size: 16px; font-weight: bold; text-decoration: none;">
                Reset My Password
            </a>
        </p>

        <p style="color: #374151; font-size: 15px; line-height: 1.6;">
            This password reset link will expire in <strong>60 minutes</strong>.
        </p>

        <p style="color: #6b7280; font-size: 14px; line-height: 1.6;">
            If you did not request a password reset, you can safely ignore this email. No changes will be made to your
            account.
        </p>

        <!-- Divider -->
        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 30px 0;">

        <!-- Footer -->
        <p style="font-size: 12px; color: #9ca3af; text-align: center;">
            © {{ date('Y') }} WeWriteForYou. All rights reserved.
        </p>
    </div>

</body>

</html>
