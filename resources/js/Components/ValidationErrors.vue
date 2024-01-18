<script lang="ts" setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

// Suponiendo que 'errors' es un objeto con claves de tipo string y valores de tipo string
interface ErrorObject {
  [key: string]: string;
}

const errors = computed(() => {
  const page = usePage<{ errors: ErrorObject }>();
  return page.props.value.errors;
});

const hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
    <div v-if="hasErrors">
        <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>
