<template>
    <AppLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Profile') }}
        </h2>
      </template>
  
      <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
          <UpdateProfileInformationForm v-if="canUpdateProfileInformation" />
          <SectionBorder />
  
          <UpdatePasswordForm v-if="canUpdatePasswords" class="mt-10 sm:mt-0" />
  
          <TwoFactorAuthenticationForm v-if="canManageTwoFactorAuthentication" class="mt-10 sm:mt-0" />
  
          <LogoutOtherBrowserSessionsForm class="mt-10 sm:mt-0" />
  
          <DeleteUserForm class="mt-10 sm:mt-0" />
        </div>
      </div>
    </AppLayout>
  </template>
  
  <script>
  import UpdateProfileInformationForm from './UpdateProfileInformationForm.vue';
  import UpdatePasswordForm from './UpdatePasswordForm.vue';
  import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm.vue';
  import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm.vue';
  import DeleteUserForm from './DeleteUserForm.vue';
  
  export default {
    components: {
      UpdateProfileInformationForm,
      UpdatePasswordForm,
      TwoFactorAuthenticationForm,
      LogoutOtherBrowserSessionsForm,
      DeleteUserForm
    },
    data() {
      return {
        canUpdateProfileInformation: true, // Determine based on your conditions
        canUpdatePasswords: true, // Determine based on your conditions
        canManageTwoFactorAuthentication: true // Determine based on your conditions
      };
    }
  };
  </script>
  