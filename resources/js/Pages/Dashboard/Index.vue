<script setup>
	import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
	<AppLayout>
		<div class="flex flex-col space-y-10">
			<div class="flex border-b border-gray-200 pb-2 space-x-5">
				<div>
					<div class="text-gray-400 font-light text-sm flex items-center"><span>Previsto para receber </span><span class="ml-2 text-[1.2rem] material-symbols-outlined"> info </span></div>
					<div class="text-lg">R$ 0,00</div>
				</div>

				<div>
					<div class="text-gray-400 font-light text-sm flex items-center"><span>Saldo disponível para saque</span> <span class="ml-2 text-[1.2rem] material-symbols-outlined"> info </span></div>
					<div class="text-lg flex items-center"><span>R$ 0,00 </span><span class="text-[1.2rem] text-gray-400 material-symbols-outlined"> lock </span></div>
				</div>

				<div>
					<a class="inline-flex items-center w-48 py-2 mb-2 px-2 text-sm text-black hover:text-white bg-[#d8ff5f] hover:bg-[#3B4D00] hover:border-[#3B4D00] rounded border border-[#abd035]" href=""><div class="flex w-full place-content-center">VER MINHAS CARTEIRAS</div> </a>
				</div>
			</div>

			<div class="flex flex-col">
				<div class="flex items-center">
					<span class="text-gray-600 font-semibold">Total de clientes</span>
					<span class="ml-2 text-[1.2rem] text-gray-600 material-symbols-outlined"> info </span>
				</div>
				<div class="text-2xl">0</div>
			</div>

			<div class="flex flex-col">
				<div class="flex items-center mb-6">
					<span class="text-gray-600 font-semibold">Clients por recorrência</span>
				</div>
				<div class="flex space-x-12">
					<div class="text-gray-600">
						<div class="text-sm">Anual</div>
						<div class="text-sm">0</div>
					</div>

					<div class="text-gray-600">
						<div class="text-sm">Semestral</div>
						<div class="text-sm">0</div>
					</div>

					<div class="text-gray-600">
						<div class="text-sm">Trimestral</div>
						<div class="text-sm">0</div>
					</div>

					<div class="text-gray-600">
						<div class="text-sm">Mensal</div>
						<div class="text-sm">0</div>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
