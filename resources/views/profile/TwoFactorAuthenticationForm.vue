<template>
    <ActionSection>
      <template #title>
        {{ __('Two-Factor Authentication') }}
      </template>
  
      <template #description>
        {{ __('Add additional security to your account using two-factor authentication.') }}
      </template>
  
      <template #content>
        <div class="max-w-xl">
          <form @submit.prevent="updateTwoFactorAuthentication">
            <div class="flex items-center">
              <InputCheckbox v-model="enabled" />
              <span class="ms-3">{{ __('Enable Two-Factor Authentication') }}</span>
            </div>
  
            <div v-if="enabled" class="mt-4">
              <Input
                type="text"
                placeholder="{{ __('Authentication Code') }}"
                v-model="form.code"
                class="mt-1 block w-full"
                required
              />
              <InputError v-if="errors.code" :message="errors.code" />
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
        enabled: false,
        form: {
          code: ''
        },
        loading: false,
        success: false,
        errors: {}
      };
    },
    methods: {
      async updateTwoFactorAuthentication() {
        this.loading = true;
        // Call your API to update two-factor authentication settings
        try {
          await this.$http.post('/two-factor-authentication/update', { enabled: this.enabled, code: this.form.code });
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
  