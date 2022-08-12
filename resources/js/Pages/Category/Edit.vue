<template>
  <Head title="Customers" />

  <AppLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit</h2>
    </template>

    <div class="">
      <div class="mx-auto max-w-5xl w-2/3 sm:px-6 lg:px-8">
        <div class="bg-white">
          <form @submit.prevent="submit">
            <div>
              <Label for="name">Name</Label>
              <Input
                type="text"
                v-model="form.name"
                class="
                  w-full
                  px-4
                  py-2
                  mt-2
                  border
                  rounded-md
                  sm:text-sm
                  focus:outline-none focus:ring-1 focus:ring-blue-600
                "
              />
            </div>

            <!-- submit -->
            <div class="flex items-center mt-4">
              <button class="w-full px-6 py-2 text-white bg-gray-400 rounded">
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";

export default {
  components: {
    AppLayout,
    Head,
    Label,
    Input,
  },
  setup(props) {
    const form = useForm({
      name: props.category.name,
    });

    return { form };
  },
  props: {
    category: Object,
  },
  methods: {
    submit() {
      this.form.put(route("category.update", this.category.id));
    },
  },
};
</script>