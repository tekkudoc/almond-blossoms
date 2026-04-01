<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import {
    ImagePlus,
    ArrowLeft,
    CheckCircle2,
    ListOrdered,
    FileText,
} from 'lucide-vue-next';

defineOptions({ layout: AppLayout });

const breadcrumbs = [
    { title: 'Celebrations', href: '/admin/celebrations' },
    { title: 'New Portfolio Entry', href: '/admin/celebrations/create' },
];

const form = useForm({
    title: '',
    description: '',
    featured_image: null,
    sort_order: 0,
});

const imagePreview = ref(null);
const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.featured_image = file;
        imagePreview.value = URL.createObjectURL(file);
    }
};

const submit = () => {
    form.post('/admin/celebrations');
};
</script>

<template>
    <Head title="Add Celebration" />

    <div class="mx-auto w-full max-w-7xl p-6 md:p-10">
        <!-- Back Button & Header -->
        <div class="mb-8 flex items-center justify-between">
            <Link
                href="/admin/celebrations"
                class="flex w-max items-center gap-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/60 uppercase transition-colors hover:text-brand-wine"
            >
                <ArrowLeft class="h-4 w-4" /> Back to Portfolio
            </Link>
        </div>

        <!-- TWO COLUMN LAYOUT -->
        <form
            @submit.prevent="submit"
            class="flex flex-col items-start gap-8 lg:flex-row lg:gap-12"
        >
            <!-- LEFT: THE MAIN CONTENT -->
            <div class="flex w-full flex-col gap-8 lg:w-2/3">
                <!-- Title Card -->
                <div
                    class="rounded-lg border border-brand-rose/10 bg-white p-8 shadow-lg"
                >
                    <label
                        for="title"
                        class="mb-2 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/60 uppercase"
                        >Celebration Title</label
                    >
                    <input
                        v-model="form.title"
                        type="text"
                        id="title"
                        class="w-full border-none bg-transparent p-0 font-serif text-3xl text-brand-wine outline-none placeholder:text-brand-wine/20 focus:ring-0 md:text-4xl"
                        placeholder="e.g. Engagement Parties"
                    />
                    <p
                        v-if="form.errors.title"
                        class="mt-2 text-xs text-red-500"
                    >
                        {{ form.errors.title }}
                    </p>
                </div>

                <!-- Description Card -->
                <div
                    class="rounded-lg border border-brand-rose/10 bg-white p-8 shadow-lg"
                >
                    <label
                        for="description"
                        class="mb-4 block text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine/60 uppercase"
                        >Description (Optional)</label
                    >
                    <textarea
                        v-model="form.description"
                        id="description"
                        rows="4"
                        class="w-full resize-none rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-4 text-sm font-light shadow-inner outline-none focus:ring-1 focus:ring-brand-wine"
                        placeholder="A short, optional description for SEO or future detail pages..."
                    ></textarea>
                </div>
            </div>

            <!-- RIGHT: THE STICKY SIDEBAR -->
            <div class="w-full lg:w-1/3">
                <div class="sticky top-24 flex flex-col gap-6">
                    <!-- Publish Card -->
                    <div
                        class="rounded-lg border border-brand-rose/30 bg-brand-blush/80 p-6 shadow-2xl backdrop-blur-xl"
                    >
                        <h3
                            class="mb-6 border-b border-brand-rose/20 pb-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase"
                        >
                            Publish
                        </h3>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="flex w-full items-center justify-center gap-2 rounded-sm bg-brand-wine px-6 py-4 text-[0.65rem] font-bold tracking-[0.2em] text-brand-light uppercase shadow-md transition-all hover:bg-brand-rose disabled:opacity-50"
                        >
                            <CheckCircle2 class="h-4 w-4" />
                            {{
                                form.processing
                                    ? 'Saving...'
                                    : 'Save Celebration'
                            }}
                        </button>
                    </div>

                    <!-- Attributes Card -->
                    <div
                        class="rounded-lg border border-brand-rose/20 bg-white p-6 shadow-lg"
                    >
                        <h3
                            class="mb-6 border-b border-brand-rose/20 pb-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase"
                        >
                            Attributes
                        </h3>
                        <div class="flex flex-col gap-2">
                            <label
                                for="sort_order"
                                class="flex items-center gap-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/80 uppercase"
                            >
                                <ListOrdered class="h-4 w-4 text-brand-rose" />
                                Sort Order
                            </label>
                            <p
                                class="mb-2 text-xs font-light text-brand-wine/50"
                            >
                                Controls the order in the masonry grid (1 is
                                first).
                            </p>
                            <input
                                type="number"
                                v-model="form.sort_order"
                                id="sort_order"
                                class="w-full rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-3 text-sm font-light shadow-inner outline-none focus:ring-1 focus:ring-brand-wine"
                            />
                            <p
                                v-if="form.errors.sort_order"
                                class="mt-1 text-xs text-red-500"
                            >
                                {{ form.errors.sort_order }}
                            </p>
                        </div>
                    </div>

                    <!-- Featured Image Card -->
                    <div
                        class="rounded-lg border border-brand-rose/20 bg-white p-6 shadow-lg"
                    >
                        <h3
                            class="mb-6 border-b border-brand-rose/20 pb-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase"
                        >
                            Featured Image
                        </h3>
                        <label
                            class="group relative flex aspect-video w-full cursor-pointer flex-col items-center justify-center overflow-hidden rounded-sm border-2 border-dashed border-brand-rose/40 bg-brand-blush/30 transition-all hover:border-brand-wine hover:bg-brand-light/50"
                        >
                            <img
                                v-if="imagePreview"
                                :src="imagePreview"
                                class="absolute inset-0 h-full w-full object-cover opacity-90 transition-opacity group-hover:opacity-60"
                                alt="Image Preview"
                            />
                            <div class="relative z-10 p-4 text-center">
                                <UploadCloud
                                    class="mx-auto mb-3 h-8 w-8 text-brand-rose/50 transition-colors group-hover:text-brand-wine"
                                />
                                <span
                                    class="text-[0.65rem] font-semibold tracking-[0.15em] text-brand-wine/60 uppercase transition-colors group-hover:text-brand-wine"
                                >
                                    {{
                                        imagePreview
                                            ? 'Change Image'
                                            : 'Upload Image'
                                    }}
                                </span>
                            </div>
                            <input
                                type="file"
                                @change="handleImageUpload"
                                class="hidden"
                                accept="image/*"
                            />
                        </label>
                        <div
                            v-if="form.featured_image"
                            class="mt-3 truncate text-center text-xs text-brand-wine/70"
                        >
                            {{ form.featured_image.name }}
                        </div>
                        <progress
                            v-if="form.progress"
                            :value="form.progress.percentage"
                            max="100"
                            class="mt-2 w-full"
                        ></progress>
                        <p
                            v-if="form.errors.featured_image"
                            class="mt-2 text-center text-xs text-red-500"
                        >
                            {{ form.errors.featured_image }}
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
