<script setup>
import { ref, watch, onMounted } from 'vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';
import {
    CheckCircle,
    X,
    MapPin,
    CalendarHeart,
    Users,
    PoundSterling,
} from 'lucide-vue-next';

defineOptions({ layout: PublicLayout });

// Calculate today's date in YYYY-MM-DD format for the min date attribute
const today = ref('');
onMounted(() => {
    const date = new Date();
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    today.value = `${year}-${month}-${day}`;
});

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    event_type: '',
    event_location: '',
    event_date: '',
    guest_numbers: '',
    approximate_budget: '',
    found_us_via: '',
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
            setTimeout(() => (flashMessage.value = null), 6000);
        }
    },
    { immediate: true },
);
</script>

<template>
    <Head title="Let's Chat | Almond-Blossoms Events" />

    <!-- SUCCESS TOAST -->
    <transition
        enter-active-class="transform transition duration-700 ease-out"
        enter-from-class="translate-y-12 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-300 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="flashMessage"
            class="fixed right-0 bottom-8 left-0 z-[100] mx-auto flex w-max items-center gap-4 rounded-full border border-brand-rose/30 bg-brand-wine px-8 py-5 text-brand-blush shadow-2xl"
        >
            <CheckCircle class="h-5 w-5 text-brand-rose" />
            <span class="text-xs font-semibold tracking-widest uppercase">{{
                flashMessage
            }}</span>
            <button
                type="button"
                @click="flashMessage = null"
                class="ml-4 focus:outline-none"
            >
                <X
                    class="h-4 w-4 opacity-50 transition-opacity hover:opacity-100"
                />
            </button>
        </div>
    </transition>

    <!-- Main Container -->
    <div
        class="flex min-h-screen flex-col bg-brand-blush pt-24 lg:flex-row lg:pt-28"
    >
        <!-- ========================================== -->
        <!-- LEFT COLUMN: Sticky Image & Title          -->
        <!-- ========================================== -->
        <div
            class="fade-up relative h-[50vh] w-full overflow-hidden lg:sticky lg:top-28 lg:h-[calc(100vh-7rem)] lg:w-5/12"
            style="animation-delay: 3.8s"
        >
            <img
                src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=1200&auto=format&fit=crop"
                class="h-full w-full object-cover object-center"
                alt="Wedding Setup"
            />
            <div
                class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-brand-dark/40 to-brand-dark/20"
            ></div>

            <div
                class="absolute inset-0 z-10 flex flex-col justify-end p-8 text-center lg:p-16 lg:text-left"
            >
                <span
                    class="mx-auto mb-4 block w-max border-b border-brand-rose/30 pb-2 text-xs font-bold tracking-[0.25em] text-brand-rose uppercase lg:mx-0"
                    >Inquiries</span
                >
                <h1
                    class="mb-6 font-serif text-6xl leading-[1.0] text-white drop-shadow-xl md:text-7xl lg:text-8xl"
                >
                    Let's Get <br />
                    <span class="font-light text-brand-rose italic"
                        >Planning.</span
                    >
                </h1>
                <p
                    class="mx-auto max-w-sm text-sm leading-relaxed font-light text-brand-light/90 drop-shadow-md md:text-base lg:mx-0"
                >
                    We will get back to you within 24-48 hours. If you have not
                    heard from us, kindly email us directly at
                    <a
                        href="mailto:hello@almond-blossoms.com"
                        class="font-medium underline transition-colors hover:text-brand-rose"
                        >hello@almond-blossoms.com</a
                    >.
                </p>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- RIGHT COLUMN: The Scrollable Form          -->
        <!-- ========================================== -->
        <div
            class="fade-up w-full px-6 py-16 lg:w-7/12 lg:px-16 lg:py-24 xl:px-24"
            style="animation-delay: 4.2s"
        >
            <form @submit.prevent="submit" class="mx-auto max-w-3xl space-y-16">
                <!-- SECTION 1: Personal Details -->
                <div>
                    <div
                        class="mb-10 flex items-center gap-4 border-b border-brand-rose/20 pb-4"
                    >
                        <span class="font-serif text-3xl text-brand-rose italic"
                            >01.</span
                        >
                        <h2 class="font-serif text-3xl text-brand-wine">
                            Your Details
                        </h2>
                    </div>

                    <div
                        class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-2"
                    >
                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >First Name *</label
                            >
                            <input
                                v-model="form.first_name"
                                type="text"
                                class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                required
                            />
                            <p
                                v-if="form.errors.first_name"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.first_name }}
                            </p>
                        </div>
                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >Last Name *</label
                            >
                            <input
                                v-model="form.last_name"
                                type="text"
                                class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                required
                            />
                            <p
                                v-if="form.errors.last_name"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.last_name }}
                            </p>
                        </div>
                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >Email Address *</label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                placeholder="hello@example.com"
                                required
                            />
                            <p
                                v-if="form.errors.email"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.email }}
                            </p>
                        </div>
                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >Phone Number *</label
                            >
                            <input
                                v-model="form.phone"
                                type="tel"
                                class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                required
                            />
                            <p
                                v-if="form.errors.phone"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.phone }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Event Details -->
                <div>
                    <div
                        class="mb-10 flex items-center gap-4 border-b border-brand-rose/20 pb-4"
                    >
                        <span class="font-serif text-3xl text-brand-rose italic"
                            >02.</span
                        >
                        <h2 class="font-serif text-3xl text-brand-wine">
                            The Celebration
                        </h2>
                    </div>

                    <!-- RE-ADDED EVENT TYPE DROPDOWN -->
                    <div class="mb-8">
                        <label
                            class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                            >Type of Inquiry *</label
                        >
                        <select
                            v-model="form.event_type"
                            class="w-full cursor-pointer appearance-none rounded-sm border border-brand-rose/30 bg-white p-4 text-sm font-bold tracking-widest text-brand-wine uppercase shadow-inner transition-all outline-none focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                            required
                        >
                            <option value="" disabled>
                                Select an option...
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
                            class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                        >
                            {{ form.errors.event_type }}
                        </p>
                    </div>

                    <div
                        class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-2"
                    >
                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >Location of Event *</label
                            >
                            <div class="relative">
                                <MapPin
                                    class="pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2 text-brand-rose/50"
                                />
                                <input
                                    v-model="form.event_location"
                                    type="text"
                                    class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 pl-12 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                    placeholder="City or specific venue..."
                                    required
                                />
                            </div>
                            <p
                                v-if="form.errors.event_location"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.event_location }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >Date of Event (if known)</label
                            >
                            <div class="relative">
                                <CalendarHeart
                                    class="pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2 text-brand-rose/50"
                                />
                                <!-- HTML5 Date Picker with min="today" -->
                                <input
                                    v-model="form.event_date"
                                    type="date"
                                    :min="today"
                                    class="w-full cursor-pointer rounded-sm border border-brand-rose/30 bg-white p-4 pl-12 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                />
                            </div>
                            <p
                                v-if="form.errors.event_date"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.event_date }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >Guest Numbers</label
                            >
                            <div class="relative">
                                <Users
                                    class="pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2 text-brand-rose/50"
                                />
                                <input
                                    v-model="form.guest_numbers"
                                    type="text"
                                    class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 pl-12 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                    placeholder="Approximate count..."
                                />
                            </div>
                            <p
                                v-if="form.errors.guest_numbers"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.guest_numbers }}
                            </p>
                        </div>

                        <div>
                            <label
                                class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                                >Approximate Budget *</label
                            >
                            <div class="relative">
                                <PoundSterling
                                    class="pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2 text-brand-rose/50"
                                />
                                <input
                                    v-model="form.approximate_budget"
                                    type="text"
                                    class="w-full rounded-sm border border-brand-rose/30 bg-white p-4 pl-12 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                                    placeholder="£..."
                                    required
                                />
                            </div>
                            <p
                                v-if="form.errors.approximate_budget"
                                class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                            >
                                {{ form.errors.approximate_budget }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: The Vision -->
                <div>
                    <div
                        class="mb-10 flex items-center gap-4 border-b border-brand-rose/20 pb-4"
                    >
                        <span class="font-serif text-3xl text-brand-rose italic"
                            >03.</span
                        >
                        <h2 class="font-serif text-3xl text-brand-wine">
                            The Vision
                        </h2>
                    </div>

                    <!-- Removed CSS @apply from here, strictly using Tailwind's Peer utility -->
                    <div class="mb-12">
                        <label
                            class="mb-4 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                            >How did you discover Almond-Blossoms Events?
                            *</label
                        >
                        <div
                            class="flex flex-wrap gap-3 font-sans text-sm font-light text-brand-wine/80"
                        >
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    v-model="form.found_us_via"
                                    value="Hitched"
                                    class="peer sr-only"
                                    required
                                />
                                <span
                                    class="inline-block rounded-full border border-brand-rose/30 bg-white px-5 py-2.5 text-xs font-semibold tracking-widest text-brand-wine/70 uppercase shadow-sm transition-all duration-300 peer-checked:border-brand-wine peer-checked:bg-brand-wine peer-checked:text-white peer-checked:shadow-md hover:bg-brand-rose/10"
                                    >Hitched</span
                                >
                            </label>

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    v-model="form.found_us_via"
                                    value="Harper's Bazaar"
                                    class="peer sr-only"
                                />
                                <span
                                    class="inline-block rounded-full border border-brand-rose/30 bg-white px-5 py-2.5 text-xs font-semibold tracking-widest text-brand-wine/70 uppercase shadow-sm transition-all duration-300 peer-checked:border-brand-wine peer-checked:bg-brand-wine peer-checked:text-white peer-checked:shadow-md hover:bg-brand-rose/10"
                                    >Harper's Bazaar</span
                                >
                            </label>

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    v-model="form.found_us_via"
                                    value="Instagram"
                                    class="peer sr-only"
                                />
                                <span
                                    class="inline-block rounded-full border border-brand-rose/30 bg-white px-5 py-2.5 text-xs font-semibold tracking-widest text-brand-wine/70 uppercase shadow-sm transition-all duration-300 peer-checked:border-brand-wine peer-checked:bg-brand-wine peer-checked:text-white peer-checked:shadow-md hover:bg-brand-rose/10"
                                    >Instagram</span
                                >
                            </label>

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    v-model="form.found_us_via"
                                    value="Google Search"
                                    class="peer sr-only"
                                />
                                <span
                                    class="inline-block rounded-full border border-brand-rose/30 bg-white px-5 py-2.5 text-xs font-semibold tracking-widest text-brand-wine/70 uppercase shadow-sm transition-all duration-300 peer-checked:border-brand-wine peer-checked:bg-brand-wine peer-checked:text-white peer-checked:shadow-md hover:bg-brand-rose/10"
                                    >Google Search</span
                                >
                            </label>

                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    v-model="form.found_us_via"
                                    value="Word of Mouth"
                                    class="peer sr-only"
                                />
                                <span
                                    class="inline-block rounded-full border border-brand-rose/30 bg-white px-5 py-2.5 text-xs font-semibold tracking-widest text-brand-wine/70 uppercase shadow-sm transition-all duration-300 peer-checked:border-brand-wine peer-checked:bg-brand-wine peer-checked:text-white peer-checked:shadow-md hover:bg-brand-rose/10"
                                    >Word of Mouth</span
                                >
                            </label>
                        </div>
                        <p
                            v-if="form.errors.found_us_via"
                            class="mt-3 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                        >
                            {{ form.errors.found_us_via }}
                        </p>
                    </div>

                    <div>
                        <label
                            class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/80 uppercase"
                            >Message *</label
                        >
                        <textarea
                            v-model="form.message"
                            rows="6"
                            class="w-full resize-none rounded-sm border border-brand-rose/30 bg-white p-4 text-base font-light text-brand-wine shadow-inner transition-all outline-none placeholder:text-brand-wine/30 focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                            placeholder="Please tell me about your ideas, aesthetics, or any specific requirements..."
                            required
                        ></textarea>
                        <p
                            v-if="form.errors.message"
                            class="mt-2 text-[0.65rem] font-semibold tracking-widest text-red-500 uppercase"
                        >
                            {{ form.errors.message }}
                        </p>
                    </div>
                </div>

                <!-- Submit Action -->
                <div
                    class="flex flex-col items-center justify-between gap-8 border-t border-brand-rose/20 pt-10 sm:flex-row"
                >
                    <p
                        class="text-[0.65rem] font-bold tracking-[0.25em] text-brand-wine/60 uppercase"
                    >
                        We aim to reply within 48 hours.
                    </p>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-brand-wine px-12 py-4 text-xs font-semibold tracking-[0.2em] text-brand-light uppercase shadow-xl transition-all duration-400 hover:bg-brand-rose hover:shadow-2xl disabled:opacity-50 sm:w-auto"
                    >
                        {{ form.processing ? 'Sending...' : 'Submit Inquiry' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Only using native CSS for overriding standard browser pickers */
input[type='date']::-webkit-calendar-picker-indicator {
    cursor: pointer;
    opacity: 0.6;
    transition: 0.2s;
}
input[type='date']::-webkit-calendar-picker-indicator:hover {
    opacity: 1;
}
</style>
