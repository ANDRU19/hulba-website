<template>
  <div class="border border-gray-400 rounded-md p-2 mt-5">
<!-- One-time payment -->
    <div>
      <input
        type="radio"
        id="one-time-payment"
        class="mr-3"
        :checked="one_time_payment"
        @change="data.plan = 'one-time-payment';
                one_time_payment = true; 
                signature = false; 
                monthlyplan = false; 
                quartery = false; 
                semestral = false; 
                annual =false"
      />
      <label class="font-bold" for="one-time-payment">One-time payment</label>
    </div>
    <div v-if="one_time_payment">
      <div class="mt-4">
        <label>Price</label>
        <input
          type="text"
          v-model="data.price"
          class="
            w-full
            px-4
            py-2
            mt-2
            border
            rounded-md
            focus:outline-none focus:ring-1 focus:ring-blue-600
          "
        />
      </div>
    </div>

<!-- Signature -->
    <div>
      <input
        type="radio"
        id="signature"
        class="mr-3"
        :checked="signature"
        @change="signature = true; one_time_payment = false"
      />
      <label class="font-bold" for="signature">Signature</label>
    </div>

    <div v-if="signature">
      <!-- Monthly plan -->
      <div class="border border-gray-400 rounded-md p-2 mt-5">
        <input
          type="radio"
          id="monthlyplan"
          class="mr-3"
          :checked="monthlyplan"
          @change="data.plan = 'monthly';
                  monthlyplan = true; 
                  quartery = false; 
                  semestral = false; 
                  annual = false"
        />
        <label class="font-bold" for="monthlyplan">Monthly plan</label>
        <div v-if="monthlyplan">
          <div class="mt-4">
            <label>Total</label>
            <input
              type="text"
              v-model="data.price"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div>
            <label>Number of grace days</label>
            <select
              v-model="data.days"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
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
      <div class="border border-gray-400 rounded-md p-2 mt-5">
        <input
          type="radio"
          id="quartery"
          class="mr-3"
          :checked="quartery"
          @change="data.plan = 'quartery';
                  quartery = true; 
                  monthlyplan = false; 
                  semestral = false; 
                  annual = false"
        />
        <label class="font-bold" for="quartery">Quartery plan</label>
        <div v-if="quartery">
          <div class="mt-4">
            <label>Monthly</label>
            <input
              v-model="data.monthly"
              type="text"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div>
            <label>Total</label>
            <input
              type="text"
              v-model="data.price"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div>
            <label>Number of grace days</label>
            <select
              v-model="data.days"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
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
      <div class="border border-gray-400 rounded-md p-2 mt-5">
        <input
          type="radio"
          id="semestral"
          class="mr-3"
          :checked="semestral"
          @change="data.plan = 'semestral';
                  semestral = true; 
                  quartery = false; 
                  monthlyplan = false; 
                  annual = false"
        />
        <label class="font-bold" for="semestral">Semestral plan</label>
        <div v-if="semestral">
          <div class="mt-4">
            <label>Monthly</label>
            <input
              v-model="data.monthly"
              type="text"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div>
            <label>Total</label>
            <input
              type="text"
              v-model="data.price"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div>
            <label>Number of grace days</label>
            <select
              v-model="data.days"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
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
      <div class="border border-gray-400 rounded-md p-2 mt-5">
        <input
          type="radio"
          id="annual"
          class="mr-3"
          :checked="annual"
          @change="data.plan = 'annual';
                  annual = true; 
                  semestral=false; 
                  monthlyplan=false; 
                  quartery=false"
        />
        <label class="font-bold" for="annual">Annual plan</label>
        <div v-if="annual">
          <div class="mt-4">
            <label>Monthly</label>
            <input
              type="text"
              v-model="data.monthly"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div>
            <label>Total</label>
            <input
              type="text"
              v-model="data.price"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
                focus:outline-none focus:ring-1 focus:ring-blue-600
              "
            />
          </div>
          <div>
            <label>Number of grace days</label>
            <select
              v-model="data.days"
              class="
                w-full
                px-4
                py-2
                mt-2
                border
                rounded-md
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
 
export default {

  props: {
    data: Object
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
  }
};
</script>