<template>

  <div class="container mx-auto px-2">


    <div class="flex flex-col flex-1 ">
      <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white ">
        <div class="flex-1 px-4 flex justify-between">
          <div class="flex-1 flex justify-first items-center">
              <Logo></Logo>
              <div class="flex-1 text-xl items-center border-l-2 border-black ml-2 pl-2">Member</div>
          </div>
          <div class="flex-1 flex justify-end items-center">
            <a :href="route('dashboard')" class="btn btn-transperent f-s-8 mr-3 ">Use creator mode</a>
          </div>
          <div class="ml-4 flex items-center md:ml-6">
        
            <!-- Profile dropdown -->
            <Menu as="div" class="ml-3 relative">
              <div>
                <MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <div class="nav-user-info">hello {{$page.props.auth.user.name}}</div>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </MenuButton>
              </div>
              <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                    <a :href="item.href" @click="item.click" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">{{ item.name }}</a>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
      </div>

      <main class="flex-1">
        <div class="py-6">
          <slot></slot>
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import {
  Dialog,
  DialogPanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
import {

  CalendarIcon,
  ChartBarIcon,
  FolderIcon,
  HomeIcon,
  InboxIcon,
  MenuAlt2Icon,
  UsersIcon,
  XIcon,
} from '@heroicons/vue/outline'
import Logo from './Partials/Logo.vue';

const navigation = [
  { name: 'Dashboard', href: '#', icon: HomeIcon, current: true },
  { name: 'Products', href: '/product', icon: UsersIcon, current: false },
  { name: 'Categories', href: '/category', icon: FolderIcon, current: false },
  { name: 'Sales', href: '#', icon: FolderIcon, current: false },
  { name: 'Coupons', href: '#', icon: CalendarIcon, current: false },
  { name: 'Affiliates', href: '#', icon: InboxIcon, current: false },
  { name: 'Profile', href: '#', icon: ChartBarIcon, current: false },
]
const userNavigation = [
  { name: 'Your Profile', href: '#', click: '' },
  { name: 'Settings', href: '#', click: '' },
  { name: 'Sign out', href: '#', click: () => Inertia.post(route('logout')) },
]

const sidebarOpen = ref(false)
</script>

<style scoped>
.nav-user-info{
    padding-right: 10px;
  }
</style>