<script lang="ts" setup>
import BreezeButton from '@components/Breeze/Button.vue';
import BreezeGuestLayout from '@layouts/Guest.vue';
import BreezeInput from '@components/Breeze/Input.vue';
import BreezeLabel from '@components/Breeze/Label.vue';
import BreezeSubmit from '@components/Breeze/Submit.vue';
import BreezeValidationErrors from '@components/Breeze/ValidationErrors.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import route from 'ziggy-js';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    })
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Confirm Password" />

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <BreezeValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4 gap-x-5">
                <BreezeSubmit :form="form">
                    Confirm
                </BreezeSubmit>
            </div>
        </form>
    </BreezeGuestLayout>
</template>
