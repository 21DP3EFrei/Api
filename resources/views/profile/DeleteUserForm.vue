<template>
  <ActionSection>
    <template #title>
      {{ __('Delete Account') }}
    </template>

    <template #description>
      {{ __('Permanently delete your account.') }}
    </template>

    <template #content>
      <div class="max-w-xl text-sm text-gray-600">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
      </div>

      <div class="mt-5">
        <DangerButton @click="confirmUserDeletion" :disabled="loading">
          {{ __('Delete Account') }}
        </DangerButton>
      </div>

      <!-- Delete User Confirmation Modal -->
      <DialogModal v-if="confirmingUserDeletion" @close="confirmingUserDeletion = false">
        <template #title>
          {{ __('Delete Account') }}
        </template>

        <template #content>
          {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

          <div class="mt-4" @focus="focusPassword">
            <Input
              type="password"
              class="mt-1 block w-3/4"
              placeholder="{{ __('Password') }}"
              v-model="password"
              @keydown.enter="deleteUser"
            />
            <InputError v-if="errors.password" :message="errors.password" />
          </div>
        </template>

        <template #footer>
          <SecondaryButton @click="confirmingUserDeletion = false" :disabled="loading">
            {{ __('Cancel') }}
          </SecondaryButton>

          <DangerButton class="ms-3" @click="deleteUser" :disabled="loading">
            {{ __('Delete Account') }}
          </DangerButton>
        </template>
      </DialogModal>
    </template>
  </ActionSection>
</template>

<script>
export default {
  data() {
    return {
      confirmingUserDeletion: false,
      password: '',
      loading: false,
      errors: {}
    };
  },
  methods: {
    confirmUserDeletion() {
      this.confirmingUserDeletion = true;
    },
    async deleteUser() {
      this.loading = true;
      // Call your API to delete the user here
      // Handle response and set errors if needed
      this.loading = false;
    },
    focusPassword() {
      this.$nextTick(() => {
        this.$refs.password.focus();
      });
    }
  }
};
</script>
