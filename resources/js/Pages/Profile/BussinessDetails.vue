<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import TextArea from "@/Components/TextArea.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import InputError from "@/Components/InputError.vue";


const detailsForm = useForm({
  zip_code: "",
  address: "",
  neighborhood: "",
  number: "",
  add_on: "",
  city: "",
  state: "",
  fullname: "",
  description: "",
  bank: "",
  agency: "",
  account: "",
  account_type: "chain",
});

const submit = () => {
  detailsForm.post(route("customer.bussiness.details.store"));
};

</script>

<template>
  <Head title="Customers" />

  <AppLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Datails</h2>
    </template>

    <div class="">
      <div class="mx-auto max-w-5xl w-2/3 sm:px-6 lg:px-8">
        <div class="bg-white">
          <h3 class="text-2xl">you are allmost there</h3>
          <div class="mt-2 font-light text-md">
            We need some more information
          </div>

          <div class="mt-5">
            <form @submit.prevent="submit">
              <div class="grid grid-cols-12 gap-x-6">
                <div class="col-span-12 lg:col-span-12 mt-5">
                  <Label for="zip_code" value="Zip Code" />
                  <Input
                    id="zip_code"
                    placeholder=""
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.zip_code"
                    required
                  />
                  <InputError
                    :message="detailsForm.errors.zip_code"
                  ></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="address" value="Address" />
                  <Input
                    id="address"
                    placeholder=""
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.address"
                    required
                  />
                  <InputError
                    :message="detailsForm.errors.address"
                  ></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="neightborhood" value="Neighborhood" />
                  <Input
                    id="neighborhood"
                    placeholder=""
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.neighborhood"
                    required
                  />
                  <InputError
                    :message="detailsForm.errors.neighborhood"
                  ></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="number" value="Number" />
                  <Input
                    id="number"
                    placeholder=""
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.number"
                    required
                  />
                  <InputError :message="detailsForm.errors.number"></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="add_on" value="Add-on (optional)" />
                  <Input
                    id="add_on"
                    placeholder=""
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.add_on"
                    required
                  />
                  <InputError :message="detailsForm.errors.add_on"></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="city" value="City" />
                  <Input
                    id="city"
                    placeholder=""
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.city"
                    required
                  />
                  <InputError :message="detailsForm.errors.city"></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="state" value="State" />
                  <Input
                    id="state"
                    placeholder=""
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.state"
                    required
                  />
                  <InputError
                    :message="detailsForm.errors.state"
                  ></InputError>
                </div>

                <div class="col-span-12 lg:col-span-12 mt-5">
                  <Label for="fullname" value="Full Name or Company Name" />
                  <Input
                    id="fullname"
                    placeholder="eg Pedro Silva Sales"
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.fullname"
                    required
                  />
                  <InputError
                    :message="detailsForm.errors.fullname"
                  ></InputError>
                </div>

                <div class="col-span-12 lg:col-span-12 mt-5">
                  <Label for="description" value="Description your business" />
                  <Input
                    id="description"
                    placeholder="eg Guitar lessons cources"
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.description"
                    required
                  />
                  <InputError
                    :message="detailsForm.errors.description"
                  ></InputError>
                </div>

                <div class="col-span-12 lg:col-span-12 mt-5">
                  <Label for="bank" value="Bank" />
                  <Input
                    id="bank"
                    rows="3"
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.bank"
                    required
                  />
                  <InputError :message="detailsForm.errors.bank"></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="agency" value="Agency and Digit" />
                  <Input
                    id="agency"
                    placeholder="000-D"
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.agency"
                    required
                  />
                  <InputError :message="detailsForm.errors.agency"></InputError>
                </div>

                <div class="col-span-12 lg:col-span-6 mt-5">
                  <Label for="account" value="Account and Digit" />
                  <Input
                    id="account"
                    placeholder="00000000-D"
                    type="text"
                    class="
                      flex-1
                      min-w-0
                      block
                      w-full
                      px-3
                      py-2
                      rounded
                      focus:ring-indigo-500 focus:border-indigo-500
                      sm:text-sm
                      border-gray-300
                      mt-1
                      placeholder-[#dedede]
                    "
                    v-model="detailsForm.account"
                    required
                  />
                  <InputError
                    :message="detailsForm.errors.account"
                  ></InputError>
                </div>

                <div
                  class="
                    col-span-12
                    lg:col-span-6
                    mt-5
                    rounded
                    border border-gray-300
                    py-2
                  "
                >
                  <input
                    type="radio"
                    id="chain"
                    class="mx-3"
                    value="chain"
                    v-model="detailsForm.account_type"
                  />
                  <label class="font-light text-sm text-gray-700" for="chain"
                    >Chain</label
                  >
                </div>

                <div
                  class="
                    col-span-12
                    lg:col-span-6
                    mt-5
                    rounded
                    border border-gray-300
                    py-2
                  "
                >
                  <input
                    type="radio"
                    id="savings"
                    class="mx-3"
                    value="savings"
                    v-model="detailsForm.account_type"
                  />
                  <label class="font-light text-sm text-gray-700" for="savings"
                    >Savings</label
                  >
                </div>

                <!-- submit -->
                <div
                  class="
                    col-span-12
                    flex
                    items-center
                    place-content-center
                    mt-10
                  "
                >
                  <button
                    class="px-6 py-2 w-full text-white bg-gray-400 rounded"
                  >
                    Check bank account
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
