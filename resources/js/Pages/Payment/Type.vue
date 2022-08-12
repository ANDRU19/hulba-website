<template>
  <div class="border border-gray-400 rounded-md mt-5">
    <!-- One-time payment -->
    <div class="p-2">
      <input
        type="radio"
        id="one-time-payment"
        class="mr-3"
        :checked="one_time_payment"
        @change="
          data.plan = 'one-time-payment';
          one_time_payment = true;
          signature = false;
          monthlyplan = false;
          quartery = false;
          semestral = false;
          annual = false;
        "
      />
      <label class="font-bold" for="one-time-payment">One-time payment</label>
    </div>
    <div class="p-2" v-if="one_time_payment">
      <div class="mb-4">
        <Label>Price</Label>
        <div class="mt-1 flex rounded-md shadow-sm">
          <span
            class="
              inline-flex
              items-center
              px-3
              rounded-l-md
              border border-r-0 border-gray-300
              bg-gray-50
              text-gray-500
              sm:text-sm
            "
          >
            R$
          </span>
          <Input
            placeholder="0.00"
            type="text"
            v-model="data.price"
            class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
            "
          />
        </div>
      </div>
    </div>

    <!-- Signature -->
    <div class="border-t border-gray-400 p-2">
      <input
        type="radio"
        id="signature"
        class="mr-3"
        :checked="signature"
        @change="
          signature = true;
          one_time_payment = false;
        "
      />
      <label class="font-bold" for="signature">Signature</label>
    </div>

    <div  class="border border-gray-400 rounded-md mt-4 ml-2 mr-2 mb-4" v-if="signature">
      <!-- Monthly plan -->
      <div class="p-2">
        <input
          type="radio"
          id="monthlyplan"
          class="mr-3"
          :checked="monthlyplan"
          @change="
            data.plan = 'monthly';
            monthlyplan = true;
            quartery = false;
            semestral = false;
            annual = false;
          "
        />
        <label class="font-bold" for="monthlyplan">Monthly plan</label>
        <div v-if="monthlyplan">
          <div class="mt-4">
            <Label>Total</Label>
            <div class="mt-1 flex rounded-md shadow-sm">
          <span
            class="
              inline-flex
              items-center
              px-3
              rounded-l-md
              border border-r-0 border-gray-300
              bg-gray-50
              text-gray-500
              sm:text-sm
            "
          >
            R$
          </span>
            <Input
              type="text"
              v-model="data.price"
              class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
              "
            />
            </div>
          </div>
          <div class="mt-2 mb-5">
            <Label>Number of grace days</Label>
            <select
              v-model="data.days"
              class="
                w-full
                px-4
                py-2
                mt-2
                border-gray-300
                rounded-md
                sm:text-sm
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            >
              <option value="0">disabled</option>
              <option value="1">1</option>
              <option value="3">3</option>
              <option value="7">7</option>
              <option value="14">14</option>
              <option value="30">30</option>
              <option value="60">60</option>
              <option value="90">90</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Quartery plan -->
      <div class="border-t border-b border-gray-400 p-2">
        <input
          type="radio"
          id="quartery"
          class="mr-3"
          :checked="quartery"
          @change="
            data.plan = 'quartery';
            quartery = true;
            monthlyplan = false;
            semestral = false;
            annual = false;
          "
        />
        <label class="font-bold" for="quartery">Quartery plan</label>
        <div v-if="quartery">
          <div class="mt-4">
            <Label>Monthly</Label>
            <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                px-3
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                text-gray-500
                sm:text-sm
              "
            >
              R$
            </span>
            <input
              v-model="data.monthly"
              type="text"
              class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
              "
            />
            </div>
          </div>
          <div class="mt-2">
            <Label>Total</Label>
            <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                px-3
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                text-gray-500
                sm:text-sm
              "
            >
              R$
            </span>
            <input
              type="text"
              v-model="data.price"
              class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
              "
            />
            </div>
          </div>
          <div class="mt-2 mb-5">
            <Label>Number of grace days</Label>
            <select
              v-model="data.days"
              class="
                w-full
                px-4
                py-2
                mt-2
                border-gray-300
                rounded-md
                sm:text-sm
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            >
              <option value="0">disabled</option>
              <option value="1">1</option>
              <option value="3">3</option>
              <option value="7">7</option>
              <option value="14">14</option>
              <option value="30">30</option>
              <option value="60">60</option>
              <option value="90">90</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Semestral plan -->
      <div class="border-b border-gray-400 p-2">
        <input
          type="radio"
          id="semestral"
          class="mr-3"
          :checked="semestral"
          @change="
            data.plan = 'semestral';
            semestral = true;
            quartery = false;
            monthlyplan = false;
            annual = false;
          "
        />
        <label class="font-bold" for="semestral">Semestral plan</label>
        <div v-if="semestral">
          <div class="mt-4">
            <Label>Monthly</Label>
            <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                px-3
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                text-gray-500
                sm:text-sm
              "
            >
              R$
            </span>
            <input
              v-model="data.monthly"
              type="text"
              class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
              "
            />
            </div>
          </div>
          <div class="mt-2">
            <Label>Total</Label>
            <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                px-3
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                text-gray-500
                sm:text-sm
              "
            >
              R$
            </span>
            <input
              type="text"
              v-model="data.price"
              class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
              "
            />
            </div>
          </div>
          <div class="mt-2 mb-5">
            <Label>Number of grace days</Label>
            <select
              v-model="data.days"
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
            >
              <option value="0">disabled</option>
              <option value="1">1</option>
              <option value="3">3</option>
              <option value="7">7</option>
              <option value="14">14</option>
              <option value="30">30</option>
              <option value="60">60</option>
              <option value="90">90</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Annual plan -->
      <div class=" border-gray-400 rounded-md p-2">
        <input
          type="radio"
          id="annual"
          class="mr-3"
          :checked="annual"
          @change="
            data.plan = 'annual';
            annual = true;
            semestral = false;
            monthlyplan = false;
            quartery = false;
          "
        />
        <label class="font-bold" for="annual">Annual plan</label>
        <div v-if="annual">
          <div class="mt-4">
            <Label>Monthly</Label>
            <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                px-3
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                text-gray-500
                sm:text-sm
              "
            >
              R$
            </span>
            <input
              type="text"
              v-model="data.monthly"
              class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
              "
            />
          </div>
          </div>
          <div class="mt-2">
            <Label>Total</Label>
            <div class="mt-1 flex rounded-md shadow-sm">
            <span
              class="
                inline-flex
                items-center
                px-3
                rounded-l-md
                border border-r-0 border-gray-300
                bg-gray-50
                text-gray-500
                sm:text-sm
              "
            >
              R$
            </span>
            <input
              type="text"
              v-model="data.price"
              class="
              placeholder-[#dedede]
              flex-1
              min-w-0
              block
              w-full
              px-3
              py-2
              rounded-none rounded-r-md
              focus:ring-indigo-500 focus:border-indigo-500
              sm:text-sm
              border-gray-300
              "
            />
          </div>
          </div>
          <div class="mt-2 mb-5">
            <Label>Number of grace days</Label>
            <select
              v-model="data.days"
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
            >
              <option value="0">disabled</option>
              <option value="1">1</option>
              <option value="3">3</option>
              <option value="7">7</option>
              <option value="14">14</option>
              <option value="30">30</option>
              <option value="60">60</option>
              <option value="90">90</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
export default {
  components: {
    Input,
    Label,
  },

  props: {
    data: Object,
  },
  data() {
    return {
      monthlyplan: false,
      quartery: false,
      semestral: false,
      annual: false,
      signature: false,
      one_time_payment: false,
    };
  },
};
</script>