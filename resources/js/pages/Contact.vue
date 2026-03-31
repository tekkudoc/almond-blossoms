<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineOptions({
    layout: PublicLayout,
});

const form = useForm({
    name: '',
    email: '',
    phone: '',
    date: '',
    event_type: '',
    message: '',
});

const submit = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Contact | Almond-Blossoms Events" />

    <section
        class="relative flex w-full flex-col bg-brand-blush pt-24 lg:flex-row lg:pt-0"
    >
        <!-- LEFT: Sticky Visual -->
        <div
            class="fade-up relative h-[40vh] w-full overflow-hidden lg:sticky lg:top-0 lg:h-screen lg:w-5/12"
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
                    class="font-serif text-7xl tracking-widest text-brand-blush/20 italic lg:text-9xl"
                    >Hello</span
                >
            </div>
        </div>

        <!-- RIGHT: Form -->
        <div class="w-full px-6 py-16 lg:w-7/12 lg:px-24 lg:py-40">
            <div class="mx-auto max-w-2xl">
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
                </div>

                <form @submit.prevent="submit" class="space-y-12">
                    <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                        <input
                            v-model="form.name"
                            type="text"
                            class="input-line"
                            placeholder="YOUR FULL NAME"
                            required
                        />
                        <input
                            v-model="form.email"
                            type="email"
                            class="input-line"
                            placeholder="EMAIL ADDRESS"
                            required
                        />
                    </div>

                    <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                        <input
                            v-model="form.phone"
                            type="tel"
                            class="input-line"
                            placeholder="PHONE NUMBER"
                        />
                        <input
                            v-model="form.date"
                            type="text"
                            class="input-line"
                            placeholder="PROPOSED EVENT DATE"
                        />
                    </div>

                    <div class="group relative">
                        <select
                            v-model="form.event_type"
                            class="input-line"
                            required
                        >
                            <option value="" disabled>
                                TYPE OF CELEBRATION
                            </option>
                            <option value="wedding">Bespoke Wedding</option>
                            <option value="celebration">
                                Luxury Event / Party
                            </option>
                            <option value="creche">Events Creche</option>
                        </select>
                    </div>

                    <textarea
                        v-model="form.message"
                        rows="4"
                        class="input-line resize-none"
                        placeholder="YOUR VISION..."
                    ></textarea>

                    <div
                        class="flex flex-col justify-between gap-8 border-t border-brand-rose/20 pt-8 md:flex-row md:items-center"
                    >
                        <p
                            class="text-xs tracking-widest text-brand-wine/60 uppercase"
                        >
                            We reply within 48 hours.
                        </p>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="bg-brand-wine px-12 py-5 text-xs font-semibold tracking-[0.2em] text-brand-light uppercase transition-all hover:bg-brand-rose"
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
