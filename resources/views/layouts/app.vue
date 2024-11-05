<template>
    <div>
      <header>
        <x-banner />
        <NavigationMenu />
        <div class="min-h-screen bg-gray-100">
          <header v-if="header" class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
              {{ header }}
            </div>
          </header>
          <main>
            <slot />
          </main>
        </div>
      </header>
      <modal-container />
    </div>
  </template>
  
  <script>
  import NavigationMenu from '@/Components/NavigationMenu.vue'; // Adjust the path as needed
  import ModalContainer from '@/Components/ModalContainer.vue'; // Adjust if you have a modal component
  
  export default {
    props: {
      header: {
        type: String,
        default: ''
      }
    },
    components: {
      NavigationMenu,
      ModalContainer
    }
  }
  </script>
