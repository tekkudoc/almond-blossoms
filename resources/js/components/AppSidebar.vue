<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
    LayoutGrid,
    PenTool,
    CalendarHeart,
    Users,
    Settings2,
    Globe,
} from 'lucide-vue-next';
import {
    Sidebar,
    // ❌ Remove SidebarProvider from here
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';

import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import NavFooter from '@/components/NavFooter.vue';

import { dashboard } from '@/routes';
import type { NavItem } from '@/types';

const mainNavItems: NavItem[] = [
    { title: 'Overview', href: dashboard(), icon: LayoutGrid },
    { title: 'The Journal', href: '/admin/posts', icon: PenTool },
    { title: 'Celebrations', href: '/admin/events', icon: CalendarHeart },
    { title: 'Inquiries', href: '/admin/inquiries', icon: Users },
];

const footerNavItems: NavItem[] = [
    { title: 'View Live Site', href: '/', icon: Globe },
    { title: 'Settings', href: '/admin/settings', icon: Settings2 },
];
</script>

<template>
    <!-- ❌ No SidebarProvider here — it lives in AppSidebarLayout.vue -->
    <Sidebar
        collapsible="icon"
        variant="sidebar"
        class="border-r border-brand-rose/10 bg-brand-dark"
    >
        <SidebarHeader class="border-b border-brand-rose/10 py-6">
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child class="transition-colors hover:bg-brand-wine/50">
                        <Link :href="dashboard()" class="flex items-center gap-3">
                            <div class="flex aspect-square size-8 items-center justify-center rounded-sm bg-brand-rose text-brand-dark">
                                <span class="font-serif text-xs font-bold italic">AB</span>
                            </div>
                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-serif text-lg font-semibold text-brand-blush">Almond-Blossoms</span>
                                <span class="truncate text-[0.6rem] tracking-widest text-brand-rose/70 uppercase">Management</span>
                            </div>
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent class="px-2 py-4">
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter class="border-t border-brand-rose/10 pt-4 pb-4">
            <NavFooter :items="footerNavItems" />
            <div class="mt-4 px-2">
                <NavUser />
            </div>
        </SidebarFooter>
    </Sidebar>
</template>

<style>
/* Keep all your existing styles unchanged */
[data-sidebar='menu-button'] { color: #cd9fae !important; transition: all 0.3s ease; }
[data-sidebar='menu-button'] svg { color: #a27681 !important; transition: all 0.3s ease; }
[data-sidebar='menu-button']:hover,
[data-sidebar='menu-button'][data-active='true'] { background-color: #5a182c !important; color: #fdfafb !important; }
[data-sidebar='menu-button']:hover svg,
[data-sidebar='menu-button'][data-active='true'] svg { color: #cd9fae !important; }
:root { --sidebar-background: #3d0d1c !important; --sidebar-border: rgba(205, 159, 174, 0.1) !important; }
.sidebar-menu-button { font-family: 'Montserrat', sans-serif; letter-spacing: 0.05em; }
</style>
