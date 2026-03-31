<script setup lang="ts">
import AppSidebar from '@/components/AppSidebar.vue';
import { SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar';
import { Separator } from '@/components/ui/separator';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const breadcrumbs = computed(() => page.props.breadcrumbs || []);
</script>

<template>
    <!-- 1. The Provider MUST wrap everything for the Trigger to work -->
    <SidebarProvider>
        <div class="flex min-h-screen w-full bg-brand-blush">

            <!-- The Branded Sidebar Component -->
            <AppSidebar />

            <!-- The Main Content Area -->
            <div class="flex flex-1 flex-col">

                <!-- Top Header Bar with Breadcrumbs & Mobile Trigger -->
                <header class="flex h-16 shrink-0 items-center gap-4 border-b border-brand-rose/20 bg-brand-blush/80 backdrop-blur-sm px-6 sticky top-0 z-30">

                    <!-- This will now work because it's inside the Provider -->
                    <SidebarTrigger class="-ml-1 text-brand-wine hover:text-brand-rose" />

                    <Separator orientation="vertical" class="mr-2 h-4 bg-brand-rose/30" />

                    <!-- Dynamic Breadcrumbs -->
                    <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs font-semibold tracking-widest uppercase">
                        <span class="text-brand-wine/40">Admin</span>
                        <template v-for="(item, index) in breadcrumbs" :key="index">
                            <span class="text-brand-rose/50">/</span>
                            <span :class="index === breadcrumbs.length - 1 ? 'text-brand-wine' : 'text-brand-wine/60'">
                                {{ item.title }}
                            </span>
                        </template>
                        <template v-if="!breadcrumbs || breadcrumbs.length === 0">
                            <span class="text-brand-rose/50">/</span>
                            <span class="text-brand-wine">Dashboard</span>
                        </template>
                    </nav>
                </header>

                <!-- THE PAGE CONTENT SLOT -->
                <main class="flex-1 overflow-y-auto">
                    <div class="p-6 md:p-10">
                        <slot />
                    </div>
                </main>

            </div>
        </div>
    </SidebarProvider>
</template>
