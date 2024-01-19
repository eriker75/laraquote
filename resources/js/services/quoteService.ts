import { Quote } from '@definitions';
import apiClient from '@utils/api';

export async function fetchRandomQuotes() {
    try {
        const response = await apiClient.get<Quote[]>('/quotes/random');
        return { quotes: response.data, loading: false, error: null };
    } catch (err) {
        return {
            quotes: [],
            loading: false,
            error: err instanceof Error ? err.message : 'Unknown error'
        };
    }
}
