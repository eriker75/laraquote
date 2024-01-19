import { computed, ref, Ref } from 'vue';
import { defineStore } from 'pinia';
import { Quote } from '@definitions';
import apiClient from '@/utils/api';
import { fetchRandomQuotes } from '@/services/quoteService';

export const useQuoteStore = defineStore('squoteStore', {
    state: () => ({
        quotes: [] as Quote[],
        loading: false as boolean,
        error: null as string | null,
    }),
    actions: {
        async fetchRandomQuotes() {
            this.loading = true;
            const result = await fetchRandomQuotes();
            this.quotes = result.quotes;
            this.loading = result.loading;
            this.error = result.error;
        }
    },
    getters: {
        randomQuotes(state) {
            return state.quotes
        }
    }
});
