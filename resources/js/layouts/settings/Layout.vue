<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import { toUrl } from '@/lib/utils';
import { edit as editAppearance } from '@/routes/appearance';
import { edit as editProfile } from '@/routes/profile';
import { edit as editSecurity } from '@/routes/security';
import type { NavItem } from '@/types';
import { UserCircle2, ShieldCheck, Paintbrush } from 'lucide-vue-next';

// THIS IS THE CRITICAL FIX
defineOptions({
    layout: null,
});

// Define the navigation items with our custom luxury icons
const sidebarNavItems: NavItem[] = [
    {
        title: 'Profile Details',
        href: editProfile(),
        icon: UserCircle2,
    },
    {
        title: 'Account Security',
        href: editSecurity(),
        icon: ShieldCheck,
    },
    {
        title: 'Appearance',
        href: editAppearance(),
        icon: Paintbrush,
    },
];

const { isCurrentOrParentUrl } = useCurrentUrl();
</script>

<template>
    <!-- We removed the AppLayout wrapper from here -->
    <div class="mx-auto w-full max-w-7xl p-6 md:p-10">
        <!-- Header -->
        <div class="mb-10 border-b border-brand-rose/20 pb-4">
            <h1 class="mb-2 font-serif text-4xl text-brand-wine md:text-5xl">
                Executive Settings
            </h1>
            <p class="text-sm font-light tracking-wide text-brand-wine/60">
                Manage your personal profile, security, and dashboard
                appearance.
            </p>
        </div>

        <div class="flex flex-col gap-12 lg:flex-row">
            <!-- LEFT: Vertical Tab Menu -->
            <aside class="w-full lg:w-1/4">
                <nav
                    class="sticky top-24 flex flex-col gap-2"
                    aria-label="Settings Navigation"
                >
                    <Link
                        v-for="item in sidebarNavItems"
                        :key="toUrl(item.href)"
                        :href="item.href"
                        class="group flex items-center gap-3 rounded-sm px-6 py-4 text-left transition-all duration-300"
                        :class="
                            isCurrentOrParentUrl(item.href)
                                ? 'bg-brand-wine text-white shadow-md'
                                : 'bg-transparent text-brand-wine/60 hover:bg-brand-rose/10 hover:text-brand-wine'
                        "
                    >
                        <component
                            :is="item.icon"
                            class="h-4 w-4 shrink-0"
                            :class="
                                isCurrentOrParentUrl(item.href)
                                    ? 'text-brand-rose'
                                    : 'text-brand-wine/40 group-hover:text-brand-rose'
                            "
                        />
                        <span
                            class="text-[0.65rem] font-bold tracking-[0.2em] uppercase"
                            >{{ item.title }}</span
                        >
                    </Link>
                </nav>
            </aside>

            <!-- RIGHT: The Active Settings Page Content -->
            <div class="w-full lg:w-3/4">
                <div
                    class="overflow-hidden rounded-md border border-brand-rose/20 bg-white shadow-[0_10px_40px_-10px_rgba(90,24,44,0.08)]"
                >
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
