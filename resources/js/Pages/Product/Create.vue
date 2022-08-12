<script setup>
	import ref from "vue";
	import AppLayout from "@/Layouts/AppLayout.vue";
	import PaymentType from "@/Pages/Payment/Type.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { useForm } from "@inertiajs/inertia-vue3";

	defineProps({
		categories: Object,
		errors: Object,
	});

	const url = null;
	const image = ref();

	const payment_type = {
		plan: "",
		price: 0,
		monthly: 0,
		days: 0,
	};

	const form = useForm({
		title: null,
		image: null,
		description: null,
		category_id: null,
		payment: {
			plan: "",
			price: 0,
			monthly: 0,
			days: 0,
		},
	});

	function submit() {
		if (image.value) {
			form.image = image.value.files[0];
		}
		form.payment.plan = payment_type.plan;
		form.payment.price = payment_type.price;
		form.payment.monthly = payment_type.monthly;
		form.payment.days = payment_type.days;

		form.post(route("product.store"));
	}

	function previewImage(e) {
		const file = e.target.files[0];
		url = URL.createObjectURL(file);
	}
</script>

<template>
	<Head title="Dashboard" />

	<AppLayout>
		<template #header>
			<h2 class="text-xl font-semibold leading-tight text-gray-800">Create</h2>
		</template>

		<div class="py-12">
			<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<form @submit.prevent="submit">
							<div>
								<label for="host">Title</label>
								<input type="text" v-model="form.title" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
							</div>
							<div>
								<label for="File">Image</label>
								<input type="file" @change="previewImage" ref="image" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
								<img v-if="url" :src="url" class="w-full mt-4 h-80" />
								<div v-if="errors.image" class="font-bold text-red-600">
									{{ errors.image }}
								</div>
							</div>

							<div>
								<label for="login">Description</label>
								<input type="text" v-model="form.description" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
							</div>
							<div>
								<label for="category">Category</label>
								<select v-model="form.category_id" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
									<option v-for="category in categories" :key="category.id" :value="category.id">
										{{ category.name }}
									</option>
								</select>
							</div>

							<PaymentType :data="payment_type"></PaymentType>

							<!-- submit -->
							<div class="flex items-center mt-4">
								<button class="w-full px-6 py-2 text-white bg-gray-400 rounded">Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
