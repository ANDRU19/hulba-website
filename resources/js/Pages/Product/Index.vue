<template>
    <Head title="Dashboard" />


	<AppLayout>
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
                        <table class="table table-sm text-left">
                            <thead>
                                <th class="t-cell-1">ID</th>
                                <th class="t-cell-2">Title</th>
                                <th class="t-cell-3">Photo</th>
                                <th class="t-cell-4">Category</th>
                                <th class="t-cell-5">Customer</th>
                                <th class="t-cell-6">Actions</th>

                            </thead>
                            <tbody id="sortable" class="ui-sortable">
                                <tr class="drop-item ui-sortable-handle" v-for="product in products.data" :key="product.id">
                                    <td class="t-cell-1">{{ product.id }}</td>
                                    <td class="t-cell-2">{{ product.title }}</td>
                                    <td class="t-cell-3">
                                        <img :src="'/storage/'+product.image.name" width="80" style="border-radius:100%">
                                    </td>
                                    <td class="t-cell-4">{{ product.category.name }}</td>
                                    <td class="t-cell-5">{{ product.customer.name }}</td>
                                    <td class="t-cell-6">
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
</AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from '@/Layouts/Partials/Pagination.vue'
export default {
    components: {
		AppLayout,
        Pagination,
		Head,
        Link
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