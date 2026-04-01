<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppearanceTabs from '@/components/AppearanceTabs.vue';
import { edit } from '@/routes/appearance';
import { Paintbrush } from 'lucide-vue-next';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Appearance settings',
                href: edit(),
            },
        ],
    },
});
</script>

<template>
    <Head title="Appearance | Almond-Blossoms" />

    <div class="p-8 sm:p-12">
        <div
            class="mb-8 flex items-center gap-3 border-b border-brand-rose/10 pb-4"
        >
            <Paintbrush class="h-5 w-5 text-brand-rose" />
            <h2 class="font-serif text-2xl text-brand-wine">Dashboard Theme</h2>
        </div>

        <!-- Injects the existing Appearance Tabs provided by your starter kit -->
        <AppearanceTabs />
    </div>
</template>
