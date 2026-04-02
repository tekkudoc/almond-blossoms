<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    celebrations: Array,
});

defineOptions({
    layout: PublicLayout,
});

const splitTitle = (title) => {
    const words = title.split(' ');
    if (words.length <= 1) return { main: title, sub: '' };
    return {
        main: words[0],
        sub: words.slice(1).join(' '),
    };
};
</script>

<template>
    <Head title="Celebrations & Parties | Almond-Blossoms Events" />

    <div>
        <!-- ============================================ -->
        <!-- HERO                                         -->
        <!-- ============================================ -->
        <section
            class="relative flex min-h-[85vh] w-full flex-col items-center justify-center overflow-hidden"
        >
            <div class="absolute inset-0 h-full w-full">
                <img
                    src="https://images.unsplash.com/photo-1605744435823-b88e4e9bc044?q=80&w=2000&auto=format&fit=crop"
                    alt="Luxury Event Setup"
                    class="h-full w-full object-cover object-center"
                />
                <div
                    class="absolute inset-0 bg-gradient-to-b from-brand-dark/40 via-brand-wine/20 to-brand-dark/70"
                ></div>
            </div>

            <!-- Content — preloader-synced delay, padding clears fixed nav -->
            <div
                class="fade-up relative z-10 mx-auto max-w-4xl px-4 pt-32 text-center md:pt-24"
                style="animation-delay: 4.2s"
            >
                <span
                    class="mb-6 block text-[0.65rem] font-semibold tracking-[0.3em] text-brand-light uppercase"
                >
                    Epic and Intimate Parties
                </span>
                <h1
                    class="mb-6 font-serif text-4xl leading-[1.1] text-white drop-shadow-2xl sm:text-5xl md:text-7xl lg:text-8xl"
                >
                    Celebrations, Parties
                    <br />
                    <span class="font-light text-brand-rose italic"
                        >&amp; Events</span
                    >
                </h1>
                <p
                    class="mx-auto max-w-2xl font-serif text-xl leading-relaxed text-brand-light/90 italic drop-shadow-md md:text-3xl"
                >
                    Memorable milestones, flawlessly executed.
                </p>
            </div>

            <!-- Scroll indicator -->
            <div
                class="pointer-events-none absolute bottom-10 left-1/2 z-10 hidden -translate-x-1/2 flex-col items-center opacity-80 sm:flex"
            >
                <div class="h-12 w-px bg-brand-rose"></div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- INTRO PHILOSOPHY                             -->
        <!-- ============================================ -->
        <section
            class="border-b border-brand-rose/20 bg-brand-light py-24 text-center lg:py-32"
        >
            <div class="mx-auto max-w-4xl px-6">
                <h2
                    class="mb-8 font-serif text-2xl leading-[1.4] font-light text-brand-wine italic sm:text-3xl md:text-5xl"
                >
                    "We not only plan weddings, but we also love to create
                    deeply memorable parties for our clients as they celebrate
                    life's most beautiful milestones."
                </h2>
                <div class="mx-auto h-px w-12 bg-brand-rose"></div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- PORTFOLIO LOOKBOOK                           -->
        <!-- ============================================ -->
        <section class="relative bg-brand-blush py-24 lg:py-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div class="mb-20 text-center">
                    <span
                        class="mb-4 inline-block border-b border-brand-rose/30 pb-4 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                    >
                        The Portfolio
                    </span>
                    <h2
                        class="font-serif text-4xl leading-tight text-brand-wine sm:text-5xl lg:text-6xl"
                    >
                        Our Party Planning
                        <br />
                        <span class="font-light text-brand-mauve italic"
                            >Celebrations</span
                        >
                    </h2>
                </div>

                <!-- 5-image asymmetric grid -->
                <div
                    v-if="celebrations && celebrations.length > 0"
                    class="grid grid-cols-1 gap-6 md:grid-cols-12 lg:gap-8"
                >
                    <Link
                        v-for="(item, index) in celebrations.slice(0, 5)"
                        :key="item.id"
                        href="/contact"
                        class="img-zoom-container group relative overflow-hidden rounded-sm bg-brand-dark shadow-xl"
                        :class="{
                            'aspect-[3/4] md:col-span-5': index === 0,
                            'aspect-[16/9] md:col-span-7': index === 1,
                            'aspect-square md:col-span-6':
                                index === 2 || index === 3,
                            'aspect-[21/9] md:col-span-12': index === 4,
                        }"
                    >
                        <img
                            v-if="item.image"
                            :src="item.image"
                            class="img-zoom h-full w-full object-cover"
                            :alt="item.title"
                        />

                        <!-- Hover overlay -->
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center bg-brand-wine/80 p-8 text-center opacity-0 backdrop-blur-sm transition-opacity duration-700 group-hover:opacity-100"
                        >
                            <h3
                                class="font-serif text-3xl text-brand-light italic sm:text-4xl"
                            >
                                {{ splitTitle(item.title).main }}
                            </h3>
                            <span
                                v-if="splitTitle(item.title).sub"
                                class="mt-4 text-xs tracking-widest text-brand-rose uppercase"
                            >
                                {{ splitTitle(item.title).sub }}
                            </span>
                        </div>
                    </Link>
                </div>

                <!-- Fallback -->
                <div v-else class="py-16 text-center">
                    <p class="font-serif text-xl text-brand-wine/50 italic">
                        Portfolio coming soon.
                    </p>
                </div>
            </div>
        </section>

        <!-- ============================================ -->
        <!-- INVESTMENT & THE PITCH                       -->
        <!-- ============================================ -->
        <section
            class="relative overflow-hidden border-t border-brand-rose/20 bg-brand-wine py-24 text-brand-light lg:py-40"
        >
            <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2 lg:gap-24"
                >
                    <!-- Content -->
                    <div>
                        <span
                            class="mb-4 block text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                        >
                            The Promise
                        </span>
                        <h2
                            class="mb-8 font-serif text-4xl leading-[1.1] text-brand-blush sm:text-5xl lg:text-6xl"
                        >
                            A completely
                            <br />
                            <span class="font-light text-brand-rose italic"
                                >bespoke</span
                            >
                            service.
                        </h2>
                        <p
                            class="mb-10 text-base leading-relaxed font-light text-brand-light/80 sm:text-lg"
                        >
                            Because no two parties are alike, this service is
                            entirely tailored to your vision. It includes the
                            complete sourcing of vendors, booking of stunning
                            venues, and full aesthetic setup and styling,
                            resulting in a flawless, fun-filled event.
                        </p>
                        <Link
                            href="/contact"
                            class="inline-block rounded-sm bg-brand-rose px-10 py-5 text-sm font-semibold tracking-[0.15em] text-brand-dark uppercase shadow-lg transition-all duration-400 hover:bg-brand-blush hover:text-brand-wine"
                        >
                            Say Hello
                        </Link>
                    </div>

                    <!-- Pricing pull-quote -->
                    <div
                        class="relative flex w-full flex-col justify-center border border-brand-rose/30 bg-brand-dark/50 p-8 shadow-2xl md:aspect-[4/3] lg:p-16"
                    >
                        <span
                            class="pointer-events-none absolute -top-6 -right-6 font-serif text-9xl text-brand-rose italic opacity-20 select-none"
                        >
                            "
                        </span>
                        <span
                            class="mb-6 block text-xs font-semibold tracking-widest text-brand-rose uppercase"
                        >
                            Investment Guide
                        </span>
                        <p
                            class="mb-8 font-serif text-2xl leading-snug font-light text-brand-blush sm:text-3xl md:text-4xl"
                        >
                            This service is priced precisely according to your
                            requirements, size, and the ultimate scale of your
                            celebration.
                        </p>
                        <div
                            class="flex flex-wrap items-end gap-4 border-t border-brand-rose/20 pt-8"
                        >
                            <span
                                class="font-serif text-6xl leading-none text-brand-rose italic lg:text-7xl"
                            >
                                10%
                            </span>
                            <div class="flex flex-col pb-2">
                                <span
                                    class="text-[0.65rem] font-semibold tracking-widest text-brand-light uppercase"
                                >
                                    Of your budget
                                </span>
                                <span
                                    class="text-xs font-light text-brand-light/60 italic"
                                >
                                    *A minimum fee applies
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
