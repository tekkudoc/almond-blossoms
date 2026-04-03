<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref, onMounted } from 'vue';
import { Facebook, Instagram } from 'lucide-vue-next';

// Pull the global settings from the Laravel middleware
const page = usePage();
const settings = computed(() => page.props.settings || {});

// Get dynamic current year
const currentYear = new Date().getFullYear();

// Setup fallbacks using your provided details
const email = computed(
    () => settings.value.contact_email || 'hello@almond-blossoms.com',
);
const phone = computed(() => settings.value.contact_phone || '07851 296 121');
const location = computed(
    () => settings.value.contact_location || 'Essex & Across U.K.',
);
const brandName = computed(
    () => settings.value.brand_name || 'Almond-Blossoms Events',
);

// Social Links
const facebookUrl = computed(
    () =>
        settings.value.social_facebook ||
        'https://www.facebook.com/AlmondBlossomss',
);
const instagramUrl = computed(
    () =>
        settings.value.social_instagram ||
        'https://www.instagram.com/almond_blossomsevents',
);
const pinterestUrl = computed(
    () =>
        settings.value.social_pinterest ||
        'https://www.pinterest.com/almond_blossomsevents/',
);

// --- COOKIE BANNER LOGIC ---
const showCookieBanner = ref(false);

onMounted(() => {
    if (!localStorage.getItem('cookies_handled')) {
        showCookieBanner.value = true;
    }
});

const handleCookies = (accepted) => {
    localStorage.setItem('cookies_handled', accepted ? 'accepted' : 'rejected');
    showCookieBanner.value = false;
};
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
            <div
                class="mb-24 grid grid-cols-1 gap-16 lg:grid-cols-12 lg:gap-12"
            >
                <!-- CTA Left (With Socials added below) -->
                <div class="pr-0 lg:col-span-6 lg:pr-12">
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

                    <div
                        class="flex flex-col gap-8 sm:flex-row sm:items-center"
                    >
                        <Link
                            href="/contact"
                            class="inline-block w-max rounded-sm bg-brand-rose px-10 py-5 text-sm font-semibold tracking-[0.15em] text-brand-dark uppercase shadow-lg transition-all duration-400 hover:bg-brand-blush hover:text-brand-wine"
                        >
                            Get In Touch
                        </Link>

                        <!-- Clean Social Media Icons -->
                        <div
                            class="flex items-center gap-6 text-brand-light/80 sm:ml-4"
                        >
                            <a
                                :href="instagramUrl"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition-all duration-300 hover:-translate-y-1 hover:text-brand-rose"
                                aria-label="Instagram"
                            >
                                <Instagram class="h-5 w-5" />
                            </a>

                            <a
                                :href="facebookUrl"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition-all duration-300 hover:-translate-y-1 hover:text-brand-rose"
                                aria-label="Facebook"
                            >
                                <Facebook class="h-5 w-5" />
                            </a>

                            <!-- Custom Pinterest SVG formatted to match Lucide -->
                            <a
                                :href="pinterestUrl"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition-all duration-300 hover:-translate-y-1 hover:text-brand-rose"
                                aria-label="Pinterest"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.168 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.367 18.624 0 12.017 0z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Links Right -->
                <div
                    class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:col-span-6 lg:pt-6"
                >
                    <!-- 1. Explore Links -->
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
                                    >Home</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/about"
                                    class="block transition-all duration-300 hover:pl-2 hover:text-brand-rose"
                                    >Our Story</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/services"
                                    class="block transition-all duration-300 hover:pl-2 hover:text-brand-rose"
                                    >Services</Link
                                >
                            </li>
                            <li>
                                <Link
                                    href="/journal"
                                    class="block transition-all duration-300 hover:pl-2 hover:text-brand-rose"
                                    >Journal</Link
                                >
                            </li>
                        </ul>
                    </div>

                    <!-- 2. Dynamic Contact Details -->
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
                                    class="inline-block max-w-full border-b border-transparent pb-1 break-all transition-colors hover:border-brand-rose hover:text-brand-rose"
                                >
                                    {{ email }}
                                </a>
                            </li>
                            <li>
                                <a
                                    :href="'tel:' + phone.replace(/\s+/g, '')"
                                    class="inline-block border-b border-transparent pb-1 transition-colors hover:border-brand-rose hover:text-brand-rose"
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
                class="flex flex-col items-center justify-between gap-6 border-t border-brand-wine/80 pt-8 text-xs font-semibold tracking-widest text-brand-light/40 uppercase lg:flex-row lg:gap-0"
            >
                <div
                    class="flex flex-col items-center gap-2 text-center md:flex-row md:gap-6 md:text-left"
                >
                    <p>
                        &copy; {{ currentYear }} {{ brandName }}. All Rights
                        Reserved.
                    </p>
                </div>

                <!-- Teveer Tech Credit -->
                <div class="flex items-center gap-2">
                    <span>Product by</span>
                    <a
                        href="https://teveer.tech/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="border-b border-transparent pb-0.5 text-brand-rose transition-colors duration-300 hover:border-brand-rose hover:text-white"
                    >
                        Teveer Tech
                    </a>
                </div>

                <div class="flex space-x-8">
                    <Link
                        href="#"
                        class="transition-colors hover:text-brand-rose"
                        >Privacy Policy</Link
                    >
                    <Link
                        href="#"
                        class="transition-colors hover:text-brand-rose"
                        >Cookies</Link
                    >
                </div>
            </div>
        </div>
    </footer>

    <!-- COOKIE CONSENT BANNER -->
    <transition
        enter-active-class="transition duration-500 ease-out transform"
        enter-from-class="translate-y-full opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-300 ease-in transform"
        leave-from-class="translate-y-0 opacity-100"
        leave-to-class="translate-y-full opacity-0"
    >
        <div
            v-if="showCookieBanner"
            class="fixed inset-x-0 bottom-0 z-[100] mx-auto max-w-7xl px-2 pb-2 sm:px-6 sm:pb-6"
        >
            <div
                class="flex flex-col items-center justify-between gap-6 rounded-sm border border-brand-rose/20 bg-brand-dark/95 p-6 shadow-2xl backdrop-blur-xl md:p-8 lg:flex-row"
            >
                <div class="flex-1 text-center lg:text-left">
                    <h4 class="mb-2 font-serif text-2xl text-brand-rose">
                        Your Privacy
                    </h4>
                    <p
                        class="max-w-4xl text-sm leading-relaxed font-light text-brand-light/80"
                    >
                        We use cookies on our website to give you the most
                        relevant experience by remembering your preferences and
                        repeat visits. By clicking "Accept", you consent to the
                        use of ALL the cookies.
                    </p>
                </div>

                <div
                    class="flex w-full shrink-0 flex-wrap items-center justify-center gap-4 lg:w-auto"
                >
                    <button
                        @click="handleCookies(false)"
                        class="flex-1 rounded-sm border border-brand-rose/40 px-6 py-3 text-xs font-semibold tracking-widest text-brand-light uppercase transition-colors hover:bg-brand-rose/10 lg:flex-none"
                    >
                        Reject All
                    </button>
                    <button
                        @click="handleCookies(true)"
                        class="flex-1 rounded-sm bg-brand-rose px-8 py-3 text-xs font-semibold tracking-widest text-brand-dark uppercase shadow-md transition-colors hover:bg-brand-light lg:flex-none"
                    >
                        Accept All
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>
