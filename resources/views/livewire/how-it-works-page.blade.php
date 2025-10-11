<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-16 text-center">
        How BullWrite Helps You Improve Your Writing
    </h1>

    <div class="space-y-24">

        <!-- Step 1 -->
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div
                class="flex-shrink-0 w-28 h-28 flex items-center justify-center rounded-full bg-primary text-white text-5xl shadow-xl">
                📝
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Step 1: Upload Your Draft or Topic</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    Share your document or topic details through our secure form.
                    Include any instructions or notes you’d like our editors to focus on — structure, grammar, clarity,
                    or argument flow.
                </p>
                <p class="text-gray-600 mt-2">
                    The more context you give, the more tailored and actionable your feedback will be.
                </p>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="flex flex-col md:flex-row-reverse items-center gap-12">
            <div
                class="flex-shrink-0 w-28 h-28 flex items-center justify-center rounded-full bg-secondary text-white text-5xl shadow-xl">
                💳
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Step 2: Confirm Your Plan</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    Select your preferred turnaround time — from 5–7 days to express 24-hour review — and pay securely
                    via Stripe or Apple Pay.
                </p>
                <p class="text-gray-600 mt-2">
                    Once confirmed, your document is assigned to a qualified UK academic editor for professional review.
                </p>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div
                class="flex-shrink-0 w-28 h-28 flex items-center justify-center rounded-full bg-gold text-black text-5xl shadow-xl">
                👨‍💻
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Step 3: Receive Expert Feedback</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    Our editor carefully reviews your work, adding detailed comments and suggestions to strengthen your
                    writing, structure, and academic tone.
                </p>
                <p class="text-gray-600 mt-2">
                    You’ll receive a marked-up version of your document, showing exactly what was improved and why.
                </p>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="flex flex-col md:flex-row-reverse items-center gap-12">
            <div
                class="flex-shrink-0 w-28 h-28 flex items-center justify-center rounded-full bg-dark text-white text-5xl shadow-xl">
                📦
            </div>
            <div>
                <h2 class="text-3xl font-bold mb-4">Step 4: Review & Apply Changes</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    Once feedback is ready, you’ll receive an email notification.
                    Log in to download your edited document and apply the recommended improvements before submission.
                </p>
                <p class="text-gray-600 mt-2">
                    BullWrite feedback helps you grow as a writer — every edit is an opportunity to learn.
                </p>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-24">
        <a href="{{ route('pricing') }}" wire:navigate
            class="bg-gold text-black px-10 py-4 rounded-lg font-bold text-lg shadow-lg hover:bg-secondary hover:text-white transition cursor-pointer">
            View Plans & Start Improving
        </a>
        <p class="mt-4 text-gray-500">Transparent pricing – no hidden fees.</p>
    </div>
</div>
