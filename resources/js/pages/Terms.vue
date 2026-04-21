<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicLayout from '@/layouts/PublicLayout.vue';

defineOptions({ layout: PublicLayout });
</script>

<template>
    <Head title="Terms and Conditions | Almond-Blossoms Events" />

    <div class="min-h-screen bg-brand-blush pt-32 pb-40">
        <div class="mx-auto max-w-4xl px-6 lg:px-12">
            <div class="fade-up mb-20 text-center">
                <span
                    class="mb-4 block inline-block border-b border-brand-rose/30 pb-4 text-xs font-bold tracking-[0.25em] text-brand-rose uppercase"
                    >Legal</span
                >
                <h1
                    class="font-serif text-5xl leading-tight text-brand-wine md:text-6xl"
                >
                    Terms & Conditions
                </h1>
            </div>

            <div
                class="prose prose-brand fade-up max-w-none space-y-8 font-sans text-lg leading-relaxed font-light text-brand-wine/80"
                style="animation-delay: 0.2s"
            >
                <h2 class="mt-12 mb-6 font-serif text-3xl text-brand-wine">
                    1. Introduction
                </h2>
                <p class="drop-cap">
                    This website is owned and operated by Almond-Blossoms
                    Events. By accessing or using this website, you agree to be
                    bound by these terms and conditions. If you do not agree
                    with any part of these terms, please do not use our website.
                </p>
                <p>
                    Information provided on this website is for general
                    informational purposes only and does not constitute
                    professional advice or guarantee the availability of
                    services. Submitting an enquiry does not confirm a booking
                    or guarantee availability.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    2. Intellectual Property
                </h2>
                <p>
                    Unless otherwise stated, all content on this website,
                    including but not limited to text, images, branding, and
                    design, is the property of
                    <strong class="font-medium text-brand-wine"
                        >Almond-Blossoms Events</strong
                    >
                    and is protected by copyright and intellectual property
                    laws.
                </p>
                <p>
                    You may view, download, or print content for your personal,
                    non-commercial use only, provided you do not alter the
                    materials or remove any copyright or proprietary notices.
                    You must not copy, reproduce, or redistribute any content
                    for commercial purposes without written permission.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    3. Website Use
                </h2>
                <p>
                    You agree to use this website only for lawful purposes and
                    in a way that does not infringe on the rights of others or
                    restrict their use of the site. You must not misuse this
                    site by introducing viruses, attempting to gain unauthorized
                    access, or using it for fraudulent purposes.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    4. Limitation of Liability
                </h2>
                <p>
                    We make every effort to ensure the information on our
                    website is accurate and up to date, but we do not warrant or
                    guarantee its completeness or accuracy. We are not liable
                    for any loss or damage resulting from the use or inability
                    to use this website or any of its content.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    5. External Links
                </h2>
                <p>
                    This website may contain links to external websites or
                    third-party content. We are not responsible for the content
                    or reliability of any linked websites and do not necessarily
                    endorse any views expressed within them.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    6. Cookies
                </h2>
                <p>
                    This website may use cookies to enhance user experience and
                    collect anonymous data for analytics purposes. By using the
                    site, you consent to the use of cookies. For more
                    information, please refer to our
                    <Link
                        href="/privacy-policy"
                        class="text-brand-rose underline hover:text-brand-wine"
                        >Privacy Policy</Link
                    >.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    7. No Guarantee of Availability
                </h2>
                <p>
                    Submitting an inquiry does not guarantee availability for
                    your wedding date. We book on a first-come, first-served
                    basis and availability is only confirmed with a signed
                    contract and deposit.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    8. Changes to Terms
                </h2>
                <p>
                    We may update these terms and conditions from time to time.
                    Continued use of the website will signify your acceptance of
                    any revised terms.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    9. Governing Law
                </h2>
                <p>
                    These terms are governed by and construed in accordance with
                    the laws of
                    <strong class="font-medium text-brand-wine"
                        >England and Wales</strong
                    >, and you submit to the exclusive jurisdiction of the
                    courts in that location.
                </p>

                <h2 class="mt-16 mb-6 font-serif text-3xl text-brand-wine">
                    10. Contact
                </h2>
                <p>
                    If you have questions about these Terms, please contact us
                    at:<br />
                    <a
                        href="mailto:hello@almond-blossoms.com"
                        class="mt-2 inline-block text-brand-rose underline hover:text-brand-wine"
                        >hello@almond-blossoms.com</a
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.drop-cap::first-letter {
    font-family: 'Cormorant Garamond', serif;
    font-size: 5.5rem;
    float: left;
    margin-right: 0.15em;
    line-height: 0.75;
    font-style: italic;
    color: #cd9fae;
}
</style>
