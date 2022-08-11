<script setup>
	import BreezeButton from "@/Components/Button.vue";
	import BreezeInput from "@/Components/Input.vue";
	import BreezeLabel from "@/Components/Label.vue";
	import InputError from "@/Components/InputError.vue";
	import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
	import Logo from "@/Layouts/Partials/Logo.vue";
	import PhoneNumberInput from "@/Components/PhoneNumberInput.vue";

	const form = useForm({
		phone: "",
	});

	const submit = () => {
		form.post(route("login"), {});
	};
</script>

<template>
	<Head title="Log in" />
	<div class="grid grid-cols-2">
		<div class="col-span-1 px-14 pb-5 bg-[#f3f3f3] h-full">
			<div class="mt-10 mb-20">
				<Logo></Logo>
			</div>
			<div class="relative">
				<div class="absolute left-10 top-10">
					<h3 class="text-3xl w-[20rem] font-light">Transforme sua audiência em um negócio lucrativo.</h3>
				</div>
				<img src="/img/sign-up.4fc72ee4.svg" />
				<div class="absolute flex place-content-center w-full pb-2 bottom-1 text-xs text-center text-[#919191] font-extralight">
					<div class="w-[25rem]">Este site é protegido por reCAPTCHA e se aplicam as <a class="text-black underline" href="https://policies.google.com/privacy" rel="noopener noreferrer" target="_blank">Políticas de privacidade</a> e <a class="text-black underline" href="https://policies.google.com/terms" rel="noopener noreferrer" target="_blank">Termos de serviço</a> do Google.</div>
				</div>
			</div>
		</div>

		<div class="col-span-1 bg-[#fff]">
			<div class="flex place-content-center h-full">
				<div class="w-[25rem] relative h-full">
					<div class="text-3xl font-light mt-16 mb-10">Junte-se a milhares de criadores que já faturaram milhões com a Hubla vendendo suas comunidades digitais.</div>
					<form @submit.prevent="submit">
						<div>
							<BreezeLabel for="phone" value="Insira seu número para entrar" />
							<!-- <PhoneNumberInput placeholder="Insira seu número" v-model="form.phone" required></PhoneNumberInput> -->
							<input type="text" placeholder="Insira seu número" v-model="form.phone"/>
							<InputError :message="form.errors.phone"></InputError>
						</div>

						<div class="flex items-center mt-10">
							<BreezeButton class="py-3 inline-flex items-center place-content-center w-full border border-[#dedede] hover:border-[#838383] text-md text-[#767676]" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"> Receber código por SMS </BreezeButton>
						</div>
					</form>

					<div class="absolute bottom-10 text-xs text-center text-[#919191] font-extralight">Ao iniciar a sessão, você aceita e concorda com nossos <a class="text-black underline" href="https://firebasestorage.googleapis.com/v0/b/chatpay-cd120.appspot.com/o/public%2Fapp%2Fterms_of_use.pdf?alt=media" rel="noopener noreferrer" target="_blank">Termos de Uso.</a></div>
				</div>
			</div>
		</div>
	</div>
</template>
