<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-6 text-center">🔐 Privacy Policy</h1>
    <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
        This Privacy Policy explains how <span class="font-semibold text-primary">BullWrite</span>
        collects, uses, and protects personal information in full compliance with
        <strong>UK Data Protection Act</strong> and <strong>GDPR</strong>.
    </p>

    <div class="space-y-12 max-w-4xl mx-auto text-gray-700 leading-relaxed">
        <!-- Section 1 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">1. Information We Collect</h2>
            <p>
                We may collect your <strong>name, email address, IP address, uploaded documents, and payment
                    details</strong>.
                All payments are securely processed by <strong>Stripe</strong>; BullWrite does not store card details.
            </p>
        </div>

        <!-- Section 2 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">2. Why We Collect Information</h2>
            <p>
                We use your data to <em>process orders, deliver digital editing and feedback services,
                    communicate with users, and enhance platform performance</em>.
            </p>
        </div>

        <!-- Section 3 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">3. Data Security & Storage</h2>
            <p>
                Your data is securely stored on encrypted servers located within the
                <strong>UK and EU</strong>. BullWrite follows industry-standard security measures including
                <strong>SSL encryption</strong> and regular audits.
            </p>
        </div>

        <!-- Section 4 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">4. Data Retention</h2>
            <p>
                BullWrite retains essential order data for up to <strong>6 years</strong> to comply with
                legal and tax obligations. Non-essential communications may be deleted earlier upon request.
            </p>
        </div>

        <!-- Section 5 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">5. Your Rights</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Request a copy of your data</li>
                <li>Request correction or deletion of your information</li>
                <li>Withdraw consent for data processing at any time</li>
                <li>Submit a complaint to the <strong>ICO (UK Information Commissioner’s Office)</strong></li>
            </ul>
        </div>

        <!-- Section 6 -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">6. Cookies & Tracking</h2>
            <p>
                We use essential, functional, and analytical cookies to improve usability.
                You can manage cookie preferences in your browser or visit our
                <a href="{{ route('cookie.policy') }}" class="text-primary hover:underline">Cookie Policy</a>.
            </p>
        </div>
    </div>

    <div class="mt-16 text-center">
        <a href="{{ route('contact') }}" wire:navigate
            class="inline-block bg-gold text-black px-8 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition">
            📩 Contact Us
        </a>
        <p class="mt-2 text-gray-500 text-sm">
            Have privacy questions? Our UK support team replies within 24 hours.
        </p>
    </div>
</div>

@php
    $privacySchema = [
        '@context' => 'https://schema.org',
        '@type' => 'PrivacyPolicy',
        'name' => 'BullWrite Privacy Policy',
        'url' => url()->current(),
        'description' =>
            "BullWrite's official privacy policy outlining GDPR-compliant data collection, usage, and protection for UK users.",
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'BullWrite Academic Editing',
            'url' => url('/'),
            'logo' => asset('images/logo.png'),
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($privacySchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>
