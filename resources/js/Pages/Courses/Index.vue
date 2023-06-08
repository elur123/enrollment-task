<script setup>
import { Head, router } from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SuccessAlert from '@/Components/SuccessAlert.vue'

const props = defineProps({
    flash: Object,
    courses: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <Head title="Courses" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Courses</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <SuccessAlert  
                    v-if="props.flash.success"
                    :message="props.flash.success" 
                />

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="header" class="p-4 flex justify-between items-center">
                        <h3 class="text-gray-900 font-bold">Courses List</h3>
                        <PrimaryButton @click="() => router.get(route('courses.create'))">New course</PrimaryButton>
                    </div>
                    <div id="body">
                        <table class="w-full text-sm text-left">

                            <thead class="text-xs text-gray-700 uppercase">
                                <tr>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Course</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Average GPA</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Limit</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Enrolled student</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Actions</th>
                                </tr>
                            </thead>

                            <tbody v-if="props.courses.length">
                                <tr v-for="(course, index) in props.courses" :key="index" :class="index % 2 === 0 ? 'bg-gray-100 hover:bg-gray-300 dark:bg-transparent' : 'hover:text-gray-500 hover:bg-gray-300'">
                                    <td class="p-4">{{ course.label }}</td>
                                    <td class="p-4">{{ course.average_gpa }}</td>
                                    <td class="p-4">{{ course.limit }}</td>
                                    <td class="p-4">{{ course.students_count }}</td>
                                    <td class="p-4">
                                        <PrimaryButton @click="() => router.get(route('courses.edit', course))">Edit</PrimaryButton>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody v-else>
                                <tr class="bg-gray-100 hover:bg-gray-300 dark:bg-transparent">
                                    <td class="p-4 text-gray-500 text-center" colspan="6">No course found...</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
