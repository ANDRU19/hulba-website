<template>
	<div class="container mx-auto px-4">
		<TransitionRoot as="template" :show="sidebarOpen">
			<Dialog as="div" class="relative z-40 md:hidden" @close="sidebarOpen = false">
				<TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
					<div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
				</TransitionChild>

				<div class="fixed inset-0 flex z-40">
					<TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
						<DialogPanel class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
							<TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
								<div class="absolute top-0 right-0 -mr-12 pt-2">
									<button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
										<span class="sr-only">Close sidebar</span>
										<XIcon class="h-6 w-6 text-white" aria-hidden="true" />
									</button>
								</div>
							</TransitionChild>
							<div class="flex-shrink-0 flex items-center px-4">
								<Logo></Logo>
							</div>
							<div class="mt-5 flex-1 h-0 overflow-y-auto">
								<nav class="px-2 space-y-1">
									<a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
										<component :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-4 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
										<span class="material-symbols-outlined mr-2"> {{ item.icon }} </span>
										{{ item.name }}
									</a>
								</nav>
							</div>
						</DialogPanel>
					</TransitionChild>
					<div class="flex-shrink-0 w-14" aria-hidden="true">
						<!-- Dummy element to force sidebar to shrink to fit close icon -->
					</div>
				</div>
			</Dialog>
		</TransitionRoot>

		<!-- Static sidebar for desktop -->
		<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
			<!-- Sidebar component, swap this element with another sidebar if you like -->
			<div class="flex flex-col flex-grow border-r border-gray-200 pt-5 bg-white overflow-y-auto">
				<div class="flex items-center flex-shrink-0 px-4">
					<Logo></Logo>
				</div>
				<div class="mt-10 flex-grow flex flex-col">
					<nav class="flex-1 px-2 pb-4 space-y-1">
						<a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
							<component :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
							<span class="material-symbols-outlined mr-2"> {{ item.icon }} </span>
							{{ item.name }}
						</a>
					</nav>
				</div>
			</div>
		</div>
		<div class="md:pl-64 flex flex-col flex-1">
			<div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white">
				<button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="sidebarOpen = true">
					<span class="sr-only">Open sidebar</span>
					<MenuAlt2Icon class="h-6 w-6" aria-hidden="true" />
				</button>

				<div class="flex-1 px-4 flex justify-between">
					<div class="flex-1 flex justify-end items-center">
						<Link :href="route('payments')" class="btn btn-transperent f-s-8 mr-3">My products</Link>
					</div>
					<div class="ml-4 flex items-center md:ml-6">
						<!-- Profile dropdown -->
						<Menu as="div" class="ml-3 relative">
							<div>
								<MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
									<div class="nav-user-info">hello {{ $page.props.auth.user.name }}</div>
									<span class="sr-only">Open user menu</span>
									<img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
								</MenuButton>
							</div>
							<transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
								<MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
									<MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
										<Link :href="item.href" @click="item.click" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</Link>
									</MenuItem>
								</MenuItems>
							</transition>
						</Menu>
					</div>
				</div>
			</div>

			<main class="flex-1">
				<div class="py-6">
					<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
						<slot name="header"></slot>
					</div>
					<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
						<div class="py-1">
							<slot></slot>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
</template>

<script setup>
	import { ref, component } from "vue";
	import { Inertia } from "@inertiajs/inertia";
	import { Dialog, DialogPanel, Menu, MenuButton, MenuItem, MenuItems, TransitionChild, TransitionRoot } from "@headlessui/vue";
	import Logo from "./Partials/Logo.vue";
	import { Link } from "@inertiajs/inertia-vue3";
	import { XIcon, MenuAlt2Icon } from "@heroicons/vue/solid";

	const navigation = [
		{ name: "Dashboard", href: route("dashboard.index"), icon: "settings", current: route().current("dashboard.index") },
		{ name: "Products", href: route("products.list"), icon: "inventory_2", current: route().current("products.list") },
		{ name: "Categories", href: "/category", icon: "category", current: false },
		{ name: "Sales", href: "#", icon: "monetization_on", current: false },
		{ name: "Coupons", href: "#", icon: "percent", current: false },
		{ name: "Affiliates", href: "#", icon: "handshake", current: false },
		{ name: "Profile", href: route("profile"), icon: "person", current: route().current("profile") },
	];
	const userNavigation = [
		{ name: "Your Profile", href: route("profile"), click: "" },
		{ name: "Sign out", href: "#", click: () => Inertia.post(route("logout")) },
	];

	const sidebarOpen = ref(false);
</script>

<style scoped>
	.nav-user-info {
		padding-right: 10px;
	}
</style>
