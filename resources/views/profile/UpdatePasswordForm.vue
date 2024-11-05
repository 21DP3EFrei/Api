<template>
    <ActionSection>
      <template #title>
        {{ __('Update Password') }}
      </template>
  
      <template #description>
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
      </template>
  
      <template #content>
        <div class="max-w-xl">
          <form @submit.prevent="updatePassword">
            <div class="mt-4">
              <Input
                type="password"
                placeholder="{{ __('Current Password') }}"
                v-model="form.current_password"
                class="mt-1 block w-full"
                required
              />
              <InputError v-if="errors.current_password" :message="errors.current_password" />
            </div>
  
            <div class="mt-4">
              <Input
                type="password"
                placeholder="{{ __('New Password') }}"
                v-model="form.new_password"
                class="mt-1 block w-full"
                required
              />
              <InputError v-if="errors.new_password" :message="errors.new_password" />
            </div>
  
            <div class="mt-4">
              <Input
                type="password"
                placeholder="{{ __('Confirm New Password') }}"
                v-model="form.new_password_confirmation"
                class="mt-1 block w-full"
                required
              />
              <InputError v-if="errors.new_password_confirmation" :message="errors.new_password_confirmation" />
            </div>
  
            <div class="mt-4">
              <Button type="submit" :disabled="loading">
                {{ __('Save') }}
              </Button>
              <ActionMessage v-if="success" class="ms-3">
                {{ __('Saved.') }}
              </ActionMessage>
            </div>
          </form>
        </div>
      </template>
    </ActionSection>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          current_password: '',
          new_password: '',
          new_password_confirmation: ''
        },
        loading: false,
        success: false,
        errors: {}
      };
    },
    methods: {
      async updatePassword() {
        this.loading = true;
        // Call your API to update the password
        try {
          await this.$http.post('/password/update', this.form);
          this.success = true;
        } catch (error) {
          this.errors = error.response.data.errors;
        } finally {
          this.loading = false;
        }
      }
    }
  };
  </script>
  