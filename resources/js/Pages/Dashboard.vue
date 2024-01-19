<script lang="ts" setup>
import BreezeAuthenticatedLayout from '@layouts/Authenticated.vue';
import BreezeContentLayout from '@layouts/DashboardContent.vue';
import QuoteComponent from '@components/Quote.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{
                    'admin' !== 'admin' ?
                    "Aprove Favorite Quotes Requests" :
                    "Manage your favorite quotes"
                }}
            </h2>
        </template>
        <BreezeContentLayout>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="p-4">
                    <QuoteComponent />
                </div>
                <div class="p-4">
                    <QuoteComponent />
                </div>
                <div class="p-4">
                    <QuoteComponent />
                </div>
                <div class="p-4">
                    <QuoteComponent />
                </div>
                <div class="p-4">
                    <QuoteComponent />
                </div>
                <div class="p-4">
                    <QuoteComponent />
                </div>
                <div class="p-4">
                    <QuoteComponent />
                </div>
                <div class="p-4">
                    <QuoteComponent />
                </div>
            </div>
        </BreezeContentLayout>
    </BreezeAuthenticatedLayout>
</template>
