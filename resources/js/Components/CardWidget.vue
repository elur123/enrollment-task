<script setup>

const props = defineProps({
    class: {
        type: String,
        default: ''
    }
})

</script>
<template>
    <div class="w-full px-4 py-5 text-center rounded shadow-md" :class="props.class">
            <slot />
    </div>
</template>