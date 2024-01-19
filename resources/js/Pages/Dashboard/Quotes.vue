<script lang="ts" setup>
import Quote from '@components/Quote.vue'
import BreezeAuthenticatedLayout from '@layouts/Authenticated.vue';
import BreezeButton from '@components/Breeze/Button.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { onMounted } from 'vue';
import { useQuoteStore } from '@/stores/quoteStore';
import { storeToRefs } from 'pinia';
import { Quote as QuoteInterface } from '@definitions';

const quoteStore = useQuoteStore();
const { randomQuotes } = storeToRefs(quoteStore);

const handleGetQuotes = () => {
    quoteStore.fetchRandomQuotes();
};

interface Props {
    quotes: QuoteInterface[];
}

const props = defineProps<Props>()
</script>

<template>
    <Head title="Quotes" />
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
        ">Quotes</h1>
        <div class="container mx-auto p-4">
            <!-- Flex Container -->
            <div v-if="randomQuotes"
                class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:flex-wrap lg:justify-start xl:justify-start">
                <!-- Elementos Flex -->
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/5 rounded p-5">
                    <Quote :quote="randomQuotes[0]?.quote || quotes[0]?.quote" :author="randomQuotes[0]?.author || quotes[0]?.author" />
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/5 rounded p-5">
                    <Quote :quote="randomQuotes[1]?.quote || quotes[1]?.quote" :author="randomQuotes[1]?.author || quotes[1]?.author" />
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/5 rounded p-5">
                    <Quote :quote="randomQuotes[2]?.quote || quotes[2]?.quote" :author="randomQuotes[2]?.author || quotes[2]?.author" />
                </div>
                <!-- Centrar estos elementos en pantallas grandes y medianas -->
                <div class="w-full md:w-1/2 md:mx-auto lg:w-1/3 xl:w-1/5 rounded p-5">
                    <Quote  :quote="randomQuotes[3]?.quote || quotes[3]?.quote" :author="randomQuotes[3]?.author || quotes[3]?.author" />
                </div>
                <div class="w-full md:w-1/2 md:mx-auto lg:w-1/3 xl:w-1/5 rounded p-5">
                    <Quote :quote="randomQuotes[4]?.quote || quotes[4]?.quote" :author="randomQuotes[4]?.author || quotes[4]?.author" />
                </div>
                <!-- Centrar este elemento solo en pantallas medianas -->
                <!--  <div class="bg-orange-500 h-32 w-full md:w-1/2 md:mx-auto lg:hidden xl:w-1/5 p-5">Elemento 5</div> -->
            </div>
            <div class="flex justify-center align-items-center">
                <BreezeButton :onclick="handleGetQuotes">Refresh Quotes</BreezeButton>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
