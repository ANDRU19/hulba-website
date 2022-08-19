<script setup>
import {
  Dialog,
  DialogPanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <div class="flex justify-end mb-6 border-b pb-4">
    <Menu as="div" class="ml-3 relative">
      <div>
        <MenuButton class="text-sm border border-gray-200 rounded py-2 px-6">
          <div class="nav-user-info">Rascunho</div>
        </MenuButton>
      </div>
      <transition
        enter-active-class="transition ease-out duration-100"
        enter-from-class="transform opacity-0 scale-95"
        enter-to-class="transform opacity-100 scale-100"
        leave-active-class="transition ease-in duration-75"
        leave-from-class="transform opacity-100 scale-100"
        leave-to-class="transform opacity-0 scale-95"
      >
        <MenuItems
          class="
            origin-top-right
            absolute
            right-0
            mt-2
            w-48
            rounded-md
            shadow-lg
            py-1
            bg-white
            ring-1 ring-black ring-opacity-5
            focus:outline-none
          "
        >
          <MenuItem v-slot="{ active }">
            <Link
              href="#"
              :class="[
                active ? 'bg-gray-100' : '',
                'block px-4 py-2 text-sm text-gray-700',
              ]"
              >Rascunho</Link
            >
          </MenuItem>
        </MenuItems>
      </transition>
    </Menu>
    <div class="ml-3 relative">
      <a class="text-sm border border-gray-200 rounded py-2 px-6 mx-2" href="#"
        >Visualizar produto</a
      >
      <a class="text-sm border border-gray-200 rounded py-2 px-3 mx-2" href="#"
        ><span class="material-symbols-outlined">visibility</span></a
      >
      <a class="text-sm border border-gray-200 rounded py-2 px-3 mx-2" href="#"
        ><span class="material-symbols-outlined">delete</span></a
      >
    </div>
  </div>
</template>