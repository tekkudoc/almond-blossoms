<script setup>
import { ref, watch } from 'vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import { CheckCircle, X, Globe, Phone, Share2 } from 'lucide-vue-next';

defineOptions({ layout: AppLayout });

const props = defineProps({ settings: Object });

// Toast Notification Logic
const page = usePage();
const flashMessage = ref(null);
watch(() => page.props.flash?.success, (msg) => {
    if (msg) {
        flashMessage.value = msg;
        setTimeout(() => flashMessage.value = null, 5000);
    }
}, { immediate: true });

// Tab Management (Removed Profile/Security)
const activeTab = ref('brand');
const tabs = [
    { id: 'brand', name: 'Brand Identity', icon: Globe },
    { id: 'contact', name: 'Public Contact', icon: Phone },
    { id: 'social', name: 'Social Media', icon: Share2 },
];

// Form setup
const form = useForm({
    brand_name: props.settings.brand_name || '',
    brand_tagline: props.settings.brand_tagline || '',
    contact_email: props.settings.contact_email || '',
    contact_phone: props.settings.contact_phone || '',
    contact_location: props.settings.contact_location || '',
    social_instagram: props.settings.social_instagram || '',
    social_pinterest: props.settings.social_pinterest || '',
});

const submit = () => {
    form.post(route('admin.settings.update'), {
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Settings | Almond-Blossoms" />

    <!-- SUCCESS TOAST -->
    <transition enter-active-class="transform transition duration-500 ease-out" enter-from-class="translate-y-10 opacity-0" enter-to-class="translate-y-0 opacity-100" leave-active-class="transition duration-300 ease-in" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <div v-if="flashMessage" class="fixed bottom-8 right-8 z-[100] bg-brand-wine text-brand-blush px-6 py-4 shadow-2xl rounded-sm flex items-center gap-4 border-l-4 border-brand-rose">
            <CheckCircle class="w-5 h-5 text-brand-rose" />
            <span class="text-xs font-semibold tracking-widest uppercase">{{ flashMessage }}</span>
            <button @click="flashMessage = null"><X class="w-4 h-4 opacity-50 hover:opacity-100" /></button>
        </div>
    </transition>

    <div class="max-w-7xl mx-auto p-6 md:p-10 w-full">

        <div class="mb-10">
            <h1 class="font-serif text-4xl md:text-5xl text-brand-wine mb-2">Settings</h1>
            <p class="text-brand-wine/60 text-sm tracking-wide font-light">Manage your brand identity and public contact details.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-12">

            <!-- LEFT: Vertical Tab Menu -->
            <div class="w-full lg:w-1/4">
                <nav class="flex flex-col gap-2 sticky top-24">
                    <button
                        v-for="tab in tabs" :key="tab.id"
                        @click="activeTab = tab.id"
                        class="flex items-center gap-3 px-6 py-4 rounded-sm text-left transition-all duration-300 group"
                        :class="activeTab === tab.id ? 'bg-brand-wine text-white shadow-md' : 'bg-transparent text-brand-wine/60 hover:bg-brand-rose/10 hover:text-brand-wine'"
                    >
                        <component :is="tab.icon" class="w-4 h-4" :class="activeTab === tab.id ? 'text-brand-rose' : 'text-brand-wine/40 group-hover:text-brand-rose'" />
                        <span class="text-[0.65rem] font-bold tracking-[0.2em] uppercase">{{ tab.name }}</span>
                    </button>
                </nav>
            </div>

            <!-- RIGHT: Settings Forms -->
            <div class="w-full lg:w-3/4">

                <form @submit.prevent="submit" class="bg-white shadow-[0_10px_40px_-10px_rgba(90,24,44,0.08)] rounded-md border border-brand-rose/20 overflow-hidden">

                    <!-- BRAND IDENTITY TAB -->
                    <div v-if="activeTab === 'brand'" class="p-8 sm:p-12">
                        <div class="mb-10 border-b border-brand-rose/20 pb-4">
                            <h2 class="font-serif text-3xl text-brand-wine">Brand Identity</h2>
                            <p class="text-xs text-brand-wine/50 font-light mt-1">These details appear in the global header and footer of your website.</p>
                        </div>

                        <div class="space-y-8">
                            <div>
                                <label class="block text-[0.65rem] font-bold tracking-widest uppercase text-brand-wine/80 mb-2">Brand Name</label>
                                <input v-model="form.brand_name" type="text" class="w-full text-sm font-light p-4 border border-brand-rose/30 rounded-sm bg-brand-blush/30 focus:ring-1 focus:ring-brand-wine focus:border-brand-wine outline-none transition-all shadow-inner" />
                            </div>
                            <div>
                                <label class="block text-[0.65rem] font-bold tracking-widest uppercase text-brand-wine/80 mb-2">Tagline</label>
                                <input v-model="form.brand_tagline" type="text" class="w-full text-sm font-light p-4 border border-brand-rose/30 rounded-sm bg-brand-blush/30 focus:ring-1 focus:ring-brand-wine focus:border-brand-wine outline-none transition-all shadow-inner" placeholder="e.g. Relaxed Celebrations & Cherished Memories" />
                            </div>
                        </div>
                    </div>

                    <!-- PUBLIC CONTACT TAB -->
                    <div v-if="activeTab === 'contact'" class="p-8 sm:p-12">
                        <div class="mb-10 border-b border-brand-rose/20 pb-4">
                            <h2 class="font-serif text-3xl text-brand-wine">Public Contact</h2>
                            <p class="text-xs text-brand-wine/50 font-light mt-1">This information is displayed to prospective clients.</p>
                        </div>

                        <div class="space-y-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label class="block text-[0.65rem] font-bold tracking-widest uppercase text-brand-wine/80 mb-2">Public Email</label>
                                    <input v-model="form.contact_email" type="email" class="w-full text-sm font-light p-4 border border-brand-rose/30 rounded-sm bg-brand-blush/30 focus:ring-1 focus:ring-brand-wine outline-none shadow-inner" />
                                    <p v-if="form.errors.contact_email" class="text-red-500 text-xs mt-1">{{ form.errors.contact_email }}</p>
                                </div>
                                <div>
                                    <label class="block text-[0.65rem] font-bold tracking-widest uppercase text-brand-wine/80 mb-2">Phone Number</label>
                                    <input v-model="form.contact_phone" type="tel" class="w-full text-sm font-light p-4 border border-brand-rose/30 rounded-sm bg-brand-blush/30 focus:ring-1 focus:ring-brand-wine outline-none shadow-inner" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-[0.65rem] font-bold tracking-widest uppercase text-brand-wine/80 mb-2">Location / Base</label>
                                <input v-model="form.contact_location" type="text" class="w-full text-sm font-light p-4 border border-brand-rose/30 rounded-sm bg-brand-blush/30 focus:ring-1 focus:ring-brand-wine outline-none shadow-inner" placeholder="e.g. Essex & Across U.K." />
                            </div>
                        </div>
                    </div>

                    <!-- SOCIAL MEDIA TAB -->
                    <div v-if="activeTab === 'social'" class="p-8 sm:p-12">
                        <div class="mb-10 border-b border-brand-rose/20 pb-4">
                            <h2 class="font-serif text-3xl text-brand-wine">Social Media</h2>
                            <p class="text-xs text-brand-wine/50 font-light mt-1">Connect your Instagram to the bottom of the Journal page.</p>
                        </div>

                        <div class="space-y-8">
                            <div>
                                <label class="block text-[0.65rem] font-bold tracking-widest uppercase text-brand-wine/80 mb-2">Instagram URL</label>
                                <input v-model="form.social_instagram" type="url" class="w-full text-sm font-light p-4 border border-brand-rose/30 rounded-sm bg-brand-blush/30 focus:ring-1 focus:ring-brand-wine outline-none shadow-inner" placeholder="https://instagram.com/..." />
                            </div>
                            <div>
                                <label class="block text-[0.65rem] font-bold tracking-widest uppercase text-brand-wine/80 mb-2">Pinterest URL (Optional)</label>
                                <input v-model="form.social_pinterest" type="url" class="w-full text-sm font-light p-4 border border-brand-rose/30 rounded-sm bg-brand-blush/30 focus:ring-1 focus:ring-brand-wine outline-none shadow-inner" placeholder="https://pinterest.com/..." />
                            </div>
                        </div>
                    </div>

                    <!-- Save Action Footer -->
                    <div class="bg-brand-light/30 border-t border-brand-rose/20 p-6 sm:px-12 flex justify-end">
                        <button type="submit" :disabled="form.processing" class="inline-flex items-center justify-center gap-2 bg-brand-wine text-brand-light px-10 py-4 text-[0.65rem] font-bold tracking-[0.2em] uppercase rounded-sm hover:bg-brand-rose transition-all shadow-md disabled:opacity-50">
                            <CheckCircle class="w-4 h-4" />
                            {{ form.processing ? 'Saving...' : 'Save Settings' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</template>
