<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import PublicLayout from '@/Layouts/PublicLayout.vue';

defineOptions({
    layout: PublicLayout,
});

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

// Shared classes for the high-end "Line" input style
const inputClasses =
    'w-full bg-transparent border-t-0 border-x-0 border-b border-brand-rose/30 rounded-none px-0 py-4 text-brand-wine font-sans font-light text-base transition-all duration-500 focus:outline-none focus:ring-0 focus:border-brand-wine placeholder:text-brand-wine/20 placeholder:uppercase placeholder:tracking-[0.2em] placeholder:text-[0.6rem]';
</script>

<template>
    <Head title="Login | Management Portal" />

    <section
        class="relative flex min-h-screen w-full flex-col bg-brand-blush pt-24 lg:flex-row lg:pt-0"
    >
        <!-- LEFT: Visual Anchor (Sticky on Desktop) -->
        <div
            class="fade-up relative h-[35vh] w-full overflow-hidden lg:sticky lg:top-0 lg:h-screen lg:w-5/12"
        >
            <img
                src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=1200&auto=format&fit=crop"
                class="h-full w-full object-cover object-center contrast-[1.1] grayscale-[20%]"
                alt="Management Portal Visual"
            />
            <div
                class="absolute inset-0 bg-brand-wine/20 mix-blend-multiply"
            ></div>

            <!-- Elegant Watermark Text -->
            <div
                class="pointer-events-none absolute inset-0 z-10 flex items-center justify-center"
            >
                <span
                    class="-rotate-90 transform font-serif text-7xl tracking-[0.2em] text-brand-blush/20 uppercase italic lg:rotate-0 lg:text-9xl"
                    >Portal</span
                >
            </div>
        </div>

        <!-- RIGHT: The Login Interaction -->
        <div
            class="fade-up flex w-full items-center justify-center px-6 py-16 lg:w-7/12 lg:px-24 lg:py-40"
        >
            <div class="w-full max-w-md">
                <!-- Branding Header -->
                <div class="mb-16">
                    <span
                        class="mb-6 block text-[0.65rem] font-bold tracking-[0.3em] text-brand-rose uppercase"
                        >Internal Management</span
                    >
                    <h1
                        class="mb-6 font-serif text-5xl leading-none text-brand-wine lg:text-6xl"
                    >
                        Welcome Back
                    </h1>
                    <p
                        class="text-sm leading-relaxed font-light text-brand-wine/60"
                    >
                        Please enter your credentials to access the
                        Almond-Blossoms event management dashboard.
                    </p>
                </div>

                <!-- Success Status -->
                <div
                    v-if="status"
                    class="mb-8 border-l-2 border-green-500 bg-green-50/50 p-4 text-sm font-medium text-green-700 italic"
                >
                    {{ status }}
                </div>

                <Form
                    v-bind="store.form()"
                    :reset-on-success="['password']"
                    v-slot="{ errors, processing }"
                    class="flex flex-col gap-10"
                >
                    <div class="grid gap-10">
                        <!-- Email Address -->
                        <div class="grid gap-2">
                            <Label
                                for="email"
                                class="text-[0.6rem] font-bold tracking-[0.2em] text-brand-wine/50 uppercase"
                                >Email Address</Label
                            >
                            <Input
                                id="email"
                                type="email"
                                name="email"
                                required
                                autofocus
                                :tabindex="1"
                                autocomplete="email"
                                placeholder="name@almond-blossoms.com"
                                :class="inputClasses"
                            />
                            <InputError
                                :message="errors.email"
                                class="text-[0.7rem] italic"
                            />
                        </div>

                        <!-- Password -->
                        <div class="grid gap-2">
                            <div class="flex items-center justify-between">
                                <Label
                                    for="password"
                                    class="text-[0.6rem] font-bold tracking-[0.2em] text-brand-wine/50 uppercase"
                                    >Password</Label
                                >
                                <TextLink
                                    v-if="canResetPassword"
                                    :href="request()"
                                    class="text-[0.6rem] tracking-[0.15em] text-brand-rose uppercase transition-all hover:text-brand-wine"
                                    :tabindex="5"
                                >
                                    Forgot?
                                </TextLink>
                            </div>
                            <PasswordInput
                                id="password"
                                name="password"
                                required
                                :tabindex="2"
                                autocomplete="current-password"
                                placeholder="••••••••"
                                :class="inputClasses"
                            />
                            <InputError
                                :message="errors.password"
                                class="text-[0.7rem] italic"
                            />
                        </div>

                        <!-- Secondary Actions -->
                        <div class="flex items-center justify-between">
                            <Label
                                for="remember"
                                class="group flex cursor-pointer items-center space-x-3"
                            >
                                <Checkbox
                                    id="remember"
                                    name="remember"
                                    :tabindex="3"
                                    class="border-brand-rose/40 data-[state=checked]:border-brand-wine data-[state=checked]:bg-brand-wine"
                                />
                                <span
                                    class="text-[0.65rem] font-medium tracking-[0.2em] text-brand-wine/60 uppercase transition-colors group-hover:text-brand-wine"
                                    >Keep me logged in</span
                                >
                            </Label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <Button
                                type="submit"
                                class="h-auto w-full rounded-none bg-brand-wine py-5 text-[0.7rem] font-bold tracking-[0.3em] text-brand-blush uppercase shadow-2xl transition-all duration-500 hover:bg-brand-rose disabled:opacity-30"
                                :tabindex="4"
                                :disabled="processing"
                            >
                                <Spinner v-if="processing" class="mr-3" />
                                <span>Sign In</span>
                            </Button>
                        </div>
                    </div>
                </Form>

                <!-- Simple branding mark at bottom -->
                <div
                    class="mt-20 flex justify-center border-t border-brand-rose/10 pt-8 opacity-30"
                >
                    <span class="font-serif text-xl text-brand-wine italic"
                        >AB</span
                    >
                </div>
            </div>
        </div>
    </section>
</template>
