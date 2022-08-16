<template>
  <Head title="Dashboard" />

  <WithoutSidebarLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Help
      </h2>
    </template>
    <div class="grid grid-cols-2 gap-4">
      <div class="flex flex-1 justify-star px-4">
        <h1 class="text-2xl font-semibold text-gray-900">Help</h1>
      </div>
    </div>

  </WithoutSidebarLayout>
</template>

<script>
import WithoutSidebarLayout from "@/Layouts/WithoutSidebarLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    WithoutSidebarLayout,
    Head,
    Link,
  }
};
</script>