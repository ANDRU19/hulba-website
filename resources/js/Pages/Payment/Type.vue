<template>
  <div class="border border-gray-400 rounded-md p-2 mt-5">
<!-- One-time payment -->
    <div>
      <input
        type="radio"
        id="one-time-payment"
        class="mr-3"
        :checked="one_time_payment"
        @change="one_time_payment = true; signature = false; monthly=false; quartery=false; semestral=false; annual=false"
      />
      <label class="font-bold" for="one-time-payment">One-time payment</label>
    </div>
    <div v-if="one_time_payment">
      <div class="mt-4">
        <label>Price</label>
        <input
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
          id="monthly"
          class="mr-3"
          :checked="monthly"
          @change="monthly = true; quartery=false; semestral=false; annual=false"
        />
        <label class="font-bold" for="monthly">Monthly plan</label>
        <div v-if="monthly">
          <div class="mt-4">
            <label>Total</label>
            <input
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
            <label>Number of grace days</label>
            <select
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
              <option value="">disabled</option>
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
          @change="quartery = true; monthly=false; semestral=false; annual=false"
        />
        <label class="font-bold" for="quartery">Quartery plan</label>
        <div v-if="quartery">
          <div class="mt-4">
            <label>Monthly</label>
            <input
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
              <option value="">disabled</option>
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
          @change="semestral = true; quartery=false; monthly=false; annual=false"
        />
        <label class="font-bold" for="semestral">Semestral plan</label>
        <div v-if="semestral">
          <div class="mt-4">
            <label>Monthly</label>
            <input
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
              <option value="">disabled</option>
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
          @change="annual = true; semestral=false; monthly=false; quartery=false"
        />
        <label class="font-bold" for="annual">Annual plan</label>
        <div v-if="annual">
          <div class="mt-4">
            <label>Monthly</label>
            <input
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
              <option value="">disabled</option>
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
  data() {
    return {
      monthly: false,
      quartery: false,
      semestral: false,
      annual: false,
      signature: false,
      one_time_payment: false,
    };
  },
  methods: {
    submit() {
      if (this.$refs.image) {
        this.form.image = this.$refs.image.files[0];
      }
      this.form.post(route("product.store"));
    },

    previewImage(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
  },
};
</script>