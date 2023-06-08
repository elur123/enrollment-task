<script setup>
import { Link, useForm, usePage, Head, router  } from '@inertiajs/vue3';
import { ref } from 'vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import Select from '@/Components/Select.vue';
import InfoAlert from '@/Components/InfoAlert.vue';

const hasInfo = ref(false)

const props = defineProps({
    errors: {
        type: Object,
        default: []
    },
    courses: {
        type: Array,
        default: []
    },
    student: Object
});

const form = useForm({
    fullname: props.student.fullname,
    email: props.student.email,
    mobile_number: props.student.mobile_number,
    address: props.student.address,
    gpa: String(props.student.gpa),
    course: props.student.course_id,
});

const updateStudent = () => {

    form.put(route('students.update', props.student), {
        preserveScroll: true,
        onSuccess: () => { 
            hasInfo.value = false 
        },
        onError: errors => {
            hasInfo.value = true
        }
    })
}
</script>

<template>
<Head title="Students - Enrollment" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students - Enrollment</h2>
        </template>

        <section class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <InfoAlert  
                    v-if="hasInfo"
                    :message="props.errors.message" 
                />

                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Edit student</h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Student details
                        </p>
                    </header>

                    <form @submit.prevent="updateStudent" class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="fullname" value="Fullname" />

                            <TextInput
                                id="fullname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.fullname"
                                required
                                autofocus
                                autocomplete="fullname"
                            />

                            <InputError class="mt-2" :message="form.errors.fullname" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput
                                id="email"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="email"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div>
                            <InputLabel for="mobile_number" value="Mobile number" />

                            <TextInput
                                id="mobile_number"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.mobile_number"
                                required
                                autocomplete="mobile_number"
                            />

                            <InputError class="mt-2" :message="form.errors.mobile_number" />
                        </div>

                        <div>
                            <InputLabel for="mobile_number" value="Address" />

                            <TextArea
                                id="address"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.address"
                                required
                                autocomplete="address"
                            />

                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>

                        <div>
                            <InputLabel for="gpa" value="Average GPA" />

                            <TextInput
                                id="gpa"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.gpa"
                                required
                                autocomplete="gpa"
                            />

                            <InputError class="mt-2" :message="form.errors.gpa" />
                        </div>

                        <div>
                            <InputLabel for="course" value="Course" />

                            <Select 
                                v-model="form.course"
                                :options="props.courses"
                                @change="(e) => { form.course = e.target.value }"
                            />

                            <InputError class="mt-2" :message="form.errors.course" />
                        </div>



                        <div class="flex items-center gap-4">
                            <PrimaryButton :disabled="form.processing">Update</PrimaryButton>

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
