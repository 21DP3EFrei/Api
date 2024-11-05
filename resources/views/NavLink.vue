<template>
    <router-link :to="href" :class="{ 'text-blue-500': isActive }">
      {{ label }}
    </router-link>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  
  const props = defineProps({
    href: String,
    label: String,
    isActive: Boolean,
  });
  </script>
  
  <style scoped>
  /* Custom styling can be added here */
  </style>
  