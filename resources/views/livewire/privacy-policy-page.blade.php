<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-6 text-center">🔐 Privacy Policy</h1>
    <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
        This Privacy Policy explains how <span class="font-semibold text-primary">WeWriteForYou</span> collects,
        stores, and protects your personal data in compliance with <strong>GDPR</strong> and <strong>UK law</strong>.
    </p>

    <div class="space-y-12 max-w-4xl mx-auto text-gray-700 leading-relaxed">

        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">1. Data We Collect</h2>
            <p>
                We may collect your <strong>name, email, IP address, order details, and payment information</strong>.
                Payments are securely processed via <strong>Stripe</strong>; we do not store your card details.
            </p>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">2. Why We Collect Data</h2>
            <p>
                Data is collected to <em>process orders, provide support, handle payments, and improve our
                    services</em>.
            </p>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">3. Data Storage</h2>
            <p>
                Your data is stored on secure servers located in the <strong>UK & EU</strong>. Payment data is
                handled directly by Stripe under PCI DSS compliance.
            </p>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">4. Data Retention</h2>
            <p>
                We keep order records for up to <strong>6 years</strong> for legal and tax purposes.
                Emails and messages are retained as long as needed for customer support.
            </p>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-primary mb-3">5. Your Rights</h2>
            <ul class="list-disc list-inside">
                <li>Request a copy of your data</li>
                <li>Request correction or deletion</li>
                <li>Withdraw consent at any time</li>
                <li>Lodge a complaint with the ICO (UK Information Commissioner’s Office)</li>
            </ul>
        </div>
    </div>

    <div class="mt-16 text-center">
        <a href="{{ route('contact') }}" wire:navigate
            class="inline-block bg-gold text-black px-8 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition">
            📩 Contact Us
        </a>
        <p class="mt-2 text-gray-500 text-sm">Questions about privacy? Reach out anytime.</p>
    </div>
</div>
