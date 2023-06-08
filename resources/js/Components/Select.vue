<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    options: {
        type: Array,
        default: []
    },
    modelValue: {
        type: Number,
        required: null,
    },
});

const emit = defineEmits(['change']);

</script>

<template>
    <select
        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @change="(e) => emit('change', e)"
    >
        <option v-for="option in options" :key="option.id"  :value="option.id" selected>{{ option.label }}</option>
    </select>
</template>
