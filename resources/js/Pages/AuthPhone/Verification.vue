<script setup>
	import BreezeButton from "@/Components/Button.vue";
	import BreezeInput from "@/Components/Input.vue";
	import BreezeLabel from "@/Components/Label.vue";
	import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
	import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

	const props = defineProps({
		phone: String,
	});

	const form = useForm({
		code: "",
		phone: props.phone,
	});

	const submit = () => {
		form.post(route("verification"), {
			//onFinish: () => form.reset('password'),з
		});
	};
</script>

<template>
	<Head title="Code confirm" />
	<div class="h-screen">
		<div class="flex place-content-center h-full items-center">
			<div class="w-[30rem]">
				<BreezeValidationErrors class="mb-4" />

				<div class="text-3xl font-light mb-8">We send a code to {{ phone }}</div>

				<div class="mb-10 font-light text-[#919191]">
					Did you enter the wrong number?
					<Link class="text-black underline" :href="route('login')">
						change here
					</Link>
				</div>
				<form @submit.prevent="submit">
					<div>
						<BreezeLabel for="code" value="enter your code" />
						<BreezeInput id="code" type="code" class="rounded placeholder-[#dedede] px-3 font-light py-2 border border-[#dedede] mt-1 block w-full" v-model="form.code" required autofocus autocomplete="code" />
					</div>

					<div class="flex items-center justify-end mt-4">
						<BreezeButton class="bg-[#d8ff5f] py-3 inline-flex items-center place-content-center w-full border border-[#dedede] hover:border-[#838383] text-md text-[#767676]" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"> Ready </BreezeButton>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>
