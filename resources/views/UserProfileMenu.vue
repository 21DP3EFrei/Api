<template>
    <div>
      <div v-if="user" class="flex items-center">
        <button @click="toggleDropdown">
          <img v-if="user.profile_photo_url" :src="user.profile_photo_url" alt="Profile Photo" class="h-8 w-8 rounded-full" />
          <span v-else>{{ user.name }}</span>
        </button>
  
        <div v-show="dropdownOpen" @click.outside="dropdownOpen = false">
          <!-- User Profile Links -->
          <router-link to="/profile">Profile</router-link>
          <router-link to="/logout" @click.prevent="logout">Log Out</router-link>
  
          <!-- Team management options if applicable -->
          <div v-if="teams.length > 1">
            <router-link v-for="team in teams" :key="team.id" :to="`/teams/${team.id}`">
              {{ team.name }}
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import Layout from "Layout.vue";
  import { ref, computed, defineProps } from 'vue';
  import { usePage, useForm } from '@inertiajs/vue3';
  
  const props = defineProps({ user: Object, teams: Array });
  const dropdownOpen = ref(false);
  const toggleDropdown = () => (dropdownOpen.value = !dropdownOpen.value);
  
  const logout = () => {
    const form = useForm();
    form.post('/logout');
  };
  </script>
  
