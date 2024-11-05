<template>
    <ActionSection>
      <template #title>
        {{ __('Browser Sessions') }}
      </template>
  
      <template #description>
        {{ __('Manage and log out your active sessions on other browsers and devices.') }}
      </template>
  
      <template #content>
        <div class="max-w-xl text-sm text-gray-600">
          {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </div>
  
        <div v-if="sessions.length" class="mt-5 space-y-6">
          <div v-for="session in sessions" :key="session.id" class="flex items-center">
            <div>
              <svg v-if="session.agent.isDesktop" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
              </svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
              </svg>
            </div>
  
            <div class="ms-3">
              <div class="text-sm text-gray-600">
                {{ session.agent.platform || __('Unknown') }} - {{ session.agent.browser || __('Unknown') }}
              </div>
  
              <div>
                <div class="text-xs text-gray-500">
                  {{ session.ip_address }},
                  <span v-if="session.is_current_device" class="text-green-500 font-semibold">{{ __('This device') }}</span>
                  <span v-else>{{ __('Last active') }} {{ session.last_active }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="flex items-center mt-5">
          <Button @click="confirmLogout" :disabled="loading">
            {{ __('Log Out Other Browser Sessions') }}
          </Button>
  
          <ActionMessage v-if="loggedOut" class="ms-3">
            {{ __('Done.') }}
          </ActionMessage>
        </div>
  
        <!-- Log Out Other Devices Confirmation Modal -->
        <DialogModal v-if="confirmingLogout" @close="confirmingLogout = false">
          <template #title>
            {{ __('Log Out Other Browser Sessions') }}
          </template>
  
          <template #content>
            {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
  
            <div class="mt-4" @focus="focusPassword">
              <Input
                type="password"
                class="mt-1 block w-3/4"
                placeholder="{{ __('Password') }}"
                v-model="password"
                @keydown.enter="logoutOtherBrowserSessions"
              />
              <InputError v-if="errors.password" :message="errors.password" />
            </div>
          </template>
  
          <template #footer>
            <SecondaryButton @click="confirmingLogout = false" :disabled="loading">
              {{ __('Cancel') }}
            </SecondaryButton>
  
            <Button class="ms-3" @click="logoutOtherBrowserSessions" :disabled="loading">
              {{ __('Log Out Other Browser Sessions') }}
            </Button>
          </template>
        </DialogModal>
      </template>
    </ActionSection>
  </template>
  
  <script>
  export default {
    data() {
      return {
        sessions: [], // Fetch from your API
        confirmingLogout: false,
        password: '',
        loading: false,
        loggedOut: false,
        errors: {}
      };
    },
    methods: {
      async confirmLogout() {
        this.confirmingLogout = true;
      },
      async logoutOtherBrowserSessions() {
        this.loading = true;
        // Call your API to log out other sessions
        // Handle response and set errors if needed
        this.loading = false;
        this.loggedOut = true;
        this.confirmingLogout = false;
      },
      focusPassword() {
        this.$nextTick(() => {
          this.$refs.password.focus();
        });
      }
    }
  };
  </script>
  