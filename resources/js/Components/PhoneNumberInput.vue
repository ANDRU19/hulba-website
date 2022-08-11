<template>
	<vue-tel-input @input="onInput" :value="modelValue" :inputOptions="options" mode="international"></vue-tel-input>
</template>

<script setup>
	import { VueTelInput } from "vue3-tel-input";
	import "vue3-tel-input/dist/vue3-tel-input.css";

	const props = defineProps(["required", "modelValue", "placeholder"]);
	const emit = defineEmits(["update:modelValue"]);

	const options = { placeholder: props.placeholder, type: "text", required: props.required, autofocus: true, styleClasses: "border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" };

	const onInput = (phone, phoneObject, input) => {
		if (phoneObject?.number) {
			emit("update:modelValue", phoneObject.number);
		}
	};
</script>
