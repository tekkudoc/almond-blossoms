<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import {
    Mail,
    BellDot,
    BookOpen,
    Eye,
    PenTool,
    ArrowRight,
    CalendarHeart,
} from 'lucide-vue-next';

defineOptions({ layout: AppLayout });

const props = defineProps({
    metrics: Object,
    recentInquiries: Array,
    recentDrafts: Array,
});

const currentDate = new Intl.DateTimeFormat('en-US', {
    weekday: 'long',
    month: 'long',
    day: 'numeric',
}).format(new Date());

const formatEventType = (type) => {
    const types = {
        wedding: 'Wedding',
        celebration: 'Event',
        creche: 'Creche',
        power_hour: 'Power Hour',
        other: 'Other',
    };
    return types[type] || type;
};
</script>

<template>
    <Head title="Dashboard | Almond-Blossoms" />

    <div class="mx-auto w-full max-w-[100rem] p-6 md:p-10 lg:p-12">
        <!-- ========================================== -->
        <!-- WELCOME SECTION                            -->
        <!-- ========================================== -->
        <div
            class="mb-12 flex flex-col items-start justify-between gap-6 md:flex-row md:items-end"
        >
            <div>
                <span
                    class="mb-4 block w-max border-b border-brand-rose/30 pb-2 text-xs font-semibold tracking-[0.25em] text-brand-rose uppercase"
                >
                    {{ currentDate }}
                </span>
                <h1
                    class="font-serif text-5xl leading-tight text-brand-wine md:text-6xl"
                >
                    Good morning,
                    <span class="font-light text-brand-mauve italic"
                        >Judith.</span
                    >
                </h1>
            </div>

            <!-- Quick Actions -->
            <div class="flex gap-4">
                <Link
                    href="/admin/posts/create"
                    class="inline-flex items-center gap-2 rounded-sm border border-brand-rose/30 bg-white px-6 py-3 text-[0.65rem] font-bold tracking-widest text-brand-wine uppercase shadow-sm transition-colors hover:bg-brand-light"
                >
                    <PenTool class="h-4 w-4" /> Write Story
                </Link>
                <a
                    href="/"
                    target="_blank"
                    class="inline-flex items-center gap-2 rounded-sm bg-brand-wine px-6 py-3 text-[0.65rem] font-bold tracking-widest text-brand-light uppercase shadow-md transition-colors hover:bg-brand-rose"
                >
                    <Eye class="h-4 w-4" /> View Site
                </a>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- KPI METRICS ROW                            -->
        <!-- ========================================== -->
        <div class="mb-16 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Unread Inquiries (Highlight Card) -->
            <div
                class="group relative flex flex-col justify-center overflow-hidden rounded-lg border border-brand-rose/20 bg-brand-wine p-8 shadow-xl"
            >
                <div
                    class="absolute -top-4 -right-4 h-24 w-24 rounded-full bg-brand-rose/20 transition-transform duration-700 group-hover:scale-150"
                ></div>
                <div class="relative z-10">
                    <span
                        class="mb-3 block text-[0.65rem] font-bold tracking-widest text-brand-rose uppercase"
                        >Unread Leads</span
                    >
                    <div class="flex items-center gap-4">
                        <span class="font-serif text-5xl text-brand-light">{{
                            metrics.unread_inquiries
                        }}</span>
                        <BellDot
                            v-if="metrics.unread_inquiries > 0"
                            class="h-5 w-5 animate-pulse text-brand-rose"
                        />
                    </div>
                </div>
            </div>

            <!-- Total Inquiries -->
            <div
                class="flex flex-col justify-center rounded-lg border border-brand-rose/10 bg-white p-8 shadow-sm"
            >
                <div class="mb-3 flex items-center gap-3">
                    <Mail class="h-4 w-4 text-brand-rose/50" />
                    <span
                        class="text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                        >Total Inquiries</span
                    >
                </div>
                <span class="font-serif text-4xl text-brand-wine">{{
                    metrics.total_inquiries
                }}</span>
            </div>

            <!-- Published Stories -->
            <div
                class="flex flex-col justify-center rounded-lg border border-brand-rose/10 bg-white p-8 shadow-sm"
            >
                <div class="mb-3 flex items-center gap-3">
                    <BookOpen class="h-4 w-4 text-brand-rose/50" />
                    <span
                        class="text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                        >Published Stories</span
                    >
                </div>
                <span class="font-serif text-4xl text-brand-wine">{{
                    metrics.published_posts
                }}</span>
            </div>

            <!-- Total Read Views -->
            <div
                class="flex flex-col justify-center rounded-lg border border-brand-rose/10 bg-white p-8 shadow-sm"
            >
                <div class="mb-3 flex items-center gap-3">
                    <Eye class="h-4 w-4 text-brand-rose/50" />
                    <span
                        class="text-[0.65rem] font-bold tracking-widest text-brand-wine/50 uppercase"
                        >Total Journal Views</span
                    >
                </div>
                <span class="font-serif text-4xl text-brand-wine">{{
                    metrics.total_views.toLocaleString()
                }}</span>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- TWO COLUMN FOCUS AREA                      -->
        <!-- ========================================== -->
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-16">
            <!-- LEFT: Recent Inquiries -->
            <div>
                <div
                    class="mb-8 flex items-center justify-between border-b border-brand-rose/20 pb-4"
                >
                    <h2 class="font-serif text-3xl text-brand-wine">
                        Recent Inquiries
                    </h2>
                    <Link
                        href="/admin/inquiries"
                        class="flex items-center gap-2 text-[0.65rem] font-bold tracking-widest text-brand-rose uppercase transition-colors hover:text-brand-wine"
                    >
                        View All Inbox <ArrowRight class="h-3 w-3" />
                    </Link>
                </div>

                <div
                    v-if="recentInquiries.length === 0"
                    class="rounded-lg border border-brand-rose/10 bg-white p-12 text-center text-brand-wine/40 shadow-sm"
                >
                    <Mail class="mx-auto mb-4 h-8 w-8 opacity-50" />
                    <p class="font-serif text-xl">Your inbox is clear.</p>
                </div>

                <ul
                    v-else
                    class="divide-y divide-brand-rose/10 overflow-hidden rounded-lg border border-brand-rose/10 bg-white shadow-sm"
                >
                    <li
                        v-for="inquiry in recentInquiries"
                        :key="inquiry.id"
                        class="group flex cursor-pointer items-center justify-between p-6 transition-colors hover:bg-brand-light/30"
                        :class="
                            inquiry.status === 'unread'
                                ? 'border-l-4 border-brand-rose bg-brand-blush/50'
                                : 'border-l-4 border-transparent'
                        "
                    >
                        <div class="flex items-center gap-4">
                            <div
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-light"
                            >
                                <CalendarHeart
                                    v-if="inquiry.event_type === 'wedding'"
                                    class="h-4 w-4 text-brand-rose"
                                />
                                <Mail v-else class="h-4 w-4 text-brand-rose" />
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="font-serif text-xl"
                                    :class="
                                        inquiry.status === 'unread'
                                            ? 'font-semibold text-brand-wine'
                                            : 'text-brand-wine/80'
                                    "
                                    >{{ inquiry.name }}</span
                                >
                                <div
                                    class="mt-1 flex items-center gap-2 text-[0.6rem] font-bold tracking-widest uppercase"
                                >
                                    <span class="text-brand-rose">{{
                                        formatEventType(inquiry.event_type)
                                    }}</span>
                                    <span class="text-brand-wine/30"
                                        >&bull;</span
                                    >
                                    <span class="text-brand-mauve">{{
                                        inquiry.date
                                    }}</span>
                                </div>
                            </div>
                        </div>
                        <Link
                            href="/admin/inquiries"
                            class="rounded-sm bg-brand-rose/10 px-4 py-2 text-xs font-semibold tracking-widest text-brand-wine uppercase opacity-0 transition-opacity group-hover:opacity-100 hover:bg-brand-rose hover:text-white"
                        >
                            Reply
                        </Link>
                    </li>
                </ul>
            </div>

            <!-- RIGHT: Draft Stories -->
            <div>
                <div
                    class="mb-8 flex items-center justify-between border-b border-brand-rose/20 pb-4"
                >
                    <h2 class="font-serif text-3xl text-brand-wine">
                        Finish Writing
                    </h2>
                    <Link
                        href="/admin/posts"
                        class="flex items-center gap-2 text-[0.65rem] font-bold tracking-widest text-brand-rose uppercase transition-colors hover:text-brand-wine"
                    >
                        View Journal <ArrowRight class="h-3 w-3" />
                    </Link>
                </div>

                <div
                    v-if="recentDrafts.length === 0"
                    class="rounded-lg border border-brand-rose/10 bg-white p-12 text-center text-brand-wine/40 shadow-sm"
                >
                    <PenTool class="mx-auto mb-4 h-8 w-8 opacity-50" />
                    <p class="font-serif text-xl">No drafts pending.</p>
                    <p class="mt-1 text-sm font-light">
                        You are all caught up on your stories!
                    </p>
                </div>

                <ul
                    v-else
                    class="divide-y divide-brand-rose/10 overflow-hidden rounded-lg border border-brand-rose/10 bg-white shadow-sm"
                >
                    <li
                        v-for="draft in recentDrafts"
                        :key="draft.id"
                        class="group flex items-center justify-between p-6 transition-colors hover:bg-brand-light/30"
                    >
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col">
                                <span
                                    class="line-clamp-1 font-serif text-xl text-brand-wine/80 transition-colors group-hover:text-brand-wine"
                                    >{{ draft.title || 'Untitled Story' }}</span
                                >
                                <div
                                    class="mt-1 flex items-center gap-2 text-[0.6rem] font-bold tracking-widest uppercase"
                                >
                                    <span class="text-brand-rose">{{
                                        draft.category
                                    }}</span>
                                    <span class="text-brand-wine/30"
                                        >&bull;</span
                                    >
                                    <span class="text-brand-mauve"
                                        >Edited {{ draft.date }}</span
                                    >
                                </div>
                            </div>
                        </div>
                        <Link
                            :href="`/admin/posts/${draft.id}/edit`"
                            class="rounded-sm border border-brand-wine/20 px-4 py-2 text-xs font-semibold tracking-widest text-brand-wine uppercase opacity-0 transition-opacity group-hover:opacity-100 hover:bg-brand-light"
                        >
                            Continue
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
