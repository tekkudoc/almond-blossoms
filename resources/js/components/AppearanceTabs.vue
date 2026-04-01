<script setup lang="ts">
import { Monitor, Moon, Sun } from 'lucide-vue-next';
import { useAppearance } from '@/composables/useAppearance';

const { appearance, updateAppearance } = useAppearance();

const tabs = [
    { value: 'light', Icon: Sun, label: 'Light' },
    { value: 'dark', Icon: Moon, label: 'Dark' },
    { value: 'system', Icon: Monitor, label: 'System' },
] as const;
</script>

<template>
    <!-- Outer container: Soft blush background with a delicate rose border -->
    <div
        class="inline-flex gap-2 rounded-sm border border-brand-rose/20 bg-brand-light/50 p-1.5 shadow-inner"
    >
        <button
            v-for="{ value, Icon, label } in tabs"
            :key="value"
            @click="updateAppearance(value)"
            :class="[
                'flex items-center justify-center rounded-sm px-6 py-2.5 transition-all duration-300 focus:outline-none',
                appearance === value
                    ? 'border border-brand-rose/30 bg-white font-semibold text-brand-wine shadow-[0_2px_10px_-2px_rgba(90,24,44,0.15)]'
                    : 'border border-transparent bg-transparent font-medium text-brand-wine/50 hover:bg-brand-rose/10 hover:text-brand-wine',
            ]"
        >
            <!-- Icon -->
            <component
                :is="Icon"
                class="-ml-1 h-4 w-4 transition-colors duration-300"
                :class="
                    appearance === value
                        ? 'text-brand-rose'
                        : 'text-brand-wine/40 group-hover:text-brand-rose'
                "
            />

            <!-- Text label styled with elegant tracking -->
            <span class="ml-2 text-[0.65rem] tracking-widest uppercase">
                {{ label }}
            </span>
        </button>
    </div>
</template>
