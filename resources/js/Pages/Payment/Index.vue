<template>
  <Head title="Dashboard" />

  <WithoutSidebarLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        My products
      </h2>
    </template>
    <div class="grid grid-cols-2 gap-4">
      <div class="flex flex-1 justify-star px-4">
        <h1 class="text-2xl font-semibold text-gray-900">My products</h1>
      </div>
      <div class="flex flex-1 justify-end">
        <Link
          class="px-6 py-2 mb-2 border-x-2 border-y-2 border-black rounded"
          :href="route('product.create')"
        >
          Product Create
        </Link>
      </div>
    </div>
    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <table>
          <thead class="font-bold border-b border-gray-200">
            <td class="px-4 py-2">Active</td>
          </thead>
          <tbody>
            <tr v-for="payment in payments.data" :key="payment.id">
              <td class="px-4 py-2">
                <div class="grid grid-cols-2 gap-4">
                  <img
                    class="w-11"
                    :src="'/storage/' + payment.product.image.name"
                  />
                  {{ payment.product.title }}
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <pagination :links="payments.links" />
      </div>
    </div>
  </WithoutSidebarLayout>
</template>

<script>
import WithoutSidebarLayout from "@/Layouts/WithoutSidebarLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Layouts/Partials/Pagination.vue";
export default {
  components: {
    WithoutSidebarLayout,
    Pagination,
    Head,
    Link,
  },
  props: {
    payments: Object,
  },
  methods: {},
};
</script>