<div class="container mx-auto px-6 py-20">
    <!-- Hero -->
    <h1 class="text-5xl font-extrabold text-primary mb-6 text-center">
        Your Rights as a BullWrite Client
    </h1>
    <p class="text-lg text-gray-600 max-w-3xl mx-auto text-center mb-16 leading-relaxed">
        Transparency, fairness, and trust guide everything we do.
        As a BullWrite client, you’re protected by clear, ethical, and student-friendly policies.
    </p>

    <!-- Rights Cards -->
    <div class="grid md:grid-cols-3 gap-10 mb-20">
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4 text-green-600">💰</div>
            <h3 class="text-xl font-bold mb-2">Fair Refund Policy</h3>
            <p class="text-gray-600">
                If feedback or editing services are not delivered according to the agreed plan,
                clients may qualify for a full or partial refund under our fair-use policy.
            </p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4 text-blue-600">📜</div>
            <h3 class="text-xl font-bold mb-2">Transparent Terms</h3>
            <p class="text-gray-600">
                Our Terms & Conditions are written in plain English.
                No hidden fees, no fine print — just clarity and accountability.
            </p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4 text-purple-600">🔒</div>
            <h3 class="text-xl font-bold mb-2">Confidentiality & Data Protection</h3>
            <p class="text-gray-600">
                Your identity and documents are 100% private.
                We use end-to-end encryption and comply fully with GDPR.
            </p>
        </div>
    </div>

    <!-- Extended Rights -->
    <h2 class="text-3xl font-bold text-center mb-10">Our Quality Commitments</h2>
    <div class="grid md:grid-cols-2 gap-12 mb-20">
        <div class="bg-gray-50 p-8 rounded-xl shadow">
            <h3 class="text-xl font-semibold mb-2">Professional Feedback Guarantee</h3>
            <p class="text-gray-600">
                Each document is reviewed by qualified academic editors who ensure your text receives
                detailed, constructive, and actionable feedback — never automated or AI-generated.
            </p>
        </div>

        <div class="bg-gray-50 p-8 rounded-xl shadow">
            <h3 class="text-xl font-semibold mb-2">Timely Delivery</h3>
            <p class="text-gray-600">
                We honour every deadline.
                If a delay occurs due to unforeseen circumstances, we’ll notify you immediately
                and offer compensation or rescheduling options.
            </p>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center">
        <a href="{{ route('contact') }}" wire:navigate
            class="bg-gold text-black px-8 py-4 rounded-lg font-bold text-lg shadow hover:bg-secondary hover:text-white transition cursor-pointer">
            Contact Our Support Team
        </a>
    </div>
</div>


@php
    $policySchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'BullWrite Academic Editing',
        'url' => url('/rights'),
        'description' =>
            'BullWrite ensures transparency, confidentiality, and fair refund policies for academic editing clients in the UK.',
        'hasPolicy' => [
            '@type' => 'Policy',
            'policyCategory' => 'Refund & Confidentiality',
            'policyOverview' =>
                'Clients are protected by transparent refund, confidentiality, and delivery policies compliant with GDPR.',
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($policySchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>
