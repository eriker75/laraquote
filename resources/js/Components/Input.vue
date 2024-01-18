<script lang="ts" setup>
import { onMounted, ref, defineProps, defineEmits } from 'vue';

interface Props {
  modelValue: string;
}

const props = defineProps<Props>();
const emit = defineEmits(['update:modelValue']);

const input = ref<HTMLInputElement | null>(null);

onMounted(() => {
  if (input.value?.hasAttribute('autofocus')) {
    input.value.focus();
  }
});

const handleInput = (event: Event) => {
  const target = event.target as HTMLInputElement; // Aserción de tipo
  emit('update:modelValue', target.value);
};
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        :value="modelValue"
        @input="handleInput"
        ref="input"
    >
</template>
