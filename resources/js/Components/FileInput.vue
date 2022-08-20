<script setup>
	import { computed, ref } from "vue";
	import { useDropzone } from "vue3-dropzone";
	import { ExclamationCircleIcon } from "@heroicons/vue/outline";

	const props = defineProps({
		modelValue: {
			type: Object,
			default: {},
		},
		maxSize: {
			type: Number,
			default: 10,
		},
		accept: {
			default: () => ["image/png", "image/jpg", "image/jpeg", "image/svg+xml"],
		},

		uploadUrl: {
			type: String,
			default: "localhost",
		},
		deleteUrl: {
			type: String,
			default: "localhost",
		},
	});
	const emit = defineEmits(["onUpload", "onDelete", "update:modelValue"]);

	const uploadedFile = ref(props.modelValue ?? {});
	const rejectedFile = ref("");
	const processing = ref(false);
	const errorMessage = ref("");

	const maxSizeInBytes = computed(() => {
		return Math.round(props.maxSize * 1048576);
	});

	const onDropAccepted = (acceptFiles, rejectReasons) => {
		saveFile(acceptFiles);
	};

	const onDropRejected = (rejectReason) => {
		rejectedFile.value = rejectReason;
	};

	const saveFile = (file) => {
		processing.value = true;

		const formData = new FormData();

		for (var x = 0; x < file.length; x++) {
			formData.append("file[]", file[x]);
		}

		axios
			.post(props.uploadUrl, formData, {
				headers: {
					"Content-Type": "multipart/form-data",
				},
			})
			.then((response) => {
				if (response.data.error) {
					errorMessage.value = response.data.error;
				} else {
					response.data.files.forEach((file) => {
						uploadedFile.value = file;
					});

					emit("update:modelValue", uploadedFile.value);
					emit("onUpload", uploadedFile.value);
                    
					processing.value = false;
				}
			})
			.catch((err) => {
				console.error(err);
			});
	};






	const { getRootProps, getInputProps, inputRef, ...rest } = useDropzone({ onDropAccepted, onDropRejected, maxSize: maxSizeInBytes.value, maxFiles: 1, accept: props.accept });
</script>

<template>
	<!-- Display DropZone -->
	<div>
		<div class="max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer">
			<div v-bind="getRootProps()">
				<input ref="fileInput" v-bind="getInputProps()" />

				<!-- Display dropping area -->
				<div v-if="!uploadedFile.url && !rejectedFile && !processing" class="space-y-1 text-center cursor-pointer">
					<svg class="mx-auto h-24 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
						<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
					<div class="text-sm text-gray-600">
						<span>Upload a file or drag and drop</span>
					</div>
					<p class="text-xs text-gray-500">PNG, JPG, JPEG</p>
				</div>
			</div>

			<!-- Display Files in the Uploading Process  -->
			<div v-if="processing">
				<div class="max-w-lg px-6 pt-5 pb-6">
					<div class="animate-pulse flex space-x-4">
						<div class="rounded-full bg-slate-200 h-10 w-10"></div>
						<div class="flex-1 space-y-6 py-1">
							<div class="h-2 bg-slate-200 rounded"></div>
							<div class="space-y-3">
								<div class="grid grid-cols-3 gap-4">
									<div class="h-2 bg-slate-200 rounded col-span-2"></div>
									<div class="h-2 bg-slate-200 rounded col-span-1"></div>
								</div>
								<div class="h-2 bg-slate-200 rounded"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Display uploaded file -->
			<div v-if="uploadedFile.url && !rejectedFile && !processing">
				<div class="relative">
					<img @click="inputRef.click()" class="cursor-pointer delay-100 object-cover rounded-md shadow-md" :src="uploadedFile.url" />
					<div class="absolute right-2.5 top-2.5">
						<a @click="confirmRemoval()" class="cursor-pointer flex items-center rounded-full bg-gray-50 z-50 px-1 py-1 shadow-sm">
							<span class="font-light text-md material-symbols-outlined text-red-300 hover:text-red-500 cursor-pointer"> delete </span>
						</a>
					</div>
				</div>
			</div>

			<!-- Display Rejected Files -->

			<div v-for="file in rejectedFile" :key="file.name" class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4">
				<div class="delay-100 h-48 max-w-lg px-6 pt-5 pb-6">
					<div class="flex flex-col h-full place-content-center justify-items-center items-center space-y-1 text-center cursor-pointer">
						<div class="text-sm text-gray-600">
							<span>{{ file.file.name }}</span>
						</div>
						<div v-for="error in file.errors" :key="error.message" class="text-xs text-gray-500">{{ error.message }}</div>
						<div class="content-center"><ExclamationCircleIcon class="w-10 stroke-red-200"></ExclamationCircleIcon></div>
					</div>
				</div>
			</div>
		</div>

		<p class="mt-2 text-sm text-red-600">{{ errorMessage }}</p>
	</div>
</template>
