<script lang="ts" setup>
import { Quote } from '@definitions';
import BreezeAuthenticatedLayout from '@layouts/Authenticated.vue';
import BreezeDashboardLayout from '@layouts/DashboardContent.vue';
import QuoteComponent from '@components/Quote.vue';

interface Props {
    quotes: Quote[];
}

const props = defineProps<Props>()
</script>

<template>
    <Head title="Favorites" />
    <BreezeAuthenticatedLayout>
        <h1 class="
            mt-5
            text-center
            text-2xl
            font-bold
            text-gray-900
            sm:text-3xl
            sm:tracking-tight
            lg:text-4xl
            xl:text-5xl
        ">Favorites</h1>
        <BreezeDashboardLayout>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="p-4" v-for="({ quote, author, id }, index) in props.quotes">
                    <QuoteComponent :key="index" :quote="quote" :author="author" :id="id" />
                </div>
            </div>
            <div>
                <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                    <span class="ps-5">
                        <!-- Previous Page Link -->
                        <!-- Reemplazar 'pagination.previous' con el texto estático 'Previous' -->
                        <button
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-gray-700 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-offset-2 focus:ring-gray-600 active:bg-gray-600 transition ease-in-out duration-150">
                            Previous
                        </button>
                    </span>

                    <!-- Pagination Numbers -->
                    <div class="flex">
                        <!-- Botón activo -->
                        <button class="px-3 py-1 text-sm text-white bg-gray-800 border border-gray-700 rounded-md">1</button>
                        <button class="px-3 py-1 text-sm text-gray-800 bg-white border border-gray-300 rounded-md hover:bg-gray-100">2</button>

                        <!-- Separador -->
                        <span class="px-3 py-1 text-sm text-gray-800 bg-white">...</span>

                        <!-- Más números de página -->
                        <button class="px-3 py-1 text-sm text-gray-800 bg-white border border-gray-300 rounded-md hover:bg-gray-100">100</button>
                        <button class="px-3 py-1 text-sm text-gray-800 bg-white border border-gray-300 rounded-md hover:bg-gray-100">101</button>
                    </div>


                    <span class="pe-5">
                        <!-- Next Page Link -->
                        <!-- Reemplazar 'pagination.next' con el texto estático 'Next' -->
                        <button
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-gray-700 rounded-md hover:bg-gray-700 focus:outline-nonefocus:ring-offset-2 focus:ring-gray-600 active:bg-gray-600 transition ease-in-out duration-150">
                            Next
                        </button>
                    </span>
                </nav>
            </div>

        </BreezeDashboardLayout>
    </BreezeAuthenticatedLayout>
</template>
