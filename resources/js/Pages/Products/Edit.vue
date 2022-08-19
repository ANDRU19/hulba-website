<script setup>
	import { ref, inject } from "vue";
	import AppLayout from "@/Layouts/AppLayout.vue";
	import PaymentType from "@/Pages/Payment/EditType.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { useForm } from "@inertiajs/inertia-vue3";
	import TextArea from "@/Components/TextArea.vue";
	import Input from "@/Components/Input.vue";
	import Checkbox from "@/Components/Checkbox.vue";
	import Label from "@/Components/Label.vue";
	import InputError from "@/Components/InputError.vue";
	import MediaField from "@/Pages/Products/Partials/MediaField.vue";
	import DynamicTextAreaField from "@/Pages/Products/Partials/DynamicTextAreaField.vue";
	import DynamicFields from "@/Pages/Products/Partials/DynamicFields.vue";
	import HeaderMenu from "@/Pages/Products/Partials/HeaderMenu.vue";
	import VerificationMessage from "@/Pages/Products/Partials/VerificationMessage.vue";

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
		welcome_message: "",
		media: {},
		about_product: "",
		full_description: props.product.full_description,
		additional_description: [
			{
				title: "",
				descriotion: "",
			}
		],

		benefits: [
			{
				title: "test",
				emoji: "test",
			},
		],

		common_questions: [
			{
				question: "34",
				answer: "234",
			},
		],
		include_join_group_info: true,
		include_charge_recurring_next_month_info: true,
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

			<HeaderMenu></HeaderMenu>
			
			<VerificationMessage></VerificationMessage>

			<div class="mx-auto grid grid-cols-6" id="container">
				<div class="col-span-1 relative">
					<nav class="space-y-3 fixed">
						<a href="#basic-page" v-smooth-scroll="{ offset: -190 }" class="border-l-4 pl-2 border-gray-500 text-gray-600 group flex items-center"> Basic </a>
						<a href="#basic-information" v-smooth-scroll="{ offset: -180 }" class="text-gray-600 group flex items-center ml-5 text-sm"> Basic Information </a>
						<a href="#price-section" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center ml-5 text-sm"> Price </a>
						<a href="#materials-section" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center ml-5 text-sm"> Materials </a>
						<a href="#sales-page" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center"> Sales Page </a>
						<a href="#media-section" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center ml-5 text-sm"> Media </a>
						<a href="#description-section" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center ml-5 text-sm"> Description </a>
						<a href="#benefits-section" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center ml-5 text-sm"> Benefits </a>
						<a href="#common-questions-section" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center ml-5 text-sm"> Common Questions </a>
						<a href="#fb-pixel-section" v-smooth-scroll="{ offset: -100 }" class="text-gray-600 group flex items-center ml-5 text-sm"> FB Pixel </a>
					</nav>
				</div>

				<div class="col-span-5">
					<form @submit.prevent="submit">
						<!-- Basic Information -->
						<div class="flex border-b border-gray-300 pb-5" id="basic-page">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="basic-information">Basic Information</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Basic information is an important part of your product. Add a title, subtitle and photo to show more credibility.</p>
									<p class="mt-5">You can learn more about setting up your product introduction by <a class="text-sky-600">clicking here.</a></p>
								</div>
							</div>

							<div class="w-full">
								<div class="col-span-12 lg:col-span-12">
									<Label for="File">Foto</Label>
									<div @click.prevent="selectNewPhoto" v-show="!photoPreview" class="rounded cursor-pointer mt-1 h-60 border border-gray-300 flex items-center place-content-center">
										<span class="text-3xl text-gray-400 material-symbols-outlined"> photo_camera </span>
									</div>

									<div @click.prevent="selectNewPhoto" v-show="photoPreview" class="rounded cursor-pointer mt-1 h-60 border border-gray-300 flex items-center place-content-center">
										<img :src="photoPreview" class="h-full bg-cover w-full rounded" />
									</div>

									<input type="file" @change="updatePhotoPreview" ref="photoInput" class="hidden w-full px-4 mt-2 h-60 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
									<InputError :message="form.errors.image"></InputError>
								</div>

								<div class="mt-5">
									<Label for="title" value="Title" />
									<Input type="text" v-model="form.title" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
									<InputError :message="form.errors.title"></InputError>
								</div>

								<div class="mt-5">
									<Label for="caption" value="Caption" />
									<TextArea :rows="4" type="text" v-model="form.description" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
									<InputError :message="form.errors.description"></InputError>
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

						<!-- Price -->
						<div class="flex border-b border-gray-300 pt-5 pb-5">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="price-section">Price</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Define how much you want to change for your product.</p>
								</div>
							</div>
							<div class="w-full">
								<PaymentType :data="payment_type"></PaymentType>
							</div>
						</div>

						<!-- Materials -->
						<div class="flex border-b border-gray-300 pt-5 pb-5">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="materials-section">Material</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Create a welcome message, and add materials such as pdfs, among others.</p>
									<p class="mt-5">Learn more about our welcome material here.</p>
								</div>
							</div>
							<div class="mt-5 w-full">
								<Label for="welcome_message" value="Write a welcome message" />
								<TextArea :rows="4" type="text" v-model="form.welcome_message" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
								<InputError :message="form.errors.welcome_message"></InputError>
							</div>
						</div>

						<!-- Media -->
						<div class="flex border-b border-gray-300 pt-5 pb-5" id="sales-page">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="media-section">Media</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Placing too much media makes the product cool</p>
								</div>
							</div>
							<div class="w-full">
								<MediaField v-model="form.media"></MediaField>
							</div>
						</div>

						<!-- Description -->
						<div class="flex border-b border-gray-300 pt-5 pb-5">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="description-section">Description</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Your product description can significantly increase the purchase conversion on your sales page. Be clear, brief and tell a little about your product.</p>
								</div>
							</div>
							<div class="w-full">
								<div class="mt-5">
									<Label for="caption" value="About the product" />
									<TextArea :rows="4" type="text" v-model="form.about_product" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
									<InputError :message="form.errors.about_product"></InputError>
								</div>

								<div class="mt-5">
									<DynamicTextAreaField v-model="form.full_description"></DynamicTextAreaField>
									<InputError :message="form.errors.full_description"></InputError>
								</div>

								<div class="mt-5">
									<Label for="additional_description_title" value="Write one more session" />
									<Input type="text" v-model="form.additional_description_title" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
									<InputError :message="form.errors.additional_description_title"></InputError>
								</div>
								<div class="mt-2">
									<TextArea :rows="4" type="text" v-model="form.additional_description" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
									<InputError :message="form.errors.additional_description"></InputError>
								</div>
							</div>
						</div>

						<!-- Benefits -->
						<div class="flex border-b border-gray-300 pt-5 pb-5">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="benefits-section">Benefits</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Add a list of advantages to clarify to the customer what type of access, content and other benefits they will acquire by being part of your product.</p>
								</div>
							</div>
							<div class="w-full">
								<div class="mt-5">
									<Label for="benefits" value="Benefits" />
									<DynamicFields
										v-model="form.benefits"
										:fields="[
											{ name: 'emoji', type: 'emoji' },
											{ name: 'title', type: 'input', class: 'flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]' },
										]"
									>
									</DynamicFields>
								</div>
							</div>
						</div>

						<!-- Common questions -->

						<div class="flex border-b border-gray-300 pt-5 pb-5">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="common-questions-section">Common questions</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">By creating a list of frequently asked questions, you reduce the number of customers who call your support team, or even stop participating in your product because of a question.</p>
								</div>
							</div>
							<div class="w-full">
								<div class="mt-5">
									<Label for="benefits" value="FAQ" />
									<DynamicFields
										v-model="form.common_questions"
										containerClass="flex flex-col"
										:fields="[
											{ name: 'question', type: 'input', class: 'flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]' },
											{ name: 'answer', type: 'textarea', class: 'flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede] mb-5' },
										]"
									>
									</DynamicFields>
								</div>

								<div class="mt-5">
									<div>How to join the group?</div>
									<div class="text-sm font-light">Once your payment is confirmed, whenever you need to access the groups you have purchased, go to My Groups, in the upper right corner of the Hubla page and there you will find the button to access the group.</div>

									<div class="flex items-center space-x-2 mt-2">
										<Checkbox :checked="form.include_join_group_info" v-model="form.include_join_group_info"></Checkbox>
										<Label for="include_join_group_info" value="Include" />
									</div>
								</div>

								<div class="mt-5">
									<div>Do you charge recurring next month?</div>
									<div class="text-sm font-light">Charges are made on the day your first payment for your subscription is approved. For example, on a monthly subscription, if the first payment was approved on 01/01/2020, the next monthly payment will be on 02/01/2020.</div>
									<div class="flex items-center space-x-2 mt-2">
										<Checkbox :checked="form.include_charge_recurring_next_month_info" v-model="form.include_charge_recurring_next_month_info"></Checkbox>
										<Label for="include_join_group_info" value="Include" />
									</div>
								</div>
							</div>
						</div>

						<!-- FB Pixel -->
						<div class="flex border-b border-gray-300 pt-5 pb-5">
							<div class="w-[50rem] ml-2 mr-10">
								<div class="text-lg" id="fb-pixel-section">Tracking Pixel</div>
								<div class="text-gray-500 font-light text-sm">
									<p class="mt-5">Connect your page with external pixels</p>
								</div>
							</div>
							<div class="w-full">
								<div class="mt-5"></div>
							</div>
						</div>

						<!-- submit -->
						<div class="flex items-center mt-8 place-content-center">
							<button class="w-[20rem] px-6 py-2 text-white bg-gray-400 rounded">Complete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
