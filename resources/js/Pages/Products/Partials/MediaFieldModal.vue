<script setup>
	import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from "@headlessui/vue";
	import { XIcon } from "@heroicons/vue/outline";

	const props = defineProps({
		open: Boolean,
	});

	const emit = defineEmits(['closed']);


</script>

<template>
	<TransitionRoot as="template" :show="open">
		<Dialog as="div" class="relative z-10" @close="emit('closed')">
			<TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
			</TransitionChild>

			<div class="fixed z-10 inset-0 overflow-y-auto">
				<div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
					<TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
						<DialogPanel class="relative bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full sm:p-6">
							<div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
								<button type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="emit('closed')">
									<span class="sr-only">Close</span>
									<XIcon class="h-6 w-6" aria-hidden="true" />
								</button>
							</div>
							<div>
								<div class="mt-3 text-center sm:mt-5 flex flex-col place-content-center items-center">
									<DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900"> Placing too much media makes product cool</DialogTitle>
									<slot name="content"></slot>
								</div>
							</div>
							<div class="mt-5 sm:mt-6 flex place-content-center">
								<slot name="actions"></slot>
							</div>
						</DialogPanel>
					</TransitionChild>
				</div>
			</div>
		</Dialog>
	</TransitionRoot>
</template>
