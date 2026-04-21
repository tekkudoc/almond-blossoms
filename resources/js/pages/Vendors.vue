<script setup>
import { Head, Link } from '@inertiajs/vue3';
import {
    Clock,
    FileSignature,
    MessageSquareQuote,
    HeartHandshake,
    Sparkles,
    Users,
    ShieldCheck,
    Baby,
} from 'lucide-vue-next';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Vendors & Venues | Almond-Blossoms Events" />

    <div class="pt-24 lg:pt-28">
        <!-- ========================================== -->
        <!-- HERO SECTION: The Flawless Setup           -->
        <!-- ========================================== -->
        <section
            class="relative flex h-[70vh] w-full flex-col items-center justify-center overflow-hidden bg-brand-dark"
        >
            <div class="absolute inset-0 h-full w-full opacity-60">
                <!-- Image of a perfectly empty, ready-to-go venue -->
                <img
                    src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=2000&auto=format&fit=crop"
                    alt="Flawless Venue Setup"
                    class="h-full w-full object-cover object-center"
                />
                <div
                    class="absolute inset-0 bg-gradient-to-b from-brand-dark/80 via-brand-wine/40 to-brand-dark/90"
                ></div>
            </div>

            <div
                class="fade-up relative z-10 mx-auto mt-16 max-w-5xl px-4 text-center"
            >
                <span
                    class="mb-6 block text-[0.65rem] font-bold tracking-[0.3em] text-brand-rose uppercase"
                    >Trusted Partnerships</span
                >
                <h1
                    class="mb-6 font-serif text-5xl leading-[1.1] text-white drop-shadow-2xl md:text-6xl lg:text-8xl"
                >
                    Supporting Venues <br />
                    <span class="font-light text-brand-rose italic"
                        >with Seamless Events</span
                    >
                </h1>
                <div
                    class="mx-auto mt-10 h-16 w-px bg-gradient-to-b from-brand-rose to-transparent"
                ></div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- THE ALMOND-BLOSSOMS STANDARD               -->
        <!-- ========================================== -->
        <section class="bg-brand-blush py-24 lg:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2 lg:gap-24"
                >
                    <!-- Left: Intro text -->
                    <div>
                        <div class="mb-6 inline-flex items-center space-x-4">
                            <span class="h-[1px] w-12 bg-brand-rose"></span>
                            <span
                                class="text-xs font-bold tracking-[0.2em] text-brand-mauve uppercase"
                                >Our Standard</span
                            >
                        </div>
                        <h2
                            class="mb-8 font-serif text-4xl leading-tight text-brand-wine md:text-5xl"
                        >
                            We work closely with venues and vendors to ensure
                            every event runs
                            <span class="font-light text-brand-rose italic"
                                >smoothly, professionally, and
                                efficiently.</span
                            >
                        </h2>
                        <p
                            class="font-sans text-lg leading-relaxed font-light text-brand-wine/80"
                        >
                            A successful event is a symphony of moving parts. At
                            Almond-Blossoms, we view our relationship with
                            venues and fellow suppliers not just as a
                            transaction, but as a vital, collaborative
                            partnership. When we work together seamlessly, the
                            client experiences absolute magic.
                        </p>
                    </div>

                    <!-- Right: Core Understanding List -->
                    <div
                        class="relative overflow-hidden rounded-md border border-brand-rose/20 bg-white p-8 shadow-xl sm:p-12"
                    >
                        <div
                            class="absolute top-0 right-0 -z-10 h-32 w-32 rounded-bl-full bg-brand-light/30"
                        ></div>

                        <h3
                            class="mb-8 border-b border-brand-rose/10 pb-4 font-serif text-2xl text-brand-wine"
                        >
                            We implicitly understand the importance of:
                        </h3>

                        <ul
                            class="space-y-6 font-sans font-light text-brand-wine/80"
                        >
                            <li class="flex items-start gap-4">
                                <Clock
                                    class="mt-0.5 h-5 w-5 shrink-0 text-brand-rose"
                                />
                                <div>
                                    <strong
                                        class="mb-1 block text-sm font-semibold tracking-widest text-brand-wine uppercase"
                                        >Strict Timelines</strong
                                    >
                                    <span class="text-sm"
                                        >Respecting bump-in and breakdown
                                        schedules flawlessly.</span
                                    >
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <FileSignature
                                    class="mt-0.5 h-5 w-5 shrink-0 text-brand-rose"
                                />
                                <div>
                                    <strong
                                        class="mb-1 block text-sm font-semibold tracking-widest text-brand-wine uppercase"
                                        >Venue Regulations</strong
                                    >
                                    <span class="text-sm"
                                        >Adhering to noise limits, safety
                                        protocols, and house rules.</span
                                    >
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <MessageSquareQuote
                                    class="mt-0.5 h-5 w-5 shrink-0 text-brand-rose"
                                />
                                <div>
                                    <strong
                                        class="mb-1 block text-sm font-semibold tracking-widest text-brand-wine uppercase"
                                        >Clear Communication</strong
                                    >
                                    <span class="text-sm"
                                        >Providing accurate, timely updates long
                                        before the event day.</span
                                    >
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <HeartHandshake
                                    class="mt-0.5 h-5 w-5 shrink-0 text-brand-rose"
                                />
                                <div>
                                    <strong
                                        class="mb-1 block text-sm font-semibold tracking-widest text-brand-wine uppercase"
                                        >Utmost Respect</strong
                                    >
                                    <span class="text-sm"
                                        >Treating your team, property, and space
                                        with absolute care.</span
                                    >
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- HOW WE ADD VALUE (Glassmorphic Cards)      -->
        <!-- ========================================== -->
        <section
            class="relative border-y border-brand-rose/10 bg-brand-light py-24 lg:py-40"
        >
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <div class="mb-16 text-center">
                    <span
                        class="mb-2 block font-signature text-4xl text-brand-rose"
                        >The Partnership</span
                    >
                    <h2
                        class="font-serif text-4xl text-brand-wine md:text-5xl lg:text-6xl"
                    >
                        How We Add Value
                    </h2>
                    <p
                        class="mx-auto mt-6 max-w-2xl font-sans font-light text-brand-wine/70"
                    >
                        Hiring Almond-Blossoms isn't just an investment for the
                        client; it is a massive stress-relief for the venue and
                        vendor teams.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
                    <div
                        class="group rounded-sm border border-brand-rose/20 bg-white/60 p-10 shadow-sm backdrop-blur-md transition-colors duration-500 hover:bg-white hover:shadow-xl"
                    >
                        <Sparkles
                            class="mb-6 h-8 w-8 text-brand-rose transition-transform duration-500 group-hover:scale-110"
                        />
                        <h3 class="mb-3 font-serif text-2xl text-brand-wine">
                            Reliable Coordination
                        </h3>
                        <p
                            class="font-sans text-sm leading-relaxed font-light text-brand-wine/70"
                        >
                            Organised event coordination means you only have one
                            point of contact. We filter out the noise and
                            deliver exactly what you need to know.
                        </p>
                    </div>

                    <div
                        class="group rounded-sm border border-brand-rose/20 bg-white/60 p-10 shadow-sm backdrop-blur-md transition-colors duration-500 hover:bg-white hover:shadow-xl"
                    >
                        <Users
                            class="mb-6 h-8 w-8 text-brand-rose transition-transform duration-500 group-hover:scale-110"
                        />
                        <h3 class="mb-3 font-serif text-2xl text-brand-wine">
                            Smooth Supplier Management
                        </h3>
                        <p
                            class="font-sans text-sm leading-relaxed font-light text-brand-wine/70"
                        >
                            We handle the logistics of all other suppliers. You
                            don't have to chase down the florist or the band; we
                            ensure they arrive, setup, and leave seamlessly.
                        </p>
                    </div>

                    <div
                        class="group rounded-sm border border-brand-rose/20 bg-white/60 p-10 shadow-sm backdrop-blur-md transition-colors duration-500 hover:bg-white hover:shadow-xl"
                    >
                        <ShieldCheck
                            class="mb-6 h-8 w-8 text-brand-rose transition-transform duration-500 group-hover:scale-110"
                        />
                        <h3 class="mb-3 font-serif text-2xl text-brand-wine">
                            Reduced Venue Stress
                        </h3>
                        <p
                            class="font-sans text-sm leading-relaxed font-light text-brand-wine/70"
                        >
                            By managing the timeline and the client's
                            expectations, we dramatically reduce the pressure on
                            venue staff and vendor teams on the day.
                        </p>
                    </div>

                    <div
                        class="group rounded-sm border border-brand-rose/20 bg-white/60 p-10 shadow-sm backdrop-blur-md transition-colors duration-500 hover:bg-white hover:shadow-xl"
                    >
                        <Baby
                            class="mb-6 h-8 w-8 text-brand-rose transition-transform duration-500 group-hover:scale-110"
                        />
                        <h3 class="mb-3 font-serif text-2xl text-brand-wine">
                            Professional Guest Management
                        </h3>
                        <p
                            class="font-sans text-sm leading-relaxed font-light text-brand-wine/70"
                        >
                            From seating plans to dietary requirements and
                            integrated childcare management, we ensure every
                            guest is handled with white-glove service.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- CRECHE INTEGRATION FOR VENUES (Dark Block) -->
        <!-- ========================================== -->
        <section
            class="relative overflow-hidden bg-brand-wine py-24 text-brand-light lg:py-32"
        >
            <div
                class="pointer-events-none absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 mix-blend-overlay"
            ></div>

            <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-12">
                <div
                    class="flex flex-col items-center gap-16 lg:flex-row lg:gap-24"
                >
                    <div class="w-full lg:w-1/2">
                        <span
                            class="mb-4 block text-xs font-bold tracking-[0.25em] text-brand-rose uppercase"
                            >A Unique Value Add</span
                        >
                        <h2
                            class="mb-8 font-serif text-4xl leading-tight text-brand-blush lg:text-5xl"
                        >
                            Our Childcare Service <br /><span
                                class="font-light text-brand-rose italic"
                                >for Venues</span
                            >
                        </h2>
                        <p
                            class="mb-8 font-sans text-lg leading-relaxed font-light text-brand-light/80"
                        >
                            We also offer event crèche services that can be
                            seamlessly integrated into weddings and events
                            hosted at your property. Offering this to your
                            clients elevates your venue’s appeal immensely.
                        </p>

                        <div
                            class="space-y-4 font-sans font-light text-brand-light/90"
                        >
                            <h4
                                class="mb-4 font-serif text-2xl text-brand-blush italic"
                            >
                                The Venue Benefits:
                            </h4>
                            <div class="flex items-center gap-4">
                                <span class="shrink-0 text-brand-rose">✦</span>
                                <span
                                    >Highly marketable family-friendly event
                                    options.</span
                                >
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="shrink-0 text-brand-rose">✦</span>
                                <span
                                    >Vastly improved guest experience and
                                    reviews.</span
                                >
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="shrink-0 text-brand-rose">✦</span>
                                <span
                                    >Fewer disruptions to service during key
                                    moments (speeches, dinner).</span
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Visual Callout Box -->
                    <div
                        class="w-full rounded-sm border border-brand-rose/20 bg-brand-dark/50 p-10 text-center shadow-2xl lg:w-1/2 lg:p-16"
                    >
                        <h3
                            class="mb-6 font-serif text-3xl leading-snug text-brand-light md:text-4xl"
                        >
                            Become a Trusted <br />Planning Partner
                        </h3>
                        <p
                            class="mx-auto mb-10 max-w-sm text-sm leading-relaxed font-light text-brand-light/60"
                        >
                            We are always happy to build relationships with
                            exceptional vendors and venues. Let's discuss
                            collaborations and preferred supplier opportunities.
                        </p>
                        <!-- Notice the query parameter passes '?type=collaboration' so Judith knows it's B2B! -->
                        <Link
                            href="/contact?type=collaboration"
                            class="block font-signature text-5xl text-brand-rose transition-colors hover:text-white"
                        >
                            ( Let's Collaborate )
                        </Link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
