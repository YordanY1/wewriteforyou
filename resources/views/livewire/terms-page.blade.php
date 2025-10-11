<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-6 text-center">📜 Terms & Conditions</h1>
    <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
        Please read these Terms & Conditions carefully before using our platform.
        By accessing <span class="font-semibold text-primary">BullWrite</span>, you agree to the following terms.
    </p>

    <div class="space-y-12 max-w-4xl mx-auto text-gray-700 leading-relaxed">

        <!-- 1. Introduction -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">1. Introduction</h2>
            <p>
                By using <strong>BullWrite</strong>, you agree to these Terms & Conditions.
                If you do not agree, please discontinue use of our website and services.
            </p>
        </div>

        <!-- 2. Services -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">2. Services</h2>
            <p>
                BullWrite provides <strong>digital editing, proofreading, and academic feedback</strong> solutions.
                All materials are delivered for <em>learning, improvement, and reference purposes only</em>.
                Users are solely responsible for how they apply the received feedback or materials.
            </p>
        </div>

        <!-- 3. Orders & Payments -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">3. Orders & Payments</h2>
            <p>
                All services require upfront payment through secure gateways such as
                <strong>Stripe</strong> and <strong>Apple Pay</strong>.
                An order is confirmed only once payment has been successfully processed.
            </p>
        </div>

        <!-- 4. Revisions -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">4. Revisions</h2>
            <p>
                Clients may request <strong>one free revision</strong> within 7 days of delivery.
                Additional revisions or substantial changes may incur extra charges.
            </p>
        </div>

        <!-- 5. Refunds -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">5. Refunds</h2>
            <p>
                Refunds may be issued if the delivered service does not meet the confirmed brief.
                Once a project is completed and delivered, refunds are provided at the company’s discretion.
            </p>
        </div>

        <!-- 6. Confidentiality -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">6. Confidentiality</h2>
            <p>
                All uploaded documents, personal data, and correspondence are kept strictly confidential.
                BullWrite never shares or sells user data to third parties.
            </p>
        </div>

        <!-- 7. Liability -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">7. Limitation of Liability</h2>
            <p>
                BullWrite is not responsible for any academic, financial, or professional outcomes
                resulting from the use or misuse of our services. Users accept full responsibility
                for their academic submissions and compliance with institutional policies.
            </p>
        </div>

        <!-- 8. Governing Law -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3 flex items-center gap-2">8. Governing Law</h2>
            <p>
                These Terms & Conditions are governed by <strong>UK law</strong>.
                Any disputes shall be handled under the jurisdiction of the courts of England and Wales.
            </p>
        </div>
    </div>

    <!-- CTA -->
    <div class="mt-16 text-center">
        <a href="{{ route('contact') }}" wire:navigate
            class="inline-block bg-gold text-black px-8 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition">
            📩 Contact Us
        </a>
        <p class="mt-2 text-gray-500 text-sm">Questions about our Terms? We’ll respond within 24 hours.</p>
    </div>
</div>

@php
    $termsSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'TermsOfService',
        'name' => 'BullWrite Terms & Conditions',
        'url' => url()->current(),
        'description' =>
            'Official BullWrite Terms & Conditions for digital editing, proofreading, and feedback services in the UK.',
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'BullWrite Academic Editing',
            'url' => url('/'),
            'logo' => asset('images/logo.png'),
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($termsSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>
