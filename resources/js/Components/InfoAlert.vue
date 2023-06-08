<script setup>

const props = defineProps({
    message: {
        type: String,
        default: ''
    }
})

</script>
<template>
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-4 " role="alert">
        <p class="font-bold">Info</p>
        <p>{{ props.message }}</p>
    </div>
</template>