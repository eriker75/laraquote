<script lang="ts" setup>
import BreezeGuestLayout from '@layouts/Guest.vue';
import BreezeInput from '@components/Breeze/Input.vue';
import BreezeLabel from '@components/Breeze/Label.vue';
import BreezeSubmit from '@components/Breeze/Submit.vue';
import BreezeValidationErrors from '@components/Breeze/ValidationErrors.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import route from 'ziggy-js';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Forgot Password" />

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <BreezeSubmit :form="form">
                    Email Password Reset Link
                </BreezeSubmit>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
