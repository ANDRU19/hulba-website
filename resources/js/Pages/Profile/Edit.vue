<script setup>
	import { ref } from "vue";
	import AppLayout from "@/Layouts/AppLayout.vue";
	import { Head } from "@inertiajs/inertia-vue3";
	import { useForm } from "@inertiajs/inertia-vue3";
	import TextArea from "@/Components/TextArea.vue";
	import Input from "@/Components/Input.vue";
	import Label from "@/Components/Label.vue";
	import InputError from "@/Components/InputError.vue";

	const props = defineProps({
		customer: Object,
		errors: Object,
	});

	const photoPreview = ref(props.customer.photo);
	const photoInput = ref(null);

	const profileForm = useForm({
		name: props.customer.name,
		surname: props.customer.surname,
		email: props.customer.email,
		photo: props.customer.photo,
		social: props.customer.social,
		description: props.customer.description,
	});

	const submit = () => {
		if (photoInput.value) {
			profileForm.photo = photoInput.value.files[0];
		}
		profileForm.post(route("profile.update", props.customer.id), {
			onSuccess: () => clearPhotoFileInput(),
		});
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
	<Head title="Customers" />

	<AppLayout>
		<template #header>
			<h2 class="text-xl font-semibold leading-tight text-gray-800">Profile</h2>
		</template>

		<div class="">
			<div class="mx-auto max-w-5xl w-2/3 sm:px-6 lg:px-8">
				<div class="bg-white">
					<h3 class="text-2xl">Crie o seu perfil</h3>
					<div class="mt-2 font-light text-md">Suas informações aparecerão na sua página de perfil pessoal.</div>

					<div class="mt-5">
						<form @submit.prevent="submit">
							<div class="grid grid-cols-12 gap-x-6">
								<div class="col-span-12 lg:col-span-12">
									<Label for="File">Foto</Label>

									<div @click.prevent="selectNewPhoto" v-show="!photoPreview" class="cursor-pointer w-20 h-20 mt-1 rounded-full border border-gray-300 py-2 flex items-center place-content-center">
										<span class="text-3xl text-gray-400 material-symbols-outlined"> photo_camera </span>
									</div>

									<div @click.prevent="selectNewPhoto" v-show="photoPreview" class="cursor-pointer w-20 h-20 mt-1 rounded-full border border-gray-300 py-2 flex items-center place-content-center"><img :src="photoPreview" class="w-full w-20 h-20 rounded-full" /></div>

									<input type="file" @change="updatePhotoPreview" ref="photoInput" class="hidden w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
									<div v-if="errors.photo" class="font-bold text-red-600">
										{{ errors.photo }}
									</div>
								</div>
								<div class="col-span-12 lg:col-span-6 mt-5">
									<Label for="name" value="Nome" />
									<Input id="name" placeholder="Nome" type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" v-model="profileForm.name" required />
									<InputError :message="profileForm.errors.name"></InputError>
								</div>

								<div class="col-span-12 lg:col-span-6 mt-5">
									<Label for="surname" value="Sobrenome" />
									<Input id="surname" placeholder="e.g Silva" type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" v-model="profileForm.surname" required />
									<InputError :message="profileForm.errors.surname"></InputError>
								</div>

								<div class="col-span-12 lg:col-span-12 mt-5">
									<Label for="email" value="Email" />
									<Input id="email" placeholder="@" type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" v-model="profileForm.email" required />
									<InputError :message="profileForm.errors.email"></InputError>
								</div>

								<div class="col-span-12 lg:col-span-12 mt-5">
									<Label for="description" value="Escreva a bio do seu perfil" />
									<TextArea id="description" rows="3" type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" v-model="profileForm.description" required />
									<InputError :message="profileForm.errors.description"></InputError>
								</div>

								<div class="col-span-12 lg:col-span-12 mt-5">
									<Label value="Compartilhe suas redes sociais" />
								</div>

								<div class="col-span-12 lg:col-span-12 mt-2">
									<div class="mt-1 flex rounded-md shadow-sm">
										<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> instagram.com/ </span>
										<Input id="instagram" placeholder="e.g chat.pay" type="text" class="placeholder-[#dedede] flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300" v-model="profileForm.social.instagram" required />
									</div>
									<InputError :message="profileForm.errors.instagram"></InputError>
								</div>

								<div class="col-span-12 lg:col-span-12 mt-5">
									<div class="mt-1 flex rounded-md shadow-sm">
										<span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> facebook.com/ </span>
										<Input id="facebook" placeholder="e.g chat.pay" type="text" class="placeholder-[#dedede] flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300" v-model="profileForm.social.faceboock" required />
									</div>
									<InputError :message="profileForm.errors.faceboock"></InputError>
								</div>

								<!-- submit -->
								<div class="col-span-12 flex items-center place-content-center mt-10">
									<button class="px-6 py-2 w-2/3 text-white bg-gray-400 rounded">Próximo</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
