<script setup>

const props = defineProps({
    message: {
        type: String,
        default: ''
    }
})

</script>
<template>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 " role="alert">
        <p class="font-bold">Success</p>
        <p>{{ props.message }}</p>
    </div>
</template>