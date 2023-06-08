<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage, Head, router  } from '@inertiajs/vue3';

defineProps({});

const form = useForm({
    label: '',
    average_gpa: '',
    limit: '',
});
</script>

<template>
<Head title="Courses - Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Courses - Create</h2>
        </template>

        <section class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Create Course</h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Create new course.
                        </p>
                    </header>

                    <form @submit.prevent="form.post(route('courses.store'))" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="label" value="Course label" />

                            <TextInput
                                id="label"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.label"
                                required
                                autofocus
                                autocomplete="label"
                            />

                            <InputError class="mt-2" :message="form.errors.label" />
                        </div>

                        <div>
                            <InputLabel for="average_gpa" value="Average GPA" />

                            <TextInput
                                id="average_gpa"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.average_gpa"
                                required
                                autocomplete="average_gpa"
                            />

                            <InputError class="mt-2" :message="form.errors.average_gpa" />
                        </div>

                        <div>
                            <InputLabel for="limit" value="Student limit" />

                            <TextInput
                                id="limit"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.limit"
                                required
                                autocomplete="limit"
                            />

                            <InputError class="mt-2" :message="form.errors.limit" />
                        </div>


                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                            <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
    
</template>
