<template>
    <div>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('API Tokens') }}
      </h2>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <ApiTokenManager />
      </div>
    </div>
  </template>
  
  <script>
  import ApiTokenManager from '@/Components/ApiTokenManager.vue';
  
  export default {
    components: {
      ApiTokenManager,
    },
  };
  </script>
  
