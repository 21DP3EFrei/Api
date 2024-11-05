<template>
    <div class="container">
      <h1>Welcome</h1>
      <div v-if="isAuthenticated">
        <p>Hello, {{ userName }}!</p>
        <p>You are logged in as a {{ userType }}.</p>
      </div>
      <div v-else>
        <p>Please log in to access this area.</p>
      </div>
    </div>
  </template>
  
  <script setup>
  import Layout from "Layout.vue";
  import { computed } from 'vue';
  import { usePage } from '@inertiajs/vue3';
  
  // Access user information from Inertia's page props
  const page = usePage();
  const isAuthenticated = computed(() => page.props.auth.user !== null);
  const userName = computed(() => page.props.auth.user?.name);
  const userType = computed(() => page.props.auth.user?.usertype);
  </script>
  
  <style>
  @import 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
  </style>
  