<div class="container mx-auto px-6 py-20">
    <!-- Hero -->
    <h1 class="text-5xl font-extrabold text-primary mb-6 text-center">
        About BullWrite
    </h1>
    <p class="text-lg text-gray-600 max-w-3xl mx-auto text-center mb-16 leading-relaxed">
        BullWrite is an academic editing and feedback service dedicated to helping students
        enhance the quality, clarity, and originality of their writing.
        Our mission is simple – to support learning, not replace it.
    </p>

    <!-- Why Choose Us -->
    <div class="grid md:grid-cols-3 gap-10 mb-20">
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4">🔒</div>
            <h3 class="text-xl font-bold mb-2">Confidential & Secure</h3>
            <p class="text-gray-600">
                Your documents and personal data are fully protected.
                We comply with GDPR and guarantee total privacy in every interaction.
            </p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4">✅</div>
            <h3 class="text-xl font-bold mb-2">Quality Feedback</h3>
            <p class="text-gray-600">
                Every document is reviewed by qualified UK academic editors who provide
                constructive, actionable comments to help you improve your writing.
            </p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition text-center">
            <div class="text-5xl mb-4">⏱️</div>
            <h3 class="text-xl font-bold mb-2">Fast Turnaround</h3>
            <p class="text-gray-600">
                Deadlines matter — we deliver expert feedback within your chosen timeframe,
                from 12 hours to 7 days.
            </p>
        </div>
    </div>

    <!-- Team / Qualifications -->
    <h2 class="text-3xl font-bold text-center mb-10">Our Team & Expertise</h2>
    <div class="grid md:grid-cols-2 gap-12 mb-20">
        <div class="bg-gray-50 p-8 rounded-xl shadow">
            <h3 class="text-xl font-semibold mb-2">Experienced Editors</h3>
            <p class="text-gray-600">
                Our editors are UK graduates and educators with backgrounds in academic research, linguistics,
                and higher education. They know what universities expect — and how to guide you there.
            </p>
        </div>
        <div class="bg-gray-50 p-8 rounded-xl shadow">
            <h3 class="text-xl font-semibold mb-2">Student-Focused Approach</h3>
            <p class="text-gray-600">
                We work alongside students, offering ethical academic support, writing advice, and detailed
                editing designed to boost learning outcomes and writing confidence.
            </p>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center">
        <a href="{{ route('rights') }}"
            class="bg-gold text-black px-6 sm:px-8 py-3 sm:py-4
              rounded-lg font-bold text-base sm:text-lg
              shadow hover:bg-secondary hover:text-white
              transition cursor-pointer
              block max-w-[90%] mx-auto whitespace-normal text-center leading-snug">
            Read About Our Ethics & Your Rights
        </a>
    </div>
</div>


@php
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'BullWrite Academic Editing',
        'url' => url('/'),
        'logo' => asset('images/logo.jpg'),
        'description' =>
            'Academic editing and feedback service helping students improve writing quality, structure, and originality.',
        'foundingDate' => '2023',
        'sameAs' => ['https://www.instagram.com/bull.write/', 'https://www.tiktok.com/@bullwrite'],
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'BG',
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>


<script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>
