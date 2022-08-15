<script setup>
	import AppLayout from "@/Layouts/AppLayout.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { Link } from "@inertiajs/inertia-vue3";
	import Pagination from "@/Layouts/Partials/Pagination.vue";

	defineProps({
		products: Object,
	});
	const destroy = (id) => {
		this.$inertia.delete(route("product.destroy", id));
	};
</script>

<template>
	<Head title="Products" />

	<AppLayout>
		<template #header>
			<h2 class="text-2xl font-semibold leading-tight text-gray-800">Products</h2>
		</template>
		
		<div class="mb-4 flex justify-end">
			<Link class="inline-flex items-center w-48 py-2 mb-2 px-2 text-sm text-black hover:text-white bg-[#d8ff5f] hover:bg-[#3B4D00] hover:border-[#3B4D00] rounded border border-[#abd035]" :href="route('products.create')">
				<div class="flex w-full place-content-center">New Product</div>
				<span class="text-right font-semibold material-symbols-outlined"> add </span>
			</Link>
		</div>
		<table class="table-auto divide-y min-w-full">
			<thead class="uppercase text-sm border-b">
				<tr>
					<th class="px-3 py-3.5 text-left text-sm font-light text-gray-900">ID</th>
					<th class="px-3 py-3.5 text-left text-sm font-light text-gray-900">Title</th>
					<th class="px-3 py-3.5 text-left text-sm font-light text-gray-900">Photo</th>
					<th class="px-3 py-3.5 text-left text-sm font-light text-gray-900">Category</th>
					<th class="px-3 py-3.5 text-left text-sm font-light text-gray-900">Customer</th>
					<th class="px-3 py-3.5 text-left text-sm font-light text-gray-900">Suggested Action</th>
				</tr>
			</thead>
			<tbody class="text-sm font-light">
				<tr class="" v-for="product in products.data" :key="product.id">
					<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ product.id }}</td>
					<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ product.title }}</td>
					<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">
						<img class="rounded w-10 h-10" :src="product.image.name" width="80" />
					</td>
					<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ product.category.name }}</td>
					<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ product.customer.name }}</td>
					<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">
						<Link class="text-green-700" :href="route('products.edit', product.id)"> Edit </Link>
						<Link @click="destroy(product.id)" class="text-red-700 ml-10">Delete</Link>
					</td>
				</tr>
			</tbody>
		</table>
		<pagination :links="products.links" />
	</AppLayout>
</template>
