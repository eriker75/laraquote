<script lang="ts" setup>
import { InertiaForm } from '@inertiajs/inertia-vue3';
import BreezeButton from '@/Components/Button.vue';

interface Props {
    form: InertiaForm<any>
}

const props = defineProps<Props>();

const processingClass = props.form.processing ? 'opacity-25' : '';
</script>

<template>
    <BreezeButton :class="processingClass" :disabled="form.processing">
        <slot></slot>
    </BreezeButton>
</template>
