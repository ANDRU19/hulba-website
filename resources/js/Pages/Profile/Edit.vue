<template>
    <Head title="Customers" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Profile
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <label for="File">Photo</label>
                                    <input
                                        type="file"
                                        @change="previewPhoto"
                                        ref="photo"
                                        class="
                                            w-full
                                            px-4
                                            py-2
                                            mt-2
                                            border
                                            rounded-md
                                            focus:outline-none
                                            focus:ring-1
                                            focus:ring-blue-600
                                        "
                                    />
                                    <img
                                        v-if="url"
                                        :src="url"
                                        class="w-full mt-4 h-80"
                                    />
                                    <div
                                        v-if="errors.photo"
                                        class="font-bold text-red-600"
                                    >
                                        {{ errors.photo }}
                                    </div>
                            </div>
                            <div>
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    v-model="form.name"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.name">{{ errors.name }}</div>
                            </div>
                            <div>
                            <label for="name">Surname</label>
                                <input
                                    type="text"
                                    v-model="form.surname"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.surname">{{ errors.surname }}</div>
                            </div>
                            <div>
                            <label for="name">Email</label>
                                <input
                                    type="text"
                                    v-model="form.email"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                                <div v-if="errors.email">{{ errors.email }}</div>
                            </div>
                            <div>
                            <label for="name">Instagram</label>
                                <input
                                    type="text"
                                    v-model="form.social.instagram"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                            </div>
                            <div>
                            <label for="name">Faceboock</label>
                                <input
                                    type="text"
                                    v-model="form.social.faceboock"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                />
                            </div>
                            <div>
                            <label for="name">Description</label>
                                <textarea
                                    v-model="form.description"
                                    class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    "
                                ></textarea>
                            </div>

                            <!-- submit -->
                            <div class="flex items-center mt-4">
                                <button
                                    class="
                                        px-6
                                        py-2
                                        text-white
                                        bg-gray-900
                                        rounded
                                    "
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
    setup(props) {
        const form = useForm({
            name: props.customer.name,
            surname: props.customer.surname,
            email: props.customer.email,
            photo: props.customer.photo,
            social: props.customer.social,
            description: props.customer.description
        });

        return { form };
    },
    props: {
        customer: Object,
        errors: Object
    },
    data() {
        return {
        url: null,
        }
    },
    methods: {
        submit() {
            if (this.$refs.photo) {
                this.form.photo = this.$refs.photo.files[0];
            }
            this.form.post(route("profile.update", this.customer.id));
        },

        previewPhoto(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
};
</script>