<section class="py-20 bg-gray-50" x-data="orderForm({{ Auth::check() ? 'true' : 'false' }})">

    <div class="container mx-auto px-6 max-w-3xl bg-white rounded-xl shadow-lg p-10">
        <h2 class="text-3xl font-extrabold text-primary mb-8 text-center">Place Your Order</h2>

        <!-- Step indicators -->
        <div class="flex justify-between mb-10">
            <template x-for="i in 3">
                <div class="flex-1 flex items-center">
                    <div class="relative flex items-center justify-center w-10 h-10 rounded-full"
                        :class="step >= i ? 'bg-primary text-white' : 'bg-gray-200 text-gray-500'">
                        <span x-text="i"></span>
                    </div>
                    <div class="flex-1 h-1" :class="i < 3 ? (step > i ? 'bg-primary' : 'bg-gray-200') : ''"></div>
                </div>
            </template>
        </div>

        <!-- Form -->
        <form wire:submit.prevent="submitOrder" class="space-y-8">

            <!-- STEP 1: Basic Details -->
            <div x-show="step === 1" x-transition>
                <div class="space-y-6">

                    <!-- Email -->
                    @if (!Auth::check())
                        <div x-data="{ val: @entangle('email') }">
                            <label class="block font-semibold mb-2">
                                Your Email
                                <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                            </label>
                            <input type="text" wire:model.live="email" x-model="val"
                                class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <!-- Assignment Type -->
                    <div x-data="{ val: @entangle('assignment_type_id') }">
                        <label class="block font-semibold mb-2">
                            Assignment Type
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <select wire:model.live="assignment_type_id" x-model="val"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="">-- Select Assignment Type --</option>
                            @foreach ($assignmentTypes->whereNull('parent_id') as $parent)
                                <optgroup label="{{ $parent->name }}">
                                    @foreach ($assignmentTypes->where('parent_id', $parent->id) as $child)
                                        <option value="{{ $child->id }}">— {{ $child->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('assignment_type_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Service -->
                    <div x-data="{ val: @entangle('service_id') }">
                        <label class="block font-semibold mb-2">
                            Service
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <select wire:model.live="service_id" x-model="val"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="">-- Select Service --</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Academic Level -->
                    <div x-data="{ val: @entangle('academic_level_id') }">
                        <label class="block font-semibold mb-2">
                            Academic Level
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <select wire:model.live="academic_level_id" x-model="val"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="">-- Select Level --</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('academic_level_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div x-data="{ val: @entangle('subject_id') }">
                        <label class="block font-semibold mb-2">
                            Subject
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <select wire:model.live="subject_id" x-model="val"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="">-- Select Subject --</option>

                            @foreach ($subjects as $category)
                                <optgroup label="{{ $category->emoji }} {{ $category->name }}">
                                    @foreach ($category->children as $sub)
                                        <option value="{{ $sub->id }}">— {{ $sub->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Language -->
                    <div x-data="{ val: @entangle('language_id') }">
                        <label class="block font-semibold mb-2">
                            Language
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <select wire:model.live="language_id" x-model="val"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Style -->
                    <div x-data="{ val: @entangle('style_id') }">
                        <label class="block font-semibold mb-2">
                            Citation Style
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <select wire:model.live="style_id" x-model="val"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="">-- None --</option>
                            @foreach ($styles as $style)
                                <option value="{{ $style->id }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                        @error('style_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Topic -->
                    <div x-data="{ val: @entangle('topic') }">
                        <label class="block font-semibold mb-2">
                            Topic / Title
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <input type="text" wire:model.live="topic" x-model="val"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                        @error('topic')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Word Count -->
                    <div x-data="{ val: @entangle('words') }">
                        <label class="block font-semibold mb-2">
                            Word Count
                            <span :class="!val ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>
                        <input type="number" inputmode="numeric" pattern="[0-9]*" wire:model.live="words"
                            x-model="val" class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                        <p class="text-sm text-gray-500">
                            Enter the number of words (digits only).<br>
                            1 page ≈ 275 words. <span class="text-primary font-semibold">Minimum: 275 words</span>.
                        </p>
                        @error('words')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="text-right mt-8">
                    <button type="button" @click="if (step1Valid) step = 2" :disabled="!step1Valid"
                        :class="step1Valid
                            ?
                            'bg-gold hover:bg-secondary hover:text-white' :
                            'bg-gray-300 opacity-70 cursor-not-allowed'"
                        class="px-6 py-3 rounded-lg font-bold text-black transition">
                        Next →
                    </button>
                </div>
            </div>

            <!-- STEP 2: Deadline + Addons -->
            <div x-show="step === 2" x-transition>
                <div class="space-y-6">
                    <!-- Deadline -->
                    <div>
                        <label class="block font-semibold mb-2">Deadline</label>
                        <select wire:model.live="deadline_option"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="7d">7 days</option>
                            <option value="3d">3 days</option>
                            <option value="2d">2 days</option>
                            <option value="24h">24 hours</option>
                            <option value="12h">12 hours</option>
                        </select>
                        @error('deadline_option')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Add-ons -->
                    <div>
                        <label class="block font-semibold mb-2">Add-ons</label>
                        <div class="space-y-2">
                            @foreach ($addons as $addon)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" wire:model.live="selectedAddons"
                                        value="{{ $addon->id }}"
                                        class="rounded border-gray-300 text-primary focus:ring-primary">
                                    <span>{{ $addon->name }} (+£{{ $addon->price }})</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="bg-gray-100 p-4 rounded-lg text-center text-lg font-bold text-primary relative">
                        <div wire:loading wire:target="words,deadline_option,selectedAddons"
                            class="absolute inset-0 flex items-center justify-center bg-gray-100 bg-opacity-80">
                            <span class="animate-pulse text-gray-600">Calculating...</span>
                        </div>
                        Estimated Price: £{{ $finalPrice }}
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    <button type="button" @click="step = 1"
                        class="bg-gray-200 px-6 py-3 rounded-lg font-bold hover:bg-gray-300">← Back</button>
                    <button type="button" @click="step = 3"
                        class="bg-gold text-black px-6 py-3 rounded-lg font-bold hover:bg-secondary hover:text-white">
                        Next →
                    </button>
                </div>
            </div>

            <!-- STEP 3: Instructions + Files + Summary -->
            <div x-show="step === 3" x-transition>
                <div class="space-y-6">
                    <!-- Instructions -->
                    <div wire:ignore x-data="{ hasText: false }" x-init="() => {
                        const quill = new Quill($refs.quillEditor, {
                            theme: 'snow',
                            placeholder: 'Type your instructions here...',
                            modules: {
                                toolbar: [
                                    [{ header: [1, 2, false] }],
                                    ['bold', 'italic', 'underline'],
                                    ['link', 'blockquote', 'code-block', 'image'],
                                    [{ list: 'ordered' }, { list: 'bullet' }],
                                ],
                            },
                        });

                        quill.on('text-change', function() {
                            const html = quill.root.innerHTML;
                            $refs.instructions.value = html;
                            $wire.set('instructions', html);
                            const plain = quill.getText().trim();
                            hasText = plain.length > 5;
                        });
                    }">
                        <label class="block font-semibold mb-2">
                            Instructions
                            <span :class="!hasText ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>

                        <!-- Quill container -->
                        <div x-ref="quillEditor" class="h-40 border rounded-lg"></div>

                        <!-- hidden input -->
                        <input type="hidden" x-ref="instructions" wire:model="instructions">

                        @error('instructions')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Files -->
                    <div x-data="{ isDropping: false, hasFiles: @entangle('files').length > 0 }" x-effect="hasFiles = @entangle('files').length > 0"
                        x-on:dragover.prevent="isDropping = true" x-on:dragleave.prevent="isDropping = false"
                        x-on:drop.prevent="
            isDropping = false;
            $refs.fileInput.files = $event.dataTransfer.files;
            $refs.fileInput.dispatchEvent(new Event('input', { bubbles: true }));
         "
                        class="w-full">
                        <label class="block font-semibold mb-2">
                            Upload Files
                            <span :class="!hasFiles ? 'required-glow' : 'text-gold'" class="ml-1">*</span>
                        </label>

                        <!-- Dropzone -->
                        <div class="flex flex-col items-center justify-center w-full p-6 border-2 border-dashed rounded-lg cursor-pointer transition bg-gray-50 hover:bg-gray-100"
                            :class="isDropping ? 'border-primary bg-primary/10' : 'border-gray-300'"
                            @click="$refs.fileInput.click()">
                            <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16a4 4 0 01-.88-7.903A5.977 5.977 0 0112 4c2.485 0 4.644 1.518 5.475 3.688A4.002 4.002 0 0118 16H7z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 16v6m0-6l-2 2m2-2l2 2m10-2v6m0-6l-2 2m2-2l2 2" />
                            </svg>
                            <p class="text-gray-600 font-medium">Drag & drop files here</p>
                            <p class="text-sm text-gray-500">or click to select (max 150MB)</p>
                        </div>

                        <!-- Hidden input -->
                        <input type="file" wire:model="files" multiple x-ref="fileInput" class="hidden">

                        @error('files.*')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                        <!-- Preview -->
                        <div class="mt-4 space-y-2" wire:loading.remove wire:target="files">
                            @if ($files)
                                @foreach ($files as $index => $file)
                                    <div
                                        class="flex items-center justify-between p-2 bg-gray-100 rounded-lg text-sm text-gray-700 group">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002
                        2h12a2 2 0 002-2V7.414A2 2 0
                        0017.414 6L13 1.586A2 2 0
                        0011.586 1H4zm8 7a1 1 0
                        11-2 0 1 1 0 012 0z" />
                                            </svg>
                                            <span
                                                class="truncate max-w-[200px]">{{ $file->getClientOriginalName() }}</span>
                                        </div>

                                        <!-- Remove button -->
                                        <button type="button" wire:click="removeFile({{ $index }})"
                                            class="ml-2 text-gray-400 hover:text-red-500 transition-opacity opacity-0 group-hover:opacity-100"
                                            title="Remove file">
                                            ✕
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div wire:loading wire:target="files" class="text-sm text-gray-500 mt-2">
                            Uploading...
                        </div>
                    </div>



                    <!-- Summary -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                        <h3 class="text-xl font-bold text-primary mb-4">Order Summary</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li><strong>Email:</strong> {{ $email ?? '' }}</li>
                            <li><strong>Assignment Type:</strong>
                                {{ optional($assignmentTypes->find($assignment_type_id))->name }}</li>
                            <li><strong>Service:</strong> {{ optional($services->find($service_id))->name }}</li>
                            <li><strong>Academic Level:</strong>
                                {{ optional($levels->find($academic_level_id))->name }}</li>
                            <li><strong>Subject:</strong> {{ optional($subjects->find($subject_id))->name }}</li>
                            <li><strong>Language:</strong> {{ optional($languages->find($language_id))->name }}</li>
                            <li><strong>Style:</strong> {{ optional($styles->find($style_id))->name ?? 'None' }}</li>
                            <li><strong>Topic:</strong> {{ $topic ?? '' }}</li>
                            <li><strong>Word Count:</strong> {{ $wordsInt }} words
                                (~{{ ceil($wordsInt / 275) }} pages)</li>
                            <li><strong>Deadline:</strong> {{ $deadline_option ?? '' }}</li>
                            <li><strong>Add-ons:</strong>
                                @if (!empty($selectedAddons))
                                    <ul class="ml-4 list-disc">
                                        @foreach ($addons->whereIn('id', $selectedAddons) as $addon)
                                            <li>{{ $addon->name }} (+£{{ $addon->price }})</li>
                                        @endforeach
                                    </ul>
                                @else
                                    None
                                @endif
                            </li>
                        </ul>
                        <div class="text-lg font-bold text-primary mt-4 relative">
                            <div wire:loading wire:target="words,deadline_option,selectedAddons"
                                class="absolute inset-0 flex items-center justify-center bg-gray-100 bg-opacity-80">
                                <span class="animate-pulse text-gray-600">Calculating...</span>
                            </div>
                            Final Price: £{{ $finalPrice }}
                        </div>
                    </div>
                </div>

                @guest
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <h3 class="text-lg font-bold text-blue-800 mb-2">Why create an account? 🤔</h3>
                        <ul class="space-y-1 text-blue-700 text-sm">
                            <li>✔ Track all your orders in one place</li>
                            <li>✔ Chat directly with your writer / support team</li>
                            <li>✔ Get notified about updates & revisions</li>
                            <li>✔ Access invoices & payment history anytime</li>
                            <li>✔ Faster checkout for future orders</li>
                            <li>✔ Download your orders easy</li>
                        </ul>

                        <div class="mt-4">
                            <a href="{{ route('register') }}"
                                class="inline-block bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary/80 transition">
                                👉 Create your free account
                            </a>
                        </div>
                    </div>
                @endguest

                <!-- Terms Acceptance -->
                <div class="mt-6 border-t pt-4">
                    <label class="flex items-start space-x-3">
                        <input type="checkbox" wire:model="accepted_terms"
                            class="mt-1 h-5 w-5 text-primary rounded border-gray-300 focus:ring-primary">
                        <span class="text-sm text-gray-700 leading-snug">
                            I confirm that I have read and agree to the
                            <a href="{{ route('terms') }}" target="_blank"
                                class="text-primary hover:underline">Terms & Conditions</a>,
                            <a href="{{ route('privacy-policy') }}" target="_blank"
                                class="text-primary hover:underline">Privacy Policy</a>,
                            and
                            <a href="{{ route('rights') }}" target="_blank"
                                class="text-primary hover:underline">Client Rights & Refund Policy</a>.
                        </span>
                    </label>
                    @error('accepted_terms')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>



                <div class="flex justify-between mt-8">

                    <button type="button" @click="step = 2"
                        class="bg-gray-200 px-6 py-3 rounded-lg font-bold hover:bg-gray-300">← Back</button>
                    <button type="submit" :disabled="!step3Valid || !@this.accepted_terms"
                        wire:loading.attr="disabled"
                        class="px-8 py-3 rounded-lg font-bold shadow-lg transition flex items-center justify-center gap-2 relative overflow-hidden"
                        :class="step3Valid
                            ?
                            'bg-gold text-black hover:bg-secondary hover:text-white cursor-pointer' :
                            'bg-gray-300 opacity-70 cursor-not-allowed'">
                        <span class="transition-opacity duration-200" wire:loading.class="opacity-0"
                            wire:loading.remove.class="opacity-100">
                            Submit Order
                        </span>

                        <span wire:loading
                            class="absolute inset-0 flex items-center justify-center gap-2 transition-opacity duration-200 opacity-0"
                            wire:loading.class="opacity-100">
                            <svg class="animate-spin h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="3"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v3a5 5 0 00-5 5H4z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Processing...</span>
                        </span>
                    </button>
                </div>
            </div>

        </form>
    </div>
</section>
