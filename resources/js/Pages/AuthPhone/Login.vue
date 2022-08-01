<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    phone: ''
});

const submit = () => {
    form.post(route('login'), {
        //onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Log in" />
        <BreezeValidationErrors class="mb-4" />
        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="phone" value="Phone" />
                <BreezeInput id="phone" type="phone" class="mt-1 block w-full" v-model="form.phone" required autofocus autocomplete="phone" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </BreezeButton>
            </div>
        </form>
    </BreezeGuestLayout>
</template>

