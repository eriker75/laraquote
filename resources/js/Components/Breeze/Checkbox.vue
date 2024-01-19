<script lang="ts" setup>
import { computed, withDefaults } from 'vue';

interface Emits {
    (event: 'update:checked', value: Array<any> | boolean): void
}

// Define the types for the emitted events
const emit = defineEmits<Emits>();

// Define the interface for the props
interface Props {
    checked?: Array<any> | boolean;
    value?: any;
}

// Define the props with their types and default values
const props = withDefaults(defineProps<Props>(), {
    checked: false,
    value: null,
});

// Define the computed property
const proxyChecked = computed({
    get(): Array<any> | boolean {
        return props.checked;
    },
    set(val: Array<any> | boolean) {
        emit("update:checked", val);
    },
});

</script>

<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
</template>
