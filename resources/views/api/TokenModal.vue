<template>
    <div>
      <h3>{{ __('API Token') }}</h3>
      <p>{{ __('Please copy your new API token. For your security, it won\'t be shown again.') }}</p>
      <input type="text" :value="token" readonly />
      <button @click="$emit('close')">{{ __('Close') }}</button>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      token: String,
    },
  };
  </script>
  