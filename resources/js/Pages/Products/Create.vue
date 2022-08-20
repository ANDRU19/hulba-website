<script setup>
	import { ref } from "vue";
	import AppLayout from "@/Layouts/AppLayout.vue";
	import PaymentType from "@/Pages/Payment/CreateType.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { useForm } from "@inertiajs/inertia-vue3";
	import TextArea from "@/Components/TextArea.vue";
	import Input from "@/Components/Input.vue";
	import Label from "@/Components/Label.vue";
	import InputError from "@/Components/InputError.vue";

	const props = defineProps({
		categories: Object,
		errors: Object,
	});

	const photoPreview = ref(null);
	const photoInput = ref(null);

	const payment_type = ref({
		plan: "",
		price: 0,
		monthly: 0,
		days: 0,
	});

	const form = useForm({
		title: null,
		image: null,
		description: null,
		category_id: 0,
		payment: {
			plan: "",
			price: 0,
			monthly: 0,
			days: 0,
		},
	});

	const submit = () => {
		if (photoInput.value) {
			form.image = photoInput.value.files[0];
		}

		form.payment = payment_type;

		form.post(route("products.store"));
	};

	const selectNewPhoto = () => {
		photoInput.value.click();
	};

	const updatePhotoPreview = (e) => {
		const photo = photoInput.value.files[0];

		if (!photo) return;

		const reader = new FileReader();

		reader.onload = (e) => {
			photoPreview.value = e.target.result;
		};

		reader.readAsDataURL(photo);
	};

	const clearPhotoFileInput = () => {
		if (photoInput.value?.value) {
			photoInput.value.value = null;
		}
	};
</script>

<template>
	<Head title="Dashboard" />

	<AppLayout>
		<div class="">
			<div class="mx-auto max-w-5xl w-2/3 sm:px-6 lg:px-8">
				<div class="bg-white">
					<h3 class="text-2xl">Create your product</h3>
					<div class="mt-2 font-light text-md">Create your paid product and charge your members for entry.</div>

					<div class="mt-5">
						<form @submit.prevent="submit">
							<div class="col-span-12 lg:col-span-12">
								<Label for="File" value="Foto"></Label>

								<div @click.prevent="selectNewPhoto" v-show="!photoPreview" class="cursor-pointer mt-1 h-60 rounded border border-gray-300 py-2 flex items-center place-content-center">
									<span class="text-3xl text-gray-400 material-symbols-outlined"> photo_camera </span>
								</div>

								<div @click.prevent="selectNewPhoto" v-show="photoPreview" class="cursor-pointer mt-1 h-60 border border-gray-300 py-2 flex items-center place-content-center">
									<img :src="photoPreview" class="h-60" />
								</div>

								<input type="file" @change="updatePhotoPreview" ref="photoInput" class="hidden w-full px-4 py-2 mt-2 h-60 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
								<InputError :message="form.errors.image"></InputError>
							</div>

							<div class="col-span-12 mt-5">
								<Label for="title" value="Title" />
								<Input type="text" v-model="form.title" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
								<InputError :message="form.errors.title"></InputError>
							</div>

							<div class="col-span-12 mt-5">
								<Label for="caption" value="Caption" />
								<TextArea type="text" v-model="form.description" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
								<InputError :message="form.errors.description"></InputError>
							</div>
							<div class="mt-5">
								<Label for="category" value="What category does your product fall into?" />
								<select v-model="form.category_id" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]">
									<option v-for="(category, index) in categories" :key="index" :value="index">
										{{ category }}
									</option>
								</select>
							</div>

							<PaymentType :data="payment_type"></PaymentType>
							<InputError :message="form.errors['payment.plan']"></InputError>
							<InputError :message="form.errors['payment.price']"></InputError>

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
