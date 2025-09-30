<section class="py-20 bg-gray-50" x-data="{ step: 1 }">
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
                    <div>
                        <label class="block font-semibold mb-2">Your Email</label>
                        <input type="text" wire:model.live="email"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Assignment Type -->
                    <div>
                        <label class="block font-semibold mb-2">Assignment Type</label>
                        <select wire:model.live="assignment_type_id"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="">-- Select Assignment Type --</option>
                            @foreach ($assignmentTypes->whereNull('parent_id') as $parent)
                                <optgroup label="{{ $parent->name }}">
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
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
                    <div>
                        <label class="block font-semibold mb-2">Service</label>
                        <select wire:model.live="service_id"
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
                    <div>
                        <label class="block font-semibold mb-2">Academic Level</label>
                        <select wire:model.live="academic_level_id"
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
                    <div>
                        <label class="block font-semibold mb-2">Subject</label>
                        <select wire:model.live="subject_id"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                            <option value="">-- Select Subject --</option>
                            @foreach ($subjects as $subj)
                                <option value="{{ $subj->id }}">{{ $subj->name }}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Language -->
                    <div>
                        <label class="block font-semibold mb-2">Language</label>
                        <select wire:model.live="language_id"
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
                    <div>
                        <label class="block font-semibold mb-2">Citation Style</label>
                        <select wire:model.live="style_id"
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
                    <div>
                        <label class="block font-semibold mb-2">Topic / Title</label>
                        <input type="text" wire:model.live="subject"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                        @error('subject')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Word Count -->
                    <div>
                        <label class="block font-semibold mb-2">Word Count</label>
                        <input type="text" wire:model.live="words"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                        <p class="text-sm text-gray-500">1 page ≈ 275 words</p>
                        @error('words')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="text-right mt-8">
                    <button type="button" @click="step = 2"
                        class="bg-gold text-black px-6 py-3 rounded-lg font-bold hover:bg-secondary hover:text-white">
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
                            <option value="5d">5 days</option>
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
                                    <input type="checkbox" wire:model.live="selectedAddons" value="{{ $addon->id }}"
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
                    <div>
                        <label class="block font-semibold mb-2">Additional Instructions</label>
                        <textarea wire:model.live="instructions" rows="4"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary"></textarea>
                    </div>

                    <!-- Files -->
                    <div>
                        <label class="block font-semibold mb-2">Upload Files</label>
                        <input type="file" wire:model="files" multiple
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-primary">
                        <p class="text-sm text-gray-500">Max 150MB</p>
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
                            <li><strong>Topic:</strong> {{ $subject ?? '' }}</li>
                            <li><strong>Word Count:</strong> {{ $words ?? 0 }} words
                                (~{{ ceil(($words ?? 0) / 275) }} pages)</li>
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

                <div class="flex justify-between mt-8">
                    <button type="button" @click="step = 2"
                        class="bg-gray-200 px-6 py-3 rounded-lg font-bold hover:bg-gray-300">← Back</button>
                    <button type="submit"
                        class="bg-gold text-black px-8 py-4 rounded-lg font-bold shadow-lg hover:bg-secondary hover:text-white">
                        Submit Order
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
