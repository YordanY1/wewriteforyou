<div class="container mx-auto px-6 py-20">
    <!-- Hero -->
    <h1 class="text-5xl font-extrabold text-primary mb-6 text-center">
        💰 Refunds & Revisions Policy
    </h1>
    <p class="text-center text-gray-600 mb-12 max-w-3xl mx-auto">
        Last Updated: <strong>18 October 2025</strong><br>
        This policy explains when you may request a refund or revision for services purchased
        from <span class="font-semibold text-primary">BullWrite Ltd</span>.
    </p>

    <div class="space-y-12 max-w-4xl mx-auto text-gray-700 leading-relaxed">

        <!-- 1. Nature of Services -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">1. Nature of Services</h2>
            <p>
                BullWrite provides custom digital academic materials, including editing, feedback, and model essays.
                Due to the personalised nature of these services, refunds are <strong>not automatic once work
                    begins</strong>.
                Deliverables may be submitted as your own work at your discretion.
                BullWrite is not responsible for academic outcomes or results.
            </p>
        </div>

        <!-- 2. Refunds -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">2. Refunds</h2>
            <p class="mb-2">Refunds are available only in the following cases:</p>
            <ul class="list-disc ml-6 space-y-2">
                <li><strong>Before work begins:</strong> Full refund if you cancel before production starts.</li>
                <li><strong>Non-delivery:</strong> Full refund if we are unable to complete your order.</li>
                <li><strong>Late delivery:</strong> Partial or full refund if work is not delivered by the agreed date.
                </li>
            </ul>

            <p class="mt-4 mb-2">Refunds are <strong>not provided</strong> for:</p>
            <ul class="list-disc ml-6 space-y-2">
                <li>Changes to instructions after work has begun.</li>
                <li>Dissatisfaction with academic results or grades.</li>
                <li>Submission or use of delivered materials.</li>
            </ul>

            <p class="mt-4">
                All refund requests must be made in writing to
                <a href="mailto:support@bullwrite.com" class="text-primary hover:underline">support@bullwrite.com</a>
                within <strong>7 days of delivery</strong>.
            </p>
        </div>

        <!-- 3. Revisions -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">3. Revisions</h2>
            <ul class="list-disc ml-6 space-y-2">
                <li>Revision requests must be submitted within <strong>7 days</strong> of delivery.</li>
                <li>Free revisions apply only to the original project instructions.</li>
                <li>Major rewrites, new content, or significant scope changes may incur additional fees.</li>
            </ul>
        </div>

        <!-- 4. Refund Method -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">4. Refund Method</h2>
            <p>
                Approved refunds are issued via the original payment method within
                <strong>10 business days</strong>.
                Please note that <strong>third-party processor fees (e.g., Stripe, PayPal)</strong> may be deducted
                from the refund amount.
            </p>
        </div>

        <!-- 5. Academic Responsibility -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">5. Academic Responsibility</h2>
            <p>
                All deliverables are intended for personal learning and reference.
                Clients may submit them as their own work at their discretion.
                BullWrite bears no responsibility for any academic, disciplinary, or legal outcomes
                resulting from the use of provided materials.
            </p>
        </div>

        <!-- 6. Fraud and Misuse -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">6. Fraud and Misuse</h2>
            <ul class="list-disc ml-6 space-y-2">
                <li>No refund will be granted if you initiate a chargeback after receiving the deliverables.</li>
                <li>Deliverables used commercially or resold violate our Terms & Conditions.</li>
                <li>BullWrite reserves the right to suspend accounts or pursue legal recovery in cases of fraud or
                    misuse.</li>
            </ul>
        </div>

        <!-- 7. Contact -->
        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">7. Contact</h2>
            <p>
                For refund or revision requests, email
                <a href="mailto:support@bullwrite.com" class="text-primary hover:underline">support@bullwrite.com</a>
                and include:
            </p>
            <ul class="list-disc ml-6 space-y-2 mt-2">
                <li>Your <strong>Order ID</strong></li>
                <li>Date of purchase</li>
                <li>Clear description of your issue or request</li>
            </ul>
        </div>
    </div>

    <!-- CTA -->
    <div class="mt-16 text-center">
        <a href="{{ route('contact') }}" wire:navigate
            class="inline-block bg-gold text-black px-8 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition">
            📩 Contact Our Support Team
        </a>
        <p class="mt-2 text-gray-500 text-sm">
            Questions about refunds or revisions? We’ll respond within 24 hours.
        </p>
    </div>
</div>

@php
    $refundSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ReturnPolicy',
        'name' => 'BullWrite Refund & Revisions Policy',
        'url' => url()->current(),
        'description' =>
            'BullWrite refund, revision, and delivery policy for academic editing and writing services. Updated 18 Oct 2025.',
        'inLanguage' => 'en-GB',
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'BullWrite Ltd',
            'url' => url('/'),
            'logo' => asset('images/logo.jpg'),
        ],
        'returnPolicyCategory' => 'Refund',
        'returnFees' => 'FreeReturn',
        'merchantReturnDays' => 7,
        'returnMethod' => 'ReturnByMail',
        'refundType' => 'MoneyRefund',
        'applicableCountry' => 'GB',
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($refundSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
