<script setup>
	defineProps(["modelValue", "rows"]);

	const emit = defineEmits(["update:modelValue"]);
</script>

<template>
	<textarea :rows="rows" @input="emit('update:modelValue', $event.target.value)" :value="modelValue" class="w-full" />
</template>
