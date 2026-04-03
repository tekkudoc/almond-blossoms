<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

// Pull the global settings from the Laravel middleware
const page = usePage();
const settings = computed(() => page.props.settings || {});

// Get dynamic current year
const currentYear = new Date().getFullYear();

// Setup fallbacks in case the database is empty on first load
const email = computed(() => settings.value.contact_email || 'hello@almond-blossoms.com');
const phone = computed(() => settings.value.contact_phone || '07851 296 121');
const location = computed(() => settings.value.contact_location || 'Essex & Across U.K.');
const brandName = computed(() => settings.value.brand_name || 'Almond-Blossoms Events');
</script>

<template>
    <footer
        class="relative z-40 overflow-hidden bg-brand-dark pt-32 pb-12 text-brand-light"
    >
        <!-- Background Watermark -->
        <div
            class="pointer-events-none absolute -right-20 -bottom-20 font-serif text-[20rem] leading-none text-brand-wine/40 italic select-none"
        >
            AB
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-12">
            <div class="mb-24 grid grid-cols-1 gap-16 lg:grid-cols-12 lg:gap-8">

                <!-- CTA Left -->
                <div class="lg:col-span-7">
                    <h2
                        class="mb-8 font-serif text-6xl leading-none font-light text-brand-blush italic md:text-8xl"
                    >
                        Let's Chat.
                    </h2>
                    <p
                        class="mb-12 max-w-md text-lg leading-relaxed font-light text-brand-light/70"
                    >
                        I would love to get to know you and hear more about your
                        dream wedding. A once-in-a-lifetime experience that is
                        100% authentic.
                    </p>
                    <Link
                        href="/contact"
                        class="inline-block rounded-sm bg-brand-rose px-10 py-5 text-sm font-semibold tracking-[0.15em] text-brand-dark uppercase shadow-lg transition-all duration-400 hover:bg-brand-blush hover:text-brand-wine"
                    >
                        Get In Touch
                    </Link>
                </div>

                <!-- Contact Info Right -->
                <div
                    class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:col-span-5 lg:pt-6"
                >
                    <!-- Explore Links -->
                    <div>
                        <h4
                            class="mb-8 border-b border-brand-wine pb-4 text-xs font-semibold tracking-[0.2em] text-brand-rose uppercase"
                        >
                            Explore
                        </h4>
                        <ul
                            class="space-y-4 text-sm font-light tracking-wide text-brand-light/80"
                        >
                            <li>
                                <Link
                                    href="/"
                                    class="block transition-all duration-300 hover:pl-2 hover:text-brand-rose"
                                >Home</Link>
                            </li>
                            <li>
                                <Link
                                    href="/about"
                                    class="block transition-all duration-300 hover:pl-2 hover:text-brand-rose"
                                >Our Story</Link>
                            </li>
                            <li>
                                <Link
                                    href="/services"
                                    class="block transition-all duration-300 hover:pl-2 hover:text-brand-rose"
                                >Services</Link>
                            </li>
                            <li>
                                <Link
                                    href="/journal"
                                    class="block transition-all duration-300 hover:pl-2 hover:text-brand-rose"
                                >Journal</Link>
                            </li>
                        </ul>
                    </div>

                    <!-- Dynamic Contact Details -->
                    <div>
                        <h4
                            class="mb-8 border-b border-brand-wine pb-4 text-xs font-semibold tracking-[0.2em] text-brand-rose uppercase"
                        >
                            Contact
                        </h4>
                        <ul
                            class="space-y-4 text-sm font-light tracking-wide text-brand-light/80"
                        >
                            <li>
                                <a
                                    :href="'mailto:' + email"
                                    class="block w-max border-b border-transparent pb-1 transition-colors hover:border-brand-rose hover:text-brand-rose"
                                >
                                    {{ email }}
                                </a>
                            </li>
                            <li>
                                <a
                                    :href="'tel:' + phone.replace(/\s+/g, '')"
                                    class="block w-max border-b border-transparent pb-1 transition-colors hover:border-brand-rose hover:text-brand-rose"
                                >
                                    {{ phone }}
                                </a>
                            </li>
                            <li
                                class="pt-6 font-serif text-lg text-brand-rose italic"
                            >
                                {{ location }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright & Credits -->
            <div
                class="flex flex-col items-center justify-between border-t border-brand-wine/80 pt-8 text-xs font-semibold tracking-widest text-brand-light/40 uppercase gap-6 lg:flex-row lg:gap-0"
            >
                <div class="flex flex-col md:flex-row items-center gap-2 md:gap-6 text-center md:text-left">
                    <p>&copy; {{ currentYear }} {{ brandName }}. All Rights Reserved.</p>
                </div>

                <!-- Teveer Tech Credit -->
                <div class="flex items-center gap-2">
                    <span>Product by</span>
                    <a
                        href="https://teveer.tech/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-brand-rose hover:text-white transition-colors duration-300 border-b border-transparent hover:border-brand-rose pb-0.5"
                    >
                        Teveer Tech
                    </a>
                </div>

                <div class="flex space-x-8">
                    <Link
                        href="#"
                        class="transition-colors hover:text-brand-rose"
                    >Privacy Policy</Link>
                    <Link
                        href="#"
                        class="transition-colors hover:text-brand-rose"
                    >Cookies</Link>
                </div>
            </div>
        </div>
    </footer>
</template>
