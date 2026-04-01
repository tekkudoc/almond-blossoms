<script setup>
import { ref, watch } from 'vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';
import { CheckCircle, X } from 'lucide-vue-next'; // Icons for the toast

defineOptions({ layout: PublicLayout });

const form = useForm({
    name: '',
    email: '',
    phone: '',
    date: '',
    event_type: '',
    message: '',
});

const submit = () => {
    // Posts to the new ContactController we created
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};

// --- TOAST NOTIFICATION LOGIC ---
const page = usePage();
const flashMessage = ref(null);

// Watch for the 'success' flash message from the Laravel Controller
watch(
    () => page.props.flash?.success,
    (msg) => {
        if (msg) {
            flashMessage.value = msg;
            // Auto-hide the toast after 5 seconds
            setTimeout(() => (flashMessage.value = null), 5000);
        }
    },
    { immediate: true },
);
</script>

<template>
    <Head title="Contact | Almond-Blossoms Events" />

    <!-- ========================================== -->
    <!-- SUCCESS TOAST NOTIFICATION                 -->
    <!-- ========================================== -->
    <transition
        enter-active-class="transform transition duration-500 ease-out"
        enter-from-class="translate-y-10 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-300 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="flashMessage"
            class="fixed right-8 bottom-8 z-[100] flex items-center gap-4 rounded-sm border-l-4 border-brand-rose bg-brand-wine px-6 py-4 text-brand-blush shadow-2xl"
        >
            <CheckCircle class="h-5 w-5 text-brand-rose" />
            <span class="text-xs font-semibold tracking-widest uppercase">{{
                flashMessage
            }}</span>
            <button
                type="button"
                @click="flashMessage = null"
                class="ml-2 focus:outline-none"
            >
                <X
                    class="h-4 w-4 opacity-50 transition-opacity hover:opacity-100"
                />
            </button>
        </div>
    </transition>

    <!-- ========================================== -->
    <!-- EDITORIAL SPLIT SCREEN (Contact Layout)    -->
    <!-- ========================================== -->
    <section
        class="relative flex w-full flex-col bg-brand-blush pt-24 lg:flex-row lg:pt-0"
    >
        <!-- LEFT: Sticky Image Visual Anchor -->
        <div
            class="fade-up relative h-[40vh] w-full overflow-hidden lg:sticky lg:top-0 lg:h-screen lg:w-5/12"
            style="animation-delay: 3.8s"
        >
            <img
                src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=1200&auto=format&fit=crop"
                class="h-full w-full object-cover object-center"
                alt="Wedding Setup"
            />
            <div
                class="absolute inset-0 bg-gradient-to-t from-brand-dark/40 to-transparent"
            ></div>

            <!-- Watermark -->
            <div
                class="pointer-events-none absolute inset-0 z-10 flex items-center justify-center"
            >
                <span
                    class="-rotate-90 transform font-serif text-7xl tracking-widest text-brand-blush/20 italic lg:rotate-0 lg:text-9xl"
                    >Hello</span
                >
            </div>
        </div>

        <!-- RIGHT: The Interaction (Form & Details) -->
        <div
            class="fade-up w-full px-6 py-16 lg:w-7/12 lg:px-24 lg:py-40"
            style="animation-delay: 4s"
        >
            <div class="mx-auto max-w-2xl">
                <!-- The Greeting -->
                <div class="mb-20">
                    <span
                        class="mb-6 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >Inquiries</span
                    >
                    <h1
                        class="mb-8 font-serif text-6xl leading-[1.1] text-brand-wine lg:text-7xl"
                    >
                        Let's begin <br />
                        <span class="font-light text-brand-mauve italic"
                            >the journey.</span
                        >
                    </h1>
                    <p
                        class="mb-10 text-lg leading-relaxed font-light text-brand-wine/70"
                    >
                        I would love to get to know you and hear more about your
                        dream wedding or upcoming celebration. Please fill out
                        the form below, and I will be in touch shortly to
                        schedule a complimentary consultation.
                    </p>

                    <!-- Direct Contact Links -->
                    <div
                        class="flex flex-col gap-8 border-t border-brand-rose/20 pt-8 sm:flex-row lg:gap-16"
                    >
                        <div class="flex flex-col">
                            <span
                                class="mb-3 text-[0.65rem] font-semibold tracking-widest text-brand-rose uppercase"
                                >Email Me directly</span
                            >
                            <a
                                href="mailto:hello@almond-blossoms.com"
                                class="font-serif text-xl text-brand-wine italic transition-colors hover:text-brand-rose"
                                >hello@almond-blossoms.com</a
                            >
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="mb-3 text-[0.65rem] font-semibold tracking-widest text-brand-rose uppercase"
                                >Call me directly</span
                            >
                            <a
                                href="tel:07851296121"
                                class="font-serif text-xl text-brand-wine italic transition-colors hover:text-brand-rose"
                                >07851 296 121</a
                            >
                        </div>
                    </div>
                </div>

                <!-- The Bespoke Inquiry Form -->
                <form @submit.prevent="submit" class="space-y-12">
                    <!-- Row 1: Name & Email -->
                    <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                        <div class="group relative">
                            <input
                                v-model="form.name"
                                type="text"
                                id="name"
                                class="input-line"
                                placeholder="YOUR FULL NAME"
                                required
                            />
                            <p
                                v-if="form.errors.name"
                                class="mt-2 text-xs text-red-500"
                            >
                                {{ form.errors.name }}
                            </p>
                        </div>
                        <div class="group relative">
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                class="input-line"
                                placeholder="EMAIL ADDRESS"
                                required
                            />
                            <p
                                v-if="form.errors.email"
                                class="mt-2 text-xs text-red-500"
                            >
                                {{ form.errors.email }}
                            </p>
                        </div>
                    </div>

                    <!-- Row 2: Phone & Date -->
                    <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                        <div class="group relative">
                            <input
                                v-model="form.phone"
                                type="tel"
                                id="phone"
                                class="input-line"
                                placeholder="PHONE NUMBER"
                            />
                            <p
                                v-if="form.errors.phone"
                                class="mt-2 text-xs text-red-500"
                            >
                                {{ form.errors.phone }}
                            </p>
                        </div>
                        <div class="group relative">
                            <input
                                v-model="form.date"
                                type="text"
                                id="date"
                                class="input-line"
                                placeholder="PROPOSED EVENT DATE"
                            />
                            <p
                                v-if="form.errors.date"
                                class="mt-2 text-xs text-red-500"
                            >
                                {{ form.errors.date }}
                            </p>
                        </div>
                    </div>

                    <!-- Row 3: Event Type -->
                    <div class="group relative">
                        <!-- Custom SVG Arrow for the Select -->
                        <div
                            class="pointer-events-none absolute top-1/2 right-0 -translate-y-1/2 text-brand-rose"
                        >
                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </div>
                        <select
                            v-model="form.event_type"
                            id="event_type"
                            class="input-line"
                            required
                        >
                            <option value="" disabled selected>
                                TYPE OF CELEBRATION
                            </option>
                            <option value="wedding">Bespoke Wedding</option>
                            <option value="celebration">
                                Luxury Event / Party
                            </option>
                            <option value="creche">Events Creche</option>
                            <option value="power_hour">
                                Planning Power Hour
                            </option>
                            <option value="other">Other Inquiry</option>
                        </select>
                        <p
                            v-if="form.errors.event_type"
                            class="mt-2 text-xs text-red-500"
                        >
                            {{ form.errors.event_type }}
                        </p>
                    </div>

                    <!-- Row 4: Message Textarea -->
                    <div class="group relative">
                        <textarea
                            v-model="form.message"
                            id="message"
                            rows="4"
                            class="input-line resize-none"
                            placeholder="PLEASE TELL ME ABOUT YOUR VISION, VENUE, OR IDEAS..."
                            required
                        ></textarea>
                        <p
                            v-if="form.errors.message"
                            class="mt-2 text-xs text-red-500"
                        >
                            {{ form.errors.message }}
                        </p>
                    </div>

                    <!-- Submit Button & Process Teaser -->
                    <div
                        class="flex flex-col justify-between gap-8 border-t border-brand-rose/20 pt-8 md:flex-row md:items-center"
                    >
                        <!-- Process Teaser -->
                        <div
                            class="max-w-[200px] text-xs leading-relaxed font-light tracking-widest text-brand-wine/60 uppercase"
                        >
                            Please allow up to 48 hours for a response.
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-full bg-brand-wine px-12 py-5 text-xs font-semibold tracking-[0.2em] text-brand-light uppercase shadow-xl transition-all duration-400 hover:bg-brand-rose hover:text-brand-wine hover:shadow-2xl disabled:opacity-50 md:w-auto"
                        >
                            {{
                                form.processing ? 'Sending...' : 'Send Inquiry'
                            }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<style>
/* Custom Form Input Styling (Minimalist Bottom Border) */
.input-line {
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid rgba(205, 159, 174, 0.4); /* brand-rose */
    padding: 0.75rem 0;
    color: #5a182c; /* brand-wine */
    font-family: 'Montserrat', sans-serif;
    font-weight: 300;
    font-size: 0.875rem;
    transition: all 0.4s ease;
}
.input-line:focus {
    outline: none;
    border-bottom: 1px solid #5a182c; /* brand-wine */
    box-shadow: none !important; /* Prevents tailwind default focus ring */
}
.input-line::placeholder {
    color: rgba(90, 24, 44, 0.4); /* Faded brand-wine */
    text-transform: uppercase;
    letter-spacing: 0.15em;
    font-size: 0.65rem;
    font-weight: 500;
}
/* Style the select dropdown */
select.input-line {
    appearance: none;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    font-size: 0.65rem;
    font-weight: 500;
    color: rgba(90, 24, 44, 0.8);
}
select.input-line option {
    color: #5a182c;
    background: #fdfafb;
    padding: 10px;
}
</style>
