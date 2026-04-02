<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const isMobileMenuOpen = ref(false);

// FIX: Always animate the header slide-down since preloader always shows now.
// Removed the sessionStorage gate — header-slide-down runs on every page.
const showSlideDownAnimation = ref(false);

const closeMenu = () => {
    isMobileMenuOpen.value = false;
    document.body.style.overflow = '';
};

const openMenu = () => {
    isMobileMenuOpen.value = true;
    document.body.style.overflow = 'hidden';
};

const handleEscape = (e) => {
    if (e.key === 'Escape' && isMobileMenuOpen.value) {
        closeMenu();
    }
};

onMounted(() => {
    document.addEventListener('keydown', handleEscape);
    // Always play the slide-down animation since preloader always runs
    showSlideDownAnimation.value = true;
});

onUnmounted(() => document.removeEventListener('keydown', handleEscape));
</script>

<template>
    <div class="navigation-root-container">
        <header
            :class="[
                'fixed top-0 z-40 w-full border-b border-brand-rose/20 bg-brand-blush/85 backdrop-blur-md',
                showSlideDownAnimation ? 'header-slide-down' : 'header-visible',
            ]"
        >
            <div
                class="mx-auto flex h-24 max-w-7xl items-center justify-between px-6 lg:h-28 lg:px-12"
            >
                <!-- Logo -->
                <Link href="/" class="group flex items-center gap-3">
                    <span class="font-serif text-3xl text-brand-wine italic"
                        >AB</span
                    >
                    <div
                        class="flex flex-col border-l border-brand-rose pl-3 text-left"
                    >
                        <span
                            class="font-serif text-sm leading-none tracking-[0.2em] text-brand-wine uppercase"
                            >Almond-Blossoms</span
                        >
                        <span
                            class="mt-1 font-serif text-[0.65rem] leading-none tracking-[0.15em] text-brand-mauve uppercase"
                            >Events</span
                        >
                    </div>
                </Link>

                <!-- Desktop Nav -->
                <nav class="hidden h-full items-center space-x-8 md:flex">
                    <Link
                        href="/"
                        class="text-xs font-semibold tracking-[0.15em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >Home</Link
                    >
                    <Link
                        href="/about"
                        class="text-xs font-semibold tracking-[0.15em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >Our Story</Link
                    >

                    <!-- Services Dropdown -->
                    <div class="group relative flex h-full items-center">
                        <Link
                            href="/services"
                            class="flex items-center gap-1 text-xs font-semibold tracking-[0.15em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >
                            Services
                            <svg
                                class="h-3 w-3 text-brand-rose"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                ></path>
                            </svg>
                        </Link>
                        <div
                            class="invisible absolute top-full left-1/2 w-56 -translate-x-1/2 translate-y-2 transform pt-4 opacity-0 transition-all duration-300 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100"
                        >
                            <div
                                class="flex flex-col overflow-hidden rounded-sm border border-brand-rose/20 bg-brand-blush shadow-xl"
                            >
                                <Link
                                    href="/wedding"
                                    class="flex items-center justify-between border-b border-brand-rose/10 px-6 py-4 text-xs font-semibold tracking-[0.15em] text-brand-wine uppercase transition-colors hover:bg-brand-light hover:text-brand-rose"
                                >
                                    Weddings
                                    <span
                                        class="font-serif text-lg text-brand-rose/50 italic"
                                        >I.</span
                                    >
                                </Link>
                                <Link
                                    href="/celebrations"
                                    class="flex items-center justify-between border-b border-brand-rose/10 px-6 py-4 text-xs font-semibold tracking-[0.15em] text-brand-wine uppercase transition-colors hover:bg-brand-light hover:text-brand-rose"
                                >
                                    Celebrations
                                    <span
                                        class="font-serif text-lg text-brand-rose/50 italic"
                                        >II.</span
                                    >
                                </Link>
                            </div>
                        </div>
                    </div>

                    <Link
                        href="/journal"
                        class="text-xs font-semibold tracking-[0.15em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >Journal</Link
                    >
                    <Link
                        href="/contact"
                        class="rounded-sm bg-brand-wine px-7 py-3.5 text-xs font-semibold tracking-[0.15em] text-brand-blush uppercase shadow-sm transition-all hover:bg-brand-rose hover:text-white"
                        >Let's Chat</Link
                    >
                </nav>

                <!-- Mobile Hamburger -->
                <button
                    @click="openMenu"
                    class="text-brand-wine transition-colors hover:text-brand-rose md:hidden"
                    aria-label="Open menu"
                >
                    <svg
                        class="h-8 w-8"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="square"
                            stroke-width="1"
                            d="M4 6h16M4 12h16M4 18h16"
                        ></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Mobile Navigation Drawer -->
        <div class="md:hidden">
            <transition
                enter-active-class="transition-opacity duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="transition-opacity duration-300"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    v-show="isMobileMenuOpen"
                    @click="closeMenu"
                    class="fixed inset-0 z-[45] bg-brand-dark/60 backdrop-blur-sm"
                    aria-hidden="true"
                ></div>
            </transition>

            <div
                :class="isMobileMenuOpen ? 'translate-x-0' : 'translate-x-full'"
                class="fixed top-0 right-0 z-[50] flex h-full w-full transform flex-col overflow-y-auto bg-brand-blush shadow-2xl transition-transform duration-500 ease-in-out sm:w-80"
            >
                <div
                    class="flex items-center justify-between border-b border-brand-rose/20 px-8 py-6"
                >
                    <div class="flex items-center gap-3">
                        <span class="font-serif text-2xl text-brand-wine italic"
                            >AB</span
                        >
                        <div
                            class="flex flex-col border-l border-brand-rose pl-3"
                        >
                            <span
                                class="font-serif text-xs leading-none tracking-[0.2em] text-brand-wine uppercase"
                                >Almond-Blossoms</span
                            >
                            <span
                                class="mt-1 font-serif text-[0.6rem] leading-none tracking-[0.15em] text-brand-mauve uppercase"
                                >Events</span
                            >
                        </div>
                    </div>
                    <button
                        @click="closeMenu"
                        aria-label="Close menu"
                        class="text-brand-wine transition-colors hover:text-brand-rose focus:outline-none"
                    >
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>

                <nav class="flex flex-1 flex-col gap-0 px-8 py-8">
                    <Link
                        href="/"
                        @click="closeMenu"
                        class="block border-b border-brand-rose/10 py-3 text-sm font-semibold tracking-[0.2em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >Home</Link
                    >
                    <Link
                        href="/about"
                        @click="closeMenu"
                        class="block border-b border-brand-rose/10 py-3 text-sm font-semibold tracking-[0.2em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >Our Story</Link
                    >
                    <div class="border-b border-brand-rose/10 py-3">
                        <Link
                            href="/services"
                            @click="closeMenu"
                            class="flex items-center justify-between text-sm font-semibold tracking-[0.2em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                            >Services</Link
                        >
                        <div
                            class="mt-4 flex flex-col space-y-4 border-l border-brand-rose/30 pl-4"
                        >
                            <Link
                                href="/wedding"
                                @click="closeMenu"
                                class="flex items-center gap-3 text-xs font-semibold tracking-[0.2em] text-brand-wine/70 uppercase transition-colors hover:text-brand-rose"
                            >
                                <span class="font-serif text-brand-mauve italic"
                                    >I.</span
                                >
                                Weddings
                            </Link>
                            <Link
                                href="/celebrations"
                                @click="closeMenu"
                                class="flex items-center gap-3 text-xs font-semibold tracking-[0.2em] text-brand-wine/70 uppercase transition-colors hover:text-brand-rose"
                            >
                                <span class="font-serif text-brand-mauve italic"
                                    >II.</span
                                >
                                Celebrations
                            </Link>
                        </div>
                    </div>
                    <Link
                        href="/journal"
                        @click="closeMenu"
                        class="block border-b border-brand-rose/10 py-3 text-sm font-semibold tracking-[0.2em] text-brand-wine uppercase transition-colors hover:text-brand-rose"
                        >Journal</Link
                    >
                    <Link
                        href="/contact"
                        @click="closeMenu"
                        class="mt-8 rounded-sm bg-brand-wine px-8 py-4 text-center text-xs font-semibold tracking-[0.2em] text-brand-blush uppercase transition-all hover:bg-brand-rose hover:text-white"
                        >Let's Chat</Link
                    >
                </nav>
            </div>
        </div>
    </div>
</template>
