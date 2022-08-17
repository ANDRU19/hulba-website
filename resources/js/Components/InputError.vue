<script setup>
defineProps(['message']);
</script>

<template>
    <div v-show="message">
        <p class="text-sm font-light text-red-600">
            {{ message }}
        </p>
    </div>
</template>
