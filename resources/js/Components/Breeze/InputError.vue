<script lang="ts" setup>
interface Props {
    message: string;
}
const props = defineProps<Props>();
</script>

<template>
    <div v-show="props.message">
        <p class="text-sm text-red-600">
            {{ props.message }}
        </p>
    </div>
</template>
