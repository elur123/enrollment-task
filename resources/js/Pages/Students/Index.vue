<script setup>
import { Head, router } from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SuccessAlert from '@/Components/SuccessAlert.vue'

const props = defineProps({
    flash: Object,
    students: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <Head title="Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <SuccessAlert  
                    v-if="props.flash.success"
                    :message="props.flash.success" 
                />


                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="header" class="p-4 flex justify-between items-center">
                        <h3 class="text-gray-900 font-bold">Students List</h3>
                        <PrimaryButton @click="() => router.get(route('students.create'))">Enroll student</PrimaryButton>
                    </div>
                    <div id="body">
                        <table class="w-full text-sm text-left">

                            <thead class="text-xs text-gray-700 uppercase">
                                <tr>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Student ID</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Fullname</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Email</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Mobile number</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Address</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">GPA</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Course</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Has Scholarship</th>
                                    <th class="p-4 border dark:text-gray-900 dark:border-gray-900">Actions</th>
                                </tr>
                            </thead>

                            <tbody v-if="props.students.length">
                                <tr v-for="(student, index) in props.students" :key="index" :class="index % 2 === 0 ? 'bg-gray-100 hover:bg-gray-300 dark:bg-transparent' : 'hover:text-gray-500 hover:bg-gray-300'">
                                    <td class="p-4">{{ student.student_id }}</td>
                                    <td class="p-4">{{ student.fullname }}</td>
                                    <td class="p-4">{{ student.email }}</td>
                                    <td class="p-4">{{ student.mobile_number }}</td>
                                    <td class="p-4">{{ student.address }}</td>
                                    <td class="p-4">{{ student.gpa }}</td>
                                    <td class="p-4">{{ student.course.label }}</td>
                                    <td class="p-4">{{ student.has_scholarship ? 'Yes' : 'None' }}</td>
                                    <td class="p-4">
                                        <PrimaryButton @click="() => router.get(route('students.edit', student))">Edit</PrimaryButton>
                                    </td>
                                </tr>
                            </tbody>

                            <tbody v-else>
                                <tr class="bg-gray-100 hover:bg-gray-300 dark:bg-transparent">
                                    <td class="p-4 text-gray-500 text-center" colspan="9">No student found...</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
