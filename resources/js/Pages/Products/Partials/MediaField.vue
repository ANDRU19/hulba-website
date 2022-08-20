<script setup>
	import { ref } from "vue";
	import MediaFieldModal from "@/Pages/Products/Partials/MediaFieldModal.vue";
	import Input from "@/Components/Input.vue";
	import Label from "@/Components/Label.vue";
	import FileInput from "../../../Components/FileInput.vue";
	const props = defineProps({
		modelValue: Object,
	});

	const data = ref({
		type: "",
		file: {},
	});

	const modalOpened = ref(false);
</script>

<template>
	<div @click="modalOpened = true" class="h-40 w-full border cursor-pointer border-gray-200 text-gray-400 font-light flex items-center place-content-center">Click to upload media</div>

	<MediaFieldModal :open="modalOpened" @closed="modalOpened = false">
		<template #content>
			<div class="mt-5 max-w-xs">
				<Label for="category" class="font-light text-sm">What type of media you want to upload?</Label>
				<select v-model="data.type" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]">
					<option value="image">Image</option>
					<option value="video">Video</option>
					<option value="youtube">Youtube Link</option>
				</select>
			</div>

			<template v-if="data.type == 'image'">
				<FileInput :upload-url="route('products.media.store')" class="mt-2" v-model="data.file"></FileInput>
			</template>
			<template v-if="data.type == 'video'"> </template>
			<template v-if="data.type == 'youtube'">
				<span class="text-gray-500 font-light text-sm mt-5">Please, insert the youtube link </span>
				<Input placeholder="https://www.youtube.com/watch?v=lVijYeuVTY8" type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" v-model="data.url" autofocus />
			</template>
		</template>
		<template #actions>
			<button type="button" class="place-content-centerflex place-content-center text-center items-center w-48 py-2 mb-2 px-2 text-sm text-black hover:text-white bg-[#d8ff5f] hover:bg-[#3B4D00] hover:border-[#3B4D00] rounded border border-[#abd035]" @click="modalOpened = false">Upload</button>
		</template>
	</MediaFieldModal>
</template>
