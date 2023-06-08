<script setup>
import { Head } from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CardWidget from '@/Components/CardWidget.vue';

const props = defineProps({
    courses_count: Number,
    students_count: Number
})
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-1 md:grid-cols-3 gap-4">
                    <CardWidget class="bg-green-400">
                        <p class="mb-2 text-3xl font-bold">{{ props.courses_count }}</p>
                        <p class="text-xl font-bold">Total Courses</p>
                    </CardWidget>

                    <CardWidget class="bg-yellow-400">
                        <p class="mb-2 text-3xl font-bold">{{ props.students_count }}</p>
                        <p class="text-xl font-bold">Total Students</p>
                    </CardWidget>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
