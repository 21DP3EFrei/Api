<!-- Layout.vue -->
<template>
    <div>
      <!-- Header -->
      <x-app-layout>
        <template #header>
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <slot name="header"></slot>
          </h2>
        </template>
  
        <!-- Content -->
        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <slot name="content"></slot>
            </div>
          </div>
        </div>
      </x-app-layout>
    </div>
  </template>
  
  <script>
  export default {
    name: "Layout",
  };
  </script>
  