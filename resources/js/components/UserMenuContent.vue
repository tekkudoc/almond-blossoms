<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { LogOut, Settings } from 'lucide-vue-next';
import {
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
} from '@/components/ui/dropdown-menu';
import UserInfo from '@/components/UserInfo.vue';
import { logout } from '@/routes';
import { edit } from '@/routes/profile';
import type { User } from '@/types';

type Props = {
    user: User;
};

// This logout handler is not needed as Inertia's method="post" handles this.
// const handleLogout = () => {
//     router.flushAll();
// };

defineProps<Props>();
</script>

<template>
    <!-- Label section for user info -->
    <DropdownMenuLabel class="px-3 pt-2 pb-3 font-normal">
        <div class="flex items-center gap-3 text-left">
            <UserInfo :user="user" :show-email="true" />
        </div>
    </DropdownMenuLabel>

    <DropdownMenuSeparator class="my-1 h-px bg-brand-rose/20" />

    <!-- Action items -->
    <DropdownMenuGroup class="p-1">
        <DropdownMenuItem as-child>
            <Link :href="edit()" class="user-dropdown-item">
                <Settings class="size-4 text-brand-rose/70" />
                <span>Settings</span>
            </Link>
        </DropdownMenuItem>
    </DropdownMenuGroup>

    <DropdownMenuSeparator class="my-1 h-px bg-brand-rose/20" />

    <DropdownMenuItem as-child>
        <Link
            :href="logout()"
            method="post"
            as="button"
            data-test="logout-button"
            class="user-dropdown-item w-full"
        >
            <LogOut class="size-4 text-brand-rose/70" />
            <span>Log out</span>
        </Link>
    </DropdownMenuItem>
</template>

<style scoped>
/* Ensure any local styles are overriden by the parent's global classes */
.user-dropdown-item {
    cursor: pointer;
}
</style>
