<script setup>
	import { ref, computed } from "vue";
	import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
	import { ChevronDownIcon } from "@heroicons/vue/solid";
	import TextArea from "@/Components/TextArea.vue";

	const props = defineProps({
		modelValue: Object,
	});

	const emit = defineEmits(["update:modelValue"]);

	const options = computed(() => {
		return [
			{
				key: "what_will_you_learn",
				title: "What will you learn",
			},
			{
				key: "results_you_can_expect",
				title: "Results you can expect",
			},
			{
				key: "who_is_this_group_for",
				title: "Who is this group for",
			},
			{
				key: "group_rules",
				title: "Group rules",
			},
			{
				key: "challenges_you_will_face",
				title: "Challenges you will face",
			},
			{
				key: "how_does_interaction_work",
				title: "How does interaction work",
			},
		];
	});

	const data = ref(props.modelValue && Object.keys(props.modelValue).length ? props.modelValue : {});

	const initData = () => {
		options.value.forEach((option) => {
			let key = option.key;

			if (!data.value[key]) {
				data.value[option.key] = "";
			}
		});
	};

	initData();

	const activeOption = ref(options.value[0]);

	const selectOption = (option) => {
		activeOption.value = option;
	};
</script>

<template>
	<Menu as="div" class="relative inline-block text-left">
		<div>
			<MenuButton class="inline-flex justify-center w-full font-light text-sm text-gray-700">
				{{ activeOption.title }}
				<ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
			</MenuButton>
		</div>

		<transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
			<MenuItems class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
				<div class="py-1">
					<template v-for="option in options" :key="option.key">
						<MenuItem v-slot="{ active }">
							<a @click="selectOption(option)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'cursor-pointer block px-4 py-2 text-sm']">{{ option.title }}</a>
						</MenuItem>
					</template>
				</div>
			</MenuItems>
		</transition>
	</Menu>

	<TextArea :rows="4" type="text" @input="emit('update:modelValue', data)" v-model="data[activeOption.key]" class="flex-1 min-w-0 block w-full px-3 py-2 rounded focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 mt-1 placeholder-[#dedede]" />
</template>
