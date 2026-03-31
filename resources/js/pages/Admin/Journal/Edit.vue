<script setup>
import { ref } from 'vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import {
    ImagePlus,
    ArrowLeft,
    CheckCircle2,
    UploadCloud,
    Calendar,
    Pen,
} from 'lucide-vue-next';

defineOptions({ layout: AppLayout });

const props = defineProps({ post: Object });

const currentDate = new Intl.DateTimeFormat('en-US', {
    month: 'long',
    day: 'numeric',
    year: 'numeric',
}).format(new Date());

const form = useForm({
    title: props.post.title,
    content: props.post.content,
    excerpt: props.post.excerpt || '',
    category: props.post.category,
    status: props.post.status,
    featured_image: null,
    seo_title: props.post.seo_title || '',
    seo_description: props.post.seo_description || '',
});

const submit = () => {
    const data = {
        _method: 'put',
        title: form.title,
        content: form.content,
        excerpt: form.excerpt,
        category: form.category,
        status: form.status,
        seo_title: form.seo_title,
        seo_description: form.seo_description,
    };

    if (form.featured_image) {
        data.featured_image = form.featured_image;
    }

    router.post(`/admin/posts/${props.post.id}`, data, {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            form.featured_image = null;
        },
    });
};

const toggleStatus = () => {
    form.status = form.status === 'draft' ? 'published' : 'draft';
};

const imagePreview = ref(props.post.image_url);
const handleImageUpload = (e) => {
    const file = e.target.files[0];
    if (file) {
        form.featured_image = file;
        imagePreview.value = URL.createObjectURL(file);
    }
};
</script>

<template>
    <Head :title="'Edit: ' + form.title" />

    <div class="mx-auto w-full max-w-[100rem] p-6 md:p-10 lg:p-12">
        <!-- Back Button (Top Left) -->
        <div class="mb-8">
            <Link
                href="/admin/posts"
                class="flex w-max items-center gap-2 text-[0.65rem] font-bold tracking-widest text-brand-wine/60 uppercase transition-colors hover:text-brand-wine"
            >
                <ArrowLeft class="h-4 w-4" /> Back to Journal
            </Link>
        </div>

        <!-- TWO COLUMN LAYOUT -->
        <form
            @submit.prevent="submit"
            class="flex flex-col items-start gap-8 lg:flex-row lg:gap-12"
        >
            <!-- ========================================== -->
            <!-- LEFT: THE MANUSCRIPT CANVAS                -->
            <!-- ========================================== -->
            <div class="w-full lg:w-2/3 xl:w-3/4">
                <div
                    class="overflow-hidden rounded-lg border border-brand-rose/10 bg-white shadow-[0_20px_60px_-15px_rgba(90,24,44,0.08)]"
                >
                    <!-- Cover Image -->
                    <label
                        class="group relative flex aspect-[21/9] w-full cursor-pointer flex-col items-center justify-center overflow-hidden border-b border-brand-rose/10 bg-brand-light/20"
                    >
                        <img
                            v-if="imagePreview"
                            :src="imagePreview"
                            class="absolute inset-0 h-full w-full object-cover opacity-90 transition-opacity group-hover:opacity-70"
                        />
                        <div
                            class="relative z-10 rounded-md bg-white/40 p-6 text-center opacity-0 backdrop-blur-md transition-all group-hover:opacity-100"
                        >
                            <ImagePlus
                                class="mx-auto mb-2 h-8 w-8 text-brand-wine/60"
                            />
                            <span
                                class="text-[0.65rem] font-bold tracking-widest text-brand-wine uppercase"
                                >Change Cover Image</span
                            >
                        </div>
                        <input
                            type="file"
                            @change="handleImageUpload"
                            class="hidden"
                            accept="image/*"
                        />
                    </label>

                    <!-- Editor Area -->
                    <div class="flex flex-col items-center p-8 sm:p-16">
                        <input
                            v-model="form.title"
                            type="text"
                            class="mb-12 w-full border-none text-center font-serif text-4xl leading-tight text-brand-wine outline-none placeholder:text-brand-wine/20 placeholder:italic focus:ring-0 md:text-5xl lg:text-6xl"
                            placeholder="Write a breathtaking title..."
                        />

                        <div class="editor-wrapper w-full">
                            <QuillEditor
                                v-model:content="form.content"
                                contentType="html"
                                theme="snow"
                                toolbar="essential"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- RIGHT: THE STICKY PUBLISHING SIDEBAR       -->
            <!-- ========================================== -->
            <div class="w-full lg:w-1/3 xl:w-1/4">
                <!-- Sticky container for the right sidebar panels -->
                <div class="sticky top-24 flex flex-col gap-6 pb-12">
                    <!-- Primary Publish Card -->
                    <div
                        class="rounded-lg border border-brand-rose/30 bg-brand-blush/80 p-6 shadow-2xl backdrop-blur-xl"
                    >
                        <h3
                            class="mb-6 border-b border-brand-rose/20 pb-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase"
                        >
                            Publishing
                        </h3>

                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="mb-8 flex w-full items-center justify-center gap-2 rounded-sm bg-brand-wine px-6 py-4 text-[0.65rem] font-bold tracking-[0.2em] text-brand-light uppercase shadow-md transition-all hover:bg-brand-rose disabled:opacity-50"
                        >
                            <CheckCircle2 class="h-4 w-4" />
                            {{ form.processing ? 'Saving...' : 'Update Story' }}
                        </button>

                        <div class="mb-6 flex items-center justify-between">
                            <span class="font-serif text-xl text-brand-wine"
                                >Status</span
                            >
                            <button
                                type="button"
                                @click="toggleStatus"
                                class="group flex items-center gap-3 focus:outline-none"
                            >
                                <span
                                    class="text-[0.65rem] font-semibold tracking-widest uppercase"
                                    :class="
                                        form.status === 'published'
                                            ? 'text-brand-wine'
                                            : 'text-brand-wine/40'
                                    "
                                    >{{ form.status }}</span
                                >
                                <div
                                    class="relative h-5 w-10 rounded-full transition-colors"
                                    :class="
                                        form.status === 'published'
                                            ? 'bg-brand-wine'
                                            : 'bg-brand-rose/30'
                                    "
                                >
                                    <div
                                        class="absolute top-0.5 left-0.5 h-4 w-4 rounded-full bg-white transition-transform"
                                        :class="
                                            form.status === 'published'
                                                ? 'translate-x-5'
                                                : 'translate-x-0'
                                        "
                                    ></div>
                                </div>
                            </button>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="font-serif text-xl text-brand-wine"
                                >Category</span
                            >
                            <select
                                v-model="form.category"
                                class="w-full cursor-pointer rounded-sm border border-brand-rose/30 bg-white p-3 text-sm font-light text-brand-wine/80 shadow-inner transition-all outline-none focus:border-brand-wine focus:ring-1 focus:ring-brand-wine"
                            >
                                <option value="Advice & Planning">
                                    Advice & Planning
                                </option>
                                <option value="Photography">Photography</option>
                                <option value="Styling & Design">
                                    Styling & Design
                                </option>
                                <option value="Real Weddings">
                                    Real Weddings
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Excerpt Card -->
                    <div
                        class="rounded-lg border border-brand-rose/20 bg-white p-6 shadow-lg"
                    >
                        <h3
                            class="mb-4 border-b border-brand-rose/20 pb-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase"
                        >
                            Story Excerpt
                        </h3>
                        <p class="mb-4 text-xs font-light text-brand-wine/50">
                            A brief, captivating summary for the journal index.
                        </p>
                        <textarea
                            v-model="form.excerpt"
                            rows="4"
                            class="w-full resize-none rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-4 text-sm font-light shadow-inner transition-all focus:ring-1 focus:ring-brand-wine focus:outline-none"
                            placeholder="Write a summary..."
                        ></textarea>
                    </div>

                    <!-- SEO Optimization Card -->
                    <div
                        class="rounded-lg border border-brand-rose/20 bg-white p-6 shadow-lg"
                    >
                        <h3
                            class="mb-4 border-b border-brand-rose/20 pb-3 text-[0.65rem] font-bold tracking-[0.2em] text-brand-wine uppercase"
                        >
                            SEO Optimization
                        </h3>

                        <div class="space-y-4">
                            <div>
                                <label
                                    class="mb-2 block text-[0.65rem] font-bold tracking-widest text-brand-wine/80 uppercase"
                                    >Meta Title</label
                                >
                                <input
                                    v-model="form.seo_title"
                                    type="text"
                                    class="w-full rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-3 text-sm font-light shadow-inner transition-all focus:ring-1 focus:ring-brand-wine focus:outline-none"
                                    placeholder="Optional meta title..."
                                />
                            </div>
                            <div>
                                <label
                                    class="mb-2 block text-[0.65rem] font-bold tracking-widest text-brand-wine/80 uppercase"
                                    >Meta Description</label
                                >
                                <textarea
                                    v-model="form.seo_description"
                                    rows="3"
                                    class="w-full resize-none rounded-sm border border-brand-rose/30 bg-brand-blush/30 p-3 text-sm font-light shadow-inner transition-all focus:ring-1 focus:ring-brand-wine focus:outline-none"
                                    placeholder="Optional meta description..."
                                ></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Meta Info Card (Read only) -->
                    <div
                        class="flex flex-col gap-3 rounded-lg border border-brand-rose/20 bg-transparent p-6 text-brand-wine/50"
                    >
                        <div class="flex items-center justify-between">
                            <span
                                class="text-[0.65rem] font-bold tracking-widest uppercase"
                                >Author</span
                            >
                            <span
                                class="font-serif text-sm text-brand-wine italic"
                                >Judith</span
                            >
                        </div>
                        <div class="flex items-center justify-between">
                            <span
                                class="text-[0.65rem] font-bold tracking-widest uppercase"
                                >Last Edited</span
                            >
                            <span class="font-serif text-sm italic">{{
                                currentDate
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<style>
/* Clean Quill Customization */
.editor-wrapper {
    width: 100%;
    max-width: 100%;
}
.editor-wrapper .ql-container.ql-snow {
    border: none !important;
    background: transparent;
}
.editor-wrapper .ql-toolbar.ql-snow {
    border: none !important;
    border-bottom: 1px solid rgba(205, 159, 174, 0.4) !important;
    background-color: transparent;
    padding: 0 0 16px 0;
    margin-bottom: 32px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    width: 100%;
}
.editor-wrapper .ql-editor {
    padding: 0;
    min-height: 500px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 300;
    font-size: 1.15rem;
    color: #3d0d1c;
    line-height: 1.9;
}
.editor-wrapper .ql-editor.ql-blank::before {
    color: rgba(162, 118, 129, 0.4);
    font-style: italic;
    left: 0;
    text-align: center;
    width: 100%;
    font-size: 1.5rem;
    font-family: 'Cormorant Garamond', serif;
}
.editor-wrapper .ql-editor h1,
.editor-wrapper .ql-editor h2 {
    font-family: 'Cormorant Garamond', serif;
    color: #5a182c;
    font-weight: 400;
    margin-top: 3rem;
    margin-bottom: 1.5rem;
}
.editor-wrapper .ql-editor h1 {
    font-size: 3rem;
    line-height: 1.1;
}
.editor-wrapper .ql-editor h2 {
    font-size: 2.25rem;
    line-height: 1.2;
    border-bottom: 1px solid rgba(205, 159, 174, 0.2);
    padding-bottom: 0.5rem;
}
.editor-wrapper .ql-editor blockquote {
    border-left: none;
    padding: 2rem 3rem;
    font-family: 'Cormorant Garamond', serif;
    font-style: italic;
    font-size: 1.75rem;
    color: #5a182c;
    margin: 3rem 0;
    text-align: center;
    position: relative;
    background: rgba(245, 230, 232, 0.3);
    border-radius: 4px;
}
.editor-wrapper .ql-editor blockquote::before {
    content: '"';
    position: absolute;
    top: -1rem;
    left: 50%;
    transform: translateX(-50%);
    font-size: 4rem;
    color: rgba(205, 159, 174, 0.3);
    font-family: serif;
    line-height: 1;
}
.editor-wrapper .ql-snow .ql-picker.ql-expanded .ql-picker-label,
.editor-wrapper .ql-snow .ql-picker.ql-expanded .ql-picker-label .ql-stroke,
.editor-wrapper .ql-snow .ql-toolbar button:hover .ql-stroke,
.editor-wrapper .ql-snow .ql-toolbar button.ql-active .ql-stroke {
    stroke: #5a182c !important;
}
.editor-wrapper .ql-snow .ql-toolbar button:hover .ql-fill,
.editor-wrapper .ql-snow .ql-toolbar button.ql-active .ql-fill {
    fill: #5a182c !important;
}
</style>
