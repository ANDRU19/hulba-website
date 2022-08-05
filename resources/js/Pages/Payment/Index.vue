<template>
    <Head title="Dashboard" />

    <AppLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                My products
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
                                <td class="px-4 py-2">Active</td>
                            </thead>
                            <tbody>
                                <tr v-for="payment in payments.data" :key="payment.id">
                                    <td class="px-4 py-2">
                                        <img :src="'/storage/'+payment.product.photo.name">
                                            {{ payment.product.title }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <pagination :links="payments.links" />
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
        payments: Object,
    },
    methods: {

    },
};
</script>