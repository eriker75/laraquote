<script lang="ts" setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import route from 'ziggy-js';
import BreezeCheckbox from '@components/Breeze/Checkbox.vue';
import BreezeGuestLayout from '@layouts/Guest.vue';
import BreezeInput from '@components/Breeze/Input.vue';
import BreezeLabel from '@components/Breeze/Label.vue';
import BreezeSubmit from '@components/Breeze/Submit.vue';
import BreezeValidationErrors from '@components/Breeze/ValidationErrors.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Log in" />

        <BreezeValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <BreezeCheckbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <BreezeSubmit :form="form">
                    Log in
                </BreezeSubmit>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
