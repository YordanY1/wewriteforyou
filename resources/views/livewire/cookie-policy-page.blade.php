<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-6 text-center">🍪 Cookie Policy</h1>
    <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto leading-relaxed">
        This Cookie Policy explains how <span class="font-semibold text-primary">BullWrite</span>
        uses cookies to ensure our website functions correctly, remains secure,
        and delivers a smooth, personalised browsing experience.
    </p>

    <div class="space-y-12 max-w-4xl mx-auto text-gray-700 leading-relaxed">
        <!-- Section 1 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">1. What Are Cookies?</h2>
            <p>
                Cookies are small text files stored on your device when you visit a website.
                They help websites remember your preferences, enhance performance,
                and ensure certain features (like logins or preferences) work properly.
            </p>
        </div>

        <!-- Section 2 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">2. Types of Cookies We Use</h2>
            <ul class="list-disc list-inside">
                <li>
                    <strong>Essential Cookies:</strong>
                    Necessary for the basic functionality and security of the site, such as remembering your session or
                    cookie preferences.
                </li>
                <li>
                    <strong>Functional Cookies:</strong>
                    Enable additional features like remembering your language or display settings for a more
                    personalised experience.
                </li>
                <li>
                    <strong>Analytics Cookies:</strong>
                    Help us understand how visitors interact with our website (for example, which pages are most
                    visited) using tools like <em>Google Analytics</em>.
                </li>
                <li>
                    <strong>Performance Cookies:</strong>
                    Allow us to improve website speed, content delivery, and user experience based on anonymous usage
                    patterns.
                </li>
            </ul>
        </div>

        <!-- Section 3 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">3. Managing Cookies</h2>
            <p>
                You can manage or disable cookies in your browser settings at any time.
                Please note that disabling essential cookies may affect the functionality of certain parts of our
                website.
            </p>
            <p class="mt-3">
                To learn more about managing cookies, visit
                <a href="https://www.aboutcookies.org" target="_blank" rel="noopener noreferrer"
                    class="text-primary underline hover:text-gold">
                    www.aboutcookies.org
                </a>.
            </p>
        </div>

        <!-- Section 4 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">4. Updates to This Policy</h2>
            <p>
                We may update this Cookie Policy from time to time to reflect changes in technology or legal
                requirements.
                The latest version will always be available on this page.
            </p>
        </div>
    </div>
</div>

@php
    $cookieSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => 'BullWrite Academic Editing',
        'url' => url('/'),
        'description' =>
            'BullWrite uses essential and functional cookies to improve user experience, website security, and performance analytics.',
        'hasPart' => [
            '@type' => 'WebPage',
            'name' => 'Cookie Policy',
            'url' => url('/cookie-policy'),
            'dateModified' => now()->toDateString(),
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($cookieSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>
