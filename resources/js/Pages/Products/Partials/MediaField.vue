<script setup>
	import { ref, computed, watch } from "vue";
	import MediaFieldModal from "@/Pages/Products/Partials/MediaFieldModal.vue";
	import Input from "@/Components/Input.vue";
	import Label from "@/Components/Label.vue";
	import FileInput from "../../../Components/FileInput.vue";

	const props = defineProps({
		modelValue: Object,
	});

	const emit = defineEmits(["update:modelValue"]);

	const data = ref({
		type: "",
		fileObject: {},
	});

	const files = ref([]);

	const modalOpened = ref(false);

	const attachFile = () => {
		files.value.push(data.value);
		emit("update:modelValue", files);
		modalOpened.value = false;
		data.value = { type: "", fileObject: {} };
	};

	const attachDisabled = computed(() => {
		return Object.keys(data.value.fileObject) == 0;
	});

	watch(
		() => data.value.type,
		(newType) => {
			data.value.fileObject = {};
		}
	);
</script>

<template>
	<div @click="modalOpened = true" class="px-2 py-2 min-h-40 w-full border cursor-pointer border-gray-200 text-gray-400 font-light flex items-center flex-wrap">
		<div class="flex" v-for="file in files" :key="file.type">
			<template v-if="file.type == 'image'">
				<img class="px-2 py-2 rounded w-[9.7rem] h-[8rem]" :src="file.fileObject.url" />
			</template>
		</div>
		<div class="flex h-full w-[9.7rem] h-[8rem] px-2 py-2">
			<div class="h-full flex items-center place-content-center w-full border-2 border-gray-300 border-dashed rounded-md cursor-pointer text-sm px-2 text-center"><span>Click to add media</span></div>
		</div>
	</div>

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
				<FileInput :upload-url="route('products.media.store')" class="mt-2" v-model="data.fileObject"></FileInput>
			</template>
			<template v-if="data.type == 'video'"> </template>
			<template v-if="data.type == 'youtube'">
				<span class="text-gray-500 font-light text-sm mt-5">Please, insert the youtube link </span>
				<Input placeholder="https://www.youtube.com/watch?v=lVijYeuVTY8" type="text" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" v-model="data.url" autofocus />
			</template>
		</template>
		<template #actions>
			<button :class="{ 'bg-[#d8ff5f]/25 hover:bg-[#d8ff5f]/25 hover:text-black': attachDisabled }" :disabled="attachDisabled" type="button" class="place-content-centerflex place-content-center text-center items-center w-48 py-2 mb-2 px-2 text-sm text-black hover:text-white bg-[#d8ff5f] hover:bg-[#3B4D00] hover:border-[#3B4D00] rounded border border-[#abd035]" @click="attachFile()">Attach</button>
		</template>
	</MediaFieldModal>
</template>
