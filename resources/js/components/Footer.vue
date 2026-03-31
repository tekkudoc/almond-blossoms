<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer
        class="relative z-40 overflow-hidden bg-brand-dark pt-32 pb-12 text-brand-light"
    >
        <div
            class="pointer-events-none absolute -right-20 -bottom-20 font-serif text-[20rem] leading-none text-brand-wine/40 italic select-none"
        >
            AB
        </div>

        <div class="relative z-10 mx-auto max-w-7xl px-6 lg:px-12">
            <div class="mb-24 grid grid-cols-1 gap-16 lg:grid-cols-12 lg:gap-8">
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

                <div
                    class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:col-span-5 lg:pt-6"
                >
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
                                    href="mailto:hello@almond-blossoms.com"
                                    class="block w-max border-b border-transparent pb-1 transition-colors hover:border-brand-rose hover:text-brand-rose"
                                    >hello@almond-blossoms.com</a
                                >
                            </li>
                            <li>
                                <a
                                    href="tel:07851296121"
                                    class="block w-max border-b border-transparent pb-1 transition-colors hover:border-brand-rose hover:text-brand-rose"
                                    >07851 296 121</a
                                >
                            </li>
                            <li
                                class="pt-6 font-serif text-lg text-brand-rose italic"
                            >
                                Essex & Across U.K.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col items-center justify-between border-t border-brand-wine/80 pt-8 text-xs font-semibold tracking-widest text-brand-light/40 uppercase md:flex-row"
            >
                <p>&copy; 2026 Almond-Blossoms Events. All Rights Reserved.</p>
                <div class="mt-6 flex space-x-8 md:mt-0">
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
</template>
