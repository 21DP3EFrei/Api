<template>
    <nav class="bg-white border-b border-gray-100" aria-label="Main Navigation">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <!-- Logo -->
          <div class="shrink-0 flex items-center">
            <router-link class="navbar-brand" to="/">
              <img src="/images/lugu.png" alt="Logo" />
            </router-link>
          </div>
  
          <!-- Navigation Links -->
          <div class="hidden space-x-8 sm:flex">
            <NavLink href="/" label="Welcome" :is-active="routeName === 'welcome'" />
            <NavLink href="/upload" label="Upload" :is-active="routeName === 'upload'" />
            <NavLink href="/pictures" label="Gallery" :is-active="routeName === 'pictures.index'" />
            <NavLink
              v-if="canAccessCategories"
              href="/categories"
              label="Categories"
              :is-active="routeName === 'categories.index'"
            />
            <NavLink
              v-if="canAccessVerification"
              href="/verification"
              label="Verify"
              :is-active="routeName === 'verification.index'"
            />
          </div>
  
          <!-- User Profile and Settings -->
          <UserProfileMenu :user="user" :teams="teams" />
        </div>
      </div>
    </nav>
  </template>
  
  <script setup>
  import { computed } from 'vue';
  import { usePage } from '@inertiajs/vue3';
  import NavLink from './NavLink.vue';
  import UserProfileMenu from './UserProfileMenu.vue';
  
  const page = usePage();
  const routeName = computed(() => page.props.currentRouteName);
  const user = computed(() => page.props.auth.user);
  const teams = computed(() => user.value?.allTeams || []);
  const canAccessCategories = computed(() => page.props.permissions.includes('access-categories'));
  const canAccessVerification = computed(() => page.props.permissions.includes('access-verification'));
  </script>
  
  