<template>
    <Head title="PS connection" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <label for="host">Title</label>
                                <input
                                    type="text"
                                    v-model="form.title"
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
                                <label for="File">Image</label>
                                    <input
                                        type="file"
                                        @change="previewImage"
                                        ref="image"
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
                                        class="w-full mt-4 w-80"
                                    />
                                    <div
                                        v-if="errors.image"
                                        class="font-bold text-red-600"
                                    >
                                        {{ errors.image }}
                                    </div>
                            </div>


                            <div>
                                <label for="login">Description</label>
                                <input
                                    type="text"
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
                                />
                            </div>
                            <div>
                                <label for="category">Category</label>
                                <select v-model="form.category_id"
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
                                >
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
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
            title: props.product.title,
            image: props.product.image.name,
            description: props.product.description,
            category_id: props.product.category_id
        });

        return { form };
    },
    data() {
        return {
        url: this.form.image,
        }
    },
    props: {
        product: Object,
        categories: Object,
        errors: Object
    },
    methods: {
        submit() {
            if (this.$refs.image) {
                this.form.image = this.$refs.image.files[0];
            }
            this.form.put(route("product.update", this.product.id));
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
};
</script>