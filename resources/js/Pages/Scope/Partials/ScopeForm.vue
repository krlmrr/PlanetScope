<script setup>
    import { useForm } from '@inertiajs/vue3'
    import Card from '@/Components/Containers/Card.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'
    import TextArea from '@/Components/Inputs/TextArea.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import DatePicker from '@/Components/Inputs/DatePicker.vue'

    const props = defineProps(['project', 'scope'])

    const form = useForm({
        project_id: props.project.id,
        title: '',
        overview: '',
        business_case: '',
        budget: '',
        start_date: '',
        end_date: '',
    })

    function submit() {
        if (props.scope === undefined) {
            form.post(
                route('projects.scopes.store', { project: props.project.id }),
            )
        }
    }
</script>

<template>
    <Card
        header="Scope Details"
        header-description="Details for your new scope."
    >
        <template #body>
            <form @submit.prevent="submit()">
                <TextInput
                    class="mb-4"
                    :errors="form.errors.title"
                    label="Title"
                    v-model="form.title"
                />

                <div class="my-4">
                    <TextArea
                        :errors="form.errors.overview"
                        label="Overview"
                        v-model="form.overview"
                    />
                </div>

                <div class="my-4">
                    <TextArea
                        :errors="form.errors.business_case"
                        label="Business Case / Background"
                        v-model="form.business_case"
                    />
                </div>

                <div class="flex items-center">
                    <TextInput
                        class="mb-4"
                        type="number"
                        label="Budget"
                        :errors="form.errors.budget"
                        v-model="form.budget"
                    />

                    <DatePicker
                        class="mb-4"
                        type="date"
                        min="2023-10-01"
                        label="Start Date"
                        :errors="form.errors.start_date"
                        v-model="form.start_date"
                    />

                    <DatePicker
                        class="mb-4"
                        type="date"
                        min="2023-10-01"
                        label="End Date"
                        :errors="form.errors.end_date"
                        v-model="form.end_date"
                    />
                </div>

                <div class="flex mt-8 justify-center items-center">
                    <PrimaryButton> Submit </PrimaryButton>
                </div>
            </form>
        </template>
    </Card>
</template>
