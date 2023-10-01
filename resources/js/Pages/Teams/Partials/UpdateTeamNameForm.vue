<script setup>
    import { useForm } from '@inertiajs/vue3'
    import ActionMessage from '@/Components/Jetstream/ActionMessage.vue'
    import FormSection from '@/Components/Jetstream/FormSection.vue'
    import InputLabel from '@/Components/Inputs/InputLabel.vue'
    import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
    import TextInput from '@/Components/Inputs/TextInput.vue'

    const props = defineProps({
        team: Object,
        permissions: Object,
    })

    const form = useForm({
        name: props.team.name,
    })

    const updateTeamName = () => {
        form.put(route('teams.update', props.team), {
            errorBag: 'updateTeamName',
            preserveScroll: true,
        })
    }
</script>

<template>
    <FormSection @submitted="updateTeamName">
        <template #title> Team Name </template>

        <template #description>
            The team's name and owner information.
        </template>

        <template #form>
            <!-- Team Owner Information -->
            <div class="col-span-6">
                <InputLabel class="mx-2" value="Team Owner" />

                <div class="flex items-center mt-2">
                    <img
                        class="w-12 h-12 rounded-full object-cover"
                        :src="team.owner.profile_photo_url"
                        :alt="team.owner.name"
                    />

                    <div class="ml-4 leading-tight">
                        <div class="text-gray-900 dark:text-white">
                            {{ team.owner.name }}
                        </div>
                        <div class="text-gray-700 dark:text-gray-300 text-sm">
                            {{ team.owner.email }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Name -->
            <div class="col-span-6 sm:col-span-4">
                <TextInput
                    id="name"
                    label="Team Name"
                    :errors="form.errors.name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    :disabled="!permissions.canUpdateTeam"
                />
            </div>
        </template>

        <template v-if="permissions.canUpdateTeam" #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
