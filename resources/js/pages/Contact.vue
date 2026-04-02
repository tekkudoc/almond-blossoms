<script setup>
import { ref, watch } from 'vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { CheckCircle, X } from 'lucide-vue-next';

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
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};

const page = usePage();
const flashMessage = ref(null);

watch(
    () => page.props.flash?.success,
    (msg) => {
        if (msg) {
            flashMessage.value = msg;
            setTimeout(() => (flashMessage.value = null), 5000);
        }
    },
    { immediate: true },
);
</script>

<template>
    <Head title="Contact | Almond-Blossoms Events" />

    <!-- Toast -->
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
            class="fixed right-8 bottom-8 z-[110] flex items-center gap-4 rounded-sm border-l-4 border-brand-rose bg-brand-wine px-6 py-4 text-brand-blush shadow-2xl"
        >
            <CheckCircle class="h-5 w-5 flex-shrink-0 text-brand-rose" />
            <span class="text-xs font-semibold tracking-widest uppercase">{{
                flashMessage
            }}</span>
            <button
                type="button"
                @click="flashMessage = null"
                class="ml-2 focus:outline-none"
                aria-label="Dismiss"
            >
                <X
                    class="h-4 w-4 opacity-50 transition-opacity hover:opacity-100"
                />
            </button>
        </div>
    </transition>

    <!-- Split screen -->
    <section class="relative flex w-full flex-col bg-brand-blush lg:flex-row">
        <!-- Left — sticky image -->
        <div
            class="fade-up relative h-[45vh] w-full overflow-hidden lg:sticky lg:top-0 lg:h-screen lg:w-5/12"
            style="animation-delay: 4.2s"
        >
            <img
                src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=1200&auto=format&fit=crop"
                class="h-full w-full object-cover object-center"
                alt="Wedding Setup"
            />
            <div
                class="absolute inset-0 bg-gradient-to-t from-brand-dark/40 to-transparent"
            ></div>
            <div
                class="pointer-events-none absolute inset-0 z-10 flex items-center justify-center"
            >
                <span
                    class="font-serif text-7xl tracking-widest text-brand-blush/20 italic select-none lg:text-9xl"
                    >Hello</span
                >
            </div>
        </div>

        <!-- Right — form -->
        <div
            class="fade-up w-full px-6 py-16 pt-32 lg:w-7/12 lg:px-24 lg:py-40 lg:pt-40"
            style="animation-delay: 4.4s"
        >
            <div class="mx-auto max-w-2xl">
                <!-- Greeting -->
                <div class="mb-20">
                    <span
                        class="mb-6 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >Inquiries</span
                    >
                    <h1
                        class="mb-8 font-serif text-5xl leading-[1.1] text-brand-wine lg:text-7xl"
                    >
                        Let's begin <br />
                        <span class="font-light text-brand-mauve italic"
                            >the journey.</span
                        >
                    </h1>
                    <p
                        class="mb-10 text-base leading-relaxed font-light text-brand-wine/70 sm:text-lg"
                    >
                        I would love to get to know you and hear more about your
                        dream wedding or upcoming celebration. Please fill out
                        the form below, and I will be in touch shortly to
                        schedule a complimentary consultation.
                    </p>
                    <div
                        class="flex flex-col gap-8 border-t border-brand-rose/20 pt-8 sm:flex-row lg:gap-16"
                    >
                        <div class="flex flex-col">
                            <span
                                class="mb-3 text-[0.65rem] font-semibold tracking-widest text-brand-rose uppercase"
                                >Email directly</span
                            >
                            <a
                                href="mailto:hello@almond-blossoms.com"
                                class="font-serif text-lg text-brand-wine italic transition-colors hover:text-brand-rose sm:text-xl"
                            >
                                hello@almond-blossoms.com
                            </a>
                        </div>
                        <div class="flex flex-col">
                            <span
                                class="mb-3 text-[0.65rem] font-semibold tracking-widest text-brand-rose uppercase"
                                >Call directly</span
                            >
                            <a
                                href="tel:07851296121"
                                class="font-serif text-lg text-brand-wine italic transition-colors hover:text-brand-rose sm:text-xl"
                            >
                                07851 296 121
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form @submit.prevent="submit" class="space-y-10">
                    <!-- Name & Email -->
                    <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
                        <div class="field-group">
                            <label for="name" class="field-label"
                                >Full Name
                                <span class="text-brand-rose">*</span></label
                            >
                            <input
                                v-model="form.name"
                                type="text"
                                id="name"
                                class="field-input"
                                placeholder=" "
                                required
                            />
                            <p
                                v-if="form.errors.name"
                                class="mt-2 text-xs text-red-500"
                            >
                                {{ form.errors.name }}
                            </p>
                        </div>
                        <div class="field-group">
                            <label for="email" class="field-label"
                                >Email Address
                                <span class="text-brand-rose">*</span></label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                class="field-input"
                                placeholder=" "
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

                    <!-- Phone & Date -->
                    <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
                        <div class="field-group">
                            <label for="phone" class="field-label"
                                >Phone Number</label
                            >
                            <input
                                v-model="form.phone"
                                type="tel"
                                id="phone"
                                class="field-input"
                                placeholder=" "
                            />
                            <p
                                v-if="form.errors.phone"
                                class="mt-2 text-xs text-red-500"
                            >
                                {{ form.errors.phone }}
                            </p>
                        </div>
                        <div class="field-group">
                            <label for="date" class="field-label"
                                >Proposed Event Date</label
                            >
                            <input
                                v-model="form.date"
                                type="text"
                                id="date"
                                class="field-input"
                                placeholder=" "
                            />
                            <p
                                v-if="form.errors.date"
                                class="mt-2 text-xs text-red-500"
                            >
                                {{ form.errors.date }}
                            </p>
                        </div>
                    </div>

                    <!-- Event type -->
                    <div class="field-group">
                        <label for="event_type" class="field-label"
                            >Type of Celebration
                            <span class="text-brand-rose">*</span></label
                        >
                        <div class="relative">
                            <select
                                v-model="form.event_type"
                                id="event_type"
                                class="field-input appearance-none pr-8"
                                required
                            >
                                <option value="" disabled></option>
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
                        </div>
                        <p
                            v-if="form.errors.event_type"
                            class="mt-2 text-xs text-red-500"
                        >
                            {{ form.errors.event_type }}
                        </p>
                    </div>

                    <!-- Message -->
                    <div class="field-group">
                        <label for="message" class="field-label"
                            >Your Vision &amp; Ideas
                            <span class="text-brand-rose">*</span></label
                        >
                        <textarea
                            v-model="form.message"
                            id="message"
                            rows="5"
                            class="field-input resize-none"
                            placeholder=" "
                            required
                        ></textarea>
                        <p
                            v-if="form.errors.message"
                            class="mt-2 text-xs text-red-500"
                        >
                            {{ form.errors.message }}
                        </p>
                    </div>

                    <!-- Submit -->
                    <div
                        class="flex flex-col justify-between gap-8 border-t border-brand-rose/20 pt-8 md:flex-row md:items-center"
                    >
                        <p
                            class="max-w-[200px] text-xs leading-relaxed font-light tracking-widest text-brand-wine/60 uppercase"
                        >
                            Please allow up to 48 hours for a response.
                        </p>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-full rounded-sm bg-brand-wine px-12 py-5 text-xs font-semibold tracking-[0.2em] text-brand-light uppercase shadow-xl transition-all duration-400 hover:bg-brand-rose hover:text-white hover:shadow-2xl disabled:cursor-not-allowed disabled:opacity-50 md:w-auto"
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

<style scoped>
.field-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

/* Label — always visible above the input */
.field-label {
    font-family: 'Montserrat', sans-serif;
    font-size: 0.6rem;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(90, 24, 44, 0.6); /* brand-wine 60% */
    transition: color 0.3s ease;
}

.field-group:focus-within .field-label {
    color: #5a182c; /* full wine on focus */
}

/* Input — bottom border clearly visible, full wine text when typed */
.field-input {
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1.5px solid rgba(90, 24, 44, 0.3); /* wine at 30% — visible but not heavy */
    padding: 0.6rem 0;
    color: #5a182c;
    font-family: 'Montserrat', sans-serif;
    font-weight: 300;
    font-size: 0.9rem;
    line-height: 1.6;
    outline: none;
    transition: border-color 0.3s ease;
}

.field-input:focus {
    border-bottom-color: #5a182c; /* solid on focus */
    box-shadow: none;
}

/* After the user types, keep the line solid */
.field-input:not(:placeholder-shown) {
    border-bottom-color: rgba(90, 24, 44, 0.5);
}

/* Select */
select.field-input {
    cursor: pointer;
    color: #5a182c;
}
select.field-input option {
    color: #5a182c;
    background: #fdfafb;
}

/* Placeholder is a single space — label acts as the label */
.field-input::placeholder {
    color: transparent;
}
</style>
