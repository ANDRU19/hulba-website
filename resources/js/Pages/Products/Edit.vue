<script setup>
	import { ref } from "vue";
	import AppLayout from "@/Layouts/AppLayout.vue";
	import PaymentType from "@/Pages/Payment/Type.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { useForm } from "@inertiajs/inertia-vue3";
    import TextArea from "@/Components/TextArea.vue";
	import Input from "@/Components/Input.vue";
	import Label from "@/Components/Label.vue";
	import InputError from "@/Components/InputError.vue";

	const props = defineProps({
        product: Object,
        payment: Object,
		categories: Object,
        errors: Object
	});

	const photoPreview = ref(props.product.image);
	const photoInput = ref(null);

	const payment_type = ref({
		plan: props.payment.plan,
		price: props.payment.price,
		monthly: props.payment.monthly,
		days: props.payment.days,
	});
console.log(payment_type);
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
		

		<div class="">
			<div class="mx-auto max-w-5xl w-2/3 sm:px-6 lg:px-8">
				<div class="bg-white">
                    <h3 class="text-2xl">Edit your product</h3>
					<div class="mt-2 font-light text-md">Edit your paid product and charge your members for entry.</div>

					<div class="mt-5">
						<form @submit.prevent="submit">
							<div class="col-span-12 lg:col-span-12">
								<Label for="File">Foto</Label>

								<div @click.prevent="selectNewPhoto" v-show="!photoPreview" class="cursor-pointer mt-1 h-80 border border-gray-300 py-2 flex items-center place-content-center">
									<span class="text-3xl text-gray-400 material-symbols-outlined"> photo_camera </span>
								</div>

								<div @click.prevent="selectNewPhoto" v-show="photoPreview" class="cursor-pointer mt-1 h-80 border border-gray-300 py-2 flex items-center place-content-center">
                                    <img :src="photoPreview" class="h-80" />
                                </div>

								<input type="file" @change="updatePhotoPreview" ref="photoInput" class="hidden w-full px-4 py-2 mt-2 h-80 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
								<div v-if="errors.photo" class="font-bold text-red-600">
									{{ errors.photo }}
								</div>
							</div>
							<div class="mt-5">
								<Label for="host">Title</Label>
								<Input type="text" v-model="form.title" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
							</div>
							<div class="mt-5">
								<Label for="login">Caption</Label>
								<TextArea type="text" v-model="form.description" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
							</div>
							<div class="mt-5">
								<Label for="category">What category does your product fall into?</Label>
								<select v-model="form.category_id" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
									<option v-for="(category, index) in categories" :key="index" :value="index">
										{{ category }}
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
