<script setup>
	import Input from "@/Components/Input.vue";
	import TextArea from "@/Components/TextArea.vue";
	import { ref } from "vue";
	import Label from "@/Components/Label.vue";
	import { PlusSmIcon as PlusSmIconSolid } from "@heroicons/vue/solid";
	import { MinusSmIcon as MinusSmIconSolid } from "@heroicons/vue/solid";
	import EmojiPicker from "vue3-emoji-picker";
	import "/node_modules/vue3-emoji-picker/dist/style.css";

	const props = defineProps({
		fields: Array,
		modelValue: Object,
		containerClass: String,
	});

	const emit = defineEmits(["update:modelValue"]);

	const modelData = ref(props.modelValue ?? [{}]);

	function addFields() {
		modelData.value.push({});
		emit("update:modelValue", modelData.value);
	}

	function removeFields(dataIndx) {
		modelData.value.splice(dataIndx, 1);
		emit("update:modelValue", modelData.value);
	}
</script>

<template>
	<div v-for="(data, index) in modelData" :key="data">
		<div :class="containerClass" class="flex gap-x-5 mt-5">
			<div class="col-span-10 sm:col-span-5" v-for="field in fields" :key="field.name">
				<template v-if="field.type == 'input'">
					<Label :value="field.label" />
					<Input :placeholder="field.name" :class="field.class" type="text" class="block w-full mt-1" v-model="data[field.name]" autofocus />
				</template>

				<template v-if="field.type == 'textarea'">
					<Label :value="field.label" />
					<TextArea :placeholder="field.name" :class="field.class" type="text" class="block w-full mt-1" v-model="data[field.name]" autofocus />
				</template>

				<template v-if="field.type == 'emoji'">
					<EmojiPicker
						:class="field.class"
						pickerType="input"
						:native="false"
						@select="
							(emoji) => {
								data[field.name] = emoji.u;
							}
						"
					/>
				</template>
			</div>
			<div class="col-span-2 sm:col-span-2 self-center">
				<div class="flex">
					<button @click="removeFields(index)" v-if="modelData.length > 1" type="button" class="inline-flex items-center p-0.5 border border-transparent rounded-full shadow-sm text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:red-offset-2 focus:ring-red-600">
						<MinusSmIconSolid class="h-5 w-5" aria-hidden="true" />
					</button>

					<button @click="addFields()" v-if="index == modelData.length - 1" type="button" class="ml-5 inline-flex items-center p-0.5 border border-transparent rounded-full shadow-sm text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
						<PlusSmIconSolid class="h-5 w-5" aria-hidden="true" />
					</button>
				</div>
			</div>
		</div>
	</div>
</template>
