<template>
	<vue-tel-input @input="onInput" :value="modelValue" :inputOptions="options" mode="international"></vue-tel-input>
</template>

<script lang="ts">

	import { defineComponent } from "vue";
	import { VueTelInput } from "vue3-tel-input";
	import "vue3-tel-input/dist/vue3-tel-input.css";

	export default defineComponent({
		components: {
			VueTelInput,
		},

		props: ["required", "modelValue"],
		emits: ["update:modelValue"],

		data() {
			return {
				options: { placeholder: null, type: "text", required: this.required, autofocus: true, styleClasses: "border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" },
			};
		},

		methods: {
			onInput(phone: any, phoneObject: any, input: any) {
				if (phoneObject?.number) {
					this.$emit("update:modelValue", phoneObject.number);
				}
			},
		},
	});
</script>
