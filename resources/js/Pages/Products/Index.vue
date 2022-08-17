<script setup>
	import AppLayout from "@/Layouts/AppLayout.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { Link } from "@inertiajs/inertia-vue3";
	import { Inertia } from "@inertiajs/inertia";
	import Pagination from "@/Layouts/Partials/Pagination.vue";

	defineProps({
		products: Object,
	});
	const destroy = (id) => {
		Inertia.delete(route("products.destroy", id));
	};
</script>

<template>
	<Head title="Products" />

	<AppLayout>
		<template #header>
			<h2 class="text-2xl font-semibold leading-tight text-gray-800">Products</h2>
		</template>

		<div v-if="products.data.length" class="mb-4 flex justify-end">
			<Link class="inline-flex items-center w-48 py-2 mb-2 px-2 text-sm text-black hover:text-white bg-[#d8ff5f] hover:bg-[#3B4D00] hover:border-[#3B4D00] rounded border border-[#abd035]" :href="route('products.create')">
				<div class="flex w-full place-content-center">New Product</div>
				<span class="text-right font-semibold material-symbols-outlined"> add </span>
			</Link>
		</div>
		<template v-if="products.data.length">
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
						<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ product.category }}</td>
						<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">{{ product.customer.name }}</td>
						<td class="whitespace-nowrap px-3 py-2 text-sm text-gray-500">
							<Link class="text-green-700" :href="route('products.edit', product.id)"> Edit </Link>
							<Link @click="destroy(product.id)" class="text-red-700 ml-10">Delete</Link>
						</td>
					</tr>
				</tbody>
			</table>
			<pagination :links="products.links" />
		</template>
		<template v-else>
			<div class="border border-gray-200 rounded flex flex-col space-y-3 item-center text-center py-8 mt-8">
				<div class="font-semibold text-lg">It's not long before your firsth sales</div>
				<div class="text-sm">You already have a profile, create your product now using the button below</div>
				<div class="">
					<Link class="inline-flex items-center w-48 py-2 mb-2 px-2 text-sm text-black hover:text-white bg-[#d8ff5f] hover:bg-[#3B4D00] hover:border-[#3B4D00] rounded border border-[#abd035]" :href="route('products.create')">
						<div class="flex w-full place-content-center">New Product</div>
						<span class="text-right font-semibold material-symbols-outlined"> add </span>
					</Link>
				</div>
			</div>
		</template>
	</AppLayout>
</template>
