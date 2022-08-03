<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <Link
                                class="
                                    px-6
                                    py-2
                                    mb-2
                                    text-green-100
                                    bg-green-500
                                    rounded
                                "
                                :href="route('product.create')"
                            >
                                Product Create
                            </Link>
                        </div>
                        <table>
                            <thead class="font-bold bg-gray-300 border-b-2">
                                <td class="px-4 py-2">ID</td>
                                <td class="px-4 py-2">Title</td>
                                <td class="px-4 py-2">Photo</td>
                                <td class="px-4 py-2">Category</td>
                                <td class="px-4 py-2">Customer</td>

                            </thead>
                            <tbody>
                                <tr v-for="product in products.data" :key="product.id">
                                    <td class="px-4 py-2">{{ product.id }}</td>
                                    <td class="px-4 py-2">{{ product.title }}</td>
                                    <td class="px-4 py-2">
                                        <img :src="'/storage/'+product.image.name" width="80" style="border-radius:100%">
                                    </td>
                                    <td class="px-4 py-2">{{ product.category.name }}</td>
                                    <td class="px-4 py-2">{{ product.customer.name }}</td>
                                    <td class="px-4 py-2 font-extrabold">
                                        <Link
                                            class="text-green-700"
                                            :href="route('product.edit', product.id)"
                                        >
                                            Edit
                                        </Link>
                                        <Link
                                            @click="destroy(product.id)"
                                            class="text-red-700"
                                            >Delete</Link
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :links="products.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeNavLink,
        Link,
    },
    props: {
        products: Object,
    },
    methods: {
        destroy(id) {
            this.$inertia.delete(route("product.destroy", id));
        },
    },
};
</script>