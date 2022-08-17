<script setup>
	import { ref, inject } from "vue";
	import AppLayout from "@/Layouts/AppLayout.vue";
	import PaymentType from "@/Pages/Payment/Type.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { useForm } from "@inertiajs/inertia-vue3";
	import TextArea from "@/Components/TextArea.vue";
	import Input from "@/Components/Input.vue";
	import Label from "@/Components/Label.vue";
	import InputError from "@/Components/InputError.vue";
	import VueSmoothScroll from "vue3-smooth-scroll";

	const props = defineProps({
		product: Object,
		payment: Object,
		categories: Object,
		errors: Object,
	});

	const photoPreview = ref(props.product.image);
	const photoInput = ref(null);

	const payment_type = ref({
		plan: props.payment.plan,
		price: props.payment.price,
		monthly: props.payment.monthly,
		days: props.payment.days,
	});

	const form = useForm({
		title: props.product.title,
		image: props.product.image.name,
		description: props.product.description,
		category_id: props.product.category_id,
		payment: {
			plan: payment_type.value.plan,
			price: payment_type.value.price,
			monthly: payment_type.value.monthly,
			days: payment_type.value.days,
		},
	});

	const submit = () => {
		if (photoInput.value) {
			form.image = photoInput.value.files[0];
		}

		form.payment = payment_type;

		form.post(route("products.update", props.product.id));
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
		<div>
			<div class="mb-10">
				<h3 class="text-2xl">Edit your product</h3>
				<div class="mt-2 font-light text-md">Edit your paid product and charge your members for entry.</div>
			</div>

			<div class="mx-auto grid grid-cols-6">
				<div class="col-span-1">
					<nav class="space-y-3">
						<a href="#sec-3" class="border-l-4 pl-2 border-gray-500 text-gray-600 group flex items-center"> Basic </a>
						<a href="" class="text-gray-600 group flex items-center ml-5 text-sm"> Basic Information </a>
						<a href="" class="text-gray-600 group flex items-center ml-5 text-sm"> Price </a>
						<a href="" class="text-gray-600 group flex items-center ml-5 text-sm"> Materials </a>
						<a href="" class="text-gray-600 group flex items-center"> Sales Page </a>
						<a href="" class="text-gray-600 group flex items-center ml-5 text-sm"> Media </a>
						<a href="" class="text-gray-600 group flex items-center ml-5 text-sm"> Description </a>
						<a href="" class="text-gray-600 group flex items-center ml-5 text-sm"> Benefits </a>
						<a href="" class="text-gray-600 group flex items-center ml-5 text-sm"> Common Questions </a>
					</nav>
				</div>

				<div class="col-span-5">
					<form @submit.prevent="submit">
						<!-- Basic Information -->
						<div class="flex border-b border-gray-300 pb-5">
							<div class="w-[64rem] ml-2 mr-10">
								<div class="text-lg">Basic Information</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Basic information is an important part of your product. Add a title, subtitle and photo to show more credibility.</p>
									<p class="mt-5">You can learn more about setting up your product introduction by <a class="text-sky-600">clicking here.</a></p>
								</div>
							</div>

							<div>
								<div class="col-span-12 lg:col-span-12">
									<Label for="File">Foto</Label>

									<div @click.prevent="selectNewPhoto" v-show="!photoPreview" class="cursor-pointer mt-1 h-60 rounded border border-gray-300 py-2 flex items-center place-content-center">
										<span class="text-3xl text-gray-400 material-symbols-outlined"> photo_camera </span>
									</div>

									<div @click.prevent="selectNewPhoto" v-show="photoPreview" class="rounded cursor-pointer mt-1 h-60 border border-gray-300 flex items-center place-content-center">
										<img :src="photoPreview" class="h-full w-full bg-cover" />
									</div>

									<input type="file" @change="updatePhotoPreview" ref="photoInput" class="hidden w-full px-4 py-2 mt-2 h-60 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
									<InputError :message="form.errors.image"></InputError>
								</div>

								<div class="mt-5">
									<Label for="title" value="Title" />
									<Input type="text" v-model="form.title" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
								</div>
								<div class="mt-5">
									<Label for="caption" value="Caption" />
									<TextArea :rows="4" type="text" v-model="form.description" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
								</div>
								<div class="mt-5">
									<Label for="category">What category does your product fall into?</Label>
									<select v-model="form.category_id" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]">
										<option v-for="(category, index) in categories" :key="index" :value="index">
											{{ category }}
										</option>
									</select>
								</div>
							</div>
						</div>

						<!-- Price Section -->

						<div id="sec-3" class="flex border-b border-gray-300 pt-5 pb-5">
							<div class="w-[64rem] ml-2 mr-10">
								<div class="text-lg">Price</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Define how much you want to charge for your product</p>
								</div>
							</div>
							<div class="flex">
								<PaymentType :data="payment_type"></PaymentType>
							</div>
						</div>

						<!-- submit -->
						<div class="flex items-center mt-4">
							<button class="w-full px-6 py-2 text-white bg-gray-400 rounded">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
