<script setup>
import WithoutSidebarLayout from "@/Layouts/WithoutSidebarLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  product: Object,
});
</script>

<template>
  <Head title="Products" />

  <WithoutSidebarLayout>
    <template #header>
      <h2 class="text-2xl font-semibold leading-tight text-gray-800">
        Product
      </h2>
    </template>

    <div class="grid grid-cols-2 gap-1">
      <div class="flex justify-center">
        <img :src="product.image" />
      </div>
      <div>
        <h1 class="text-3xl mb-4">{{ product.title }}</h1>
        <p class="mb-7">Perpoints to fly</p>
        <p>{{ product.description }}</p>

        <div class="flex items-center mt-7">
          <svg
            class="w-6 h-6 text-green-400 fill-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
          >
            <path
              fill="#000"
              d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
            ></path>
          </svg>
          <p class="ml-2">whatsapp group</p>
        </div>
        <div class="flex items-center mt-12">
          <Link
            class="px-6 py-2 mb-2 border-x-2 border-y-2 border-gray-200 rounded"
            href=""
          >
            <div class="flex items-center">
              <span class="material-symbols-outlined mr-2"> content_copy </span>
              coppy link
            </div>
          </Link>
          <Link
            class="
              ml-2
              px-6
              py-2
              mb-2
              border-x-2 border-y-2 border-gray-200
              rounded
            "
            href=""
          >
            <div class="flex items-center">
              <span class="material-symbols-outlined mr-2"> share </span>
              Share
            </div>
          </Link>
        </div>
        <div class="mt-7 flex items-center">
          <Link
            class="
              flex
              justify-center
              px-12
              py-2
              text-sm text-black
              hover:text-white
              bg-[#d8ff5f]
              hover:bg-[#3B4D00] hover:border-[#3B4D00]
              rounded
              border border-[#abd035]
            "
            href=""
          >
            Subscribe from BRL 12.99/month
          </Link>
        </div>
      </div>
    </div>
<div class="mt-20 mx-32 ">
    <div class="border-b">
        <div class="w-12 border-b-2 border-[#abd035]">About</div>
    </div>

    <h2 class="text-2xl mt-6">points to fly</h2>
    <p class="mt-4 border-b pb-6">Welcom to the paid WhatsApp groups of Pontons pra Voar, an option for you to learn and ask</p>
    </div>
  </WithoutSidebarLayout>
</template>
