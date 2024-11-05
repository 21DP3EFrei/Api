<template>
    <div>
      <form @submit.prevent="createApiToken">
        <h3>{{ __('Create API Token') }}</h3>
        <p>{{ __('API tokens allow third-party services to authenticate with our application on your behalf.') }}</p>
  
        <div>
          <label for="name">{{ __('Token Name') }}</label>
          <input id="name" type="text" v-model="createApiTokenForm.name" autofocus />
          <span v-if="errors.name">{{ errors.name }}</span>
        </div>
  
        <div v-if="permissions.length">
          <label for="permissions">{{ __('Permissions') }}</label>
          <div>
            <div v-for="permission in permissions" :key="permission">
              <label>
                <input type="checkbox" v-model="createApiTokenForm.permissions" :value="permission" />
                {{ permission }}
              </label>
            </div>
          </div>
        </div>
  
        <button type="submit">{{ __('Create') }}</button>
        <span v-if="message">{{ message }}</span>
      </form>
  
      <div v-if="user.tokens.length">
        <h4>{{ __('Manage API Tokens') }}</h4>
        <p>{{ __('You may delete any of your existing tokens if they are no longer needed.') }}</p>
        <div v-for="token in user.tokens" :key="token.id">
          <div>{{ token.name }}</div>
          <div>
            <button @click="manageApiTokenPermissions(token.id)">{{ __('Permissions') }}</button>
            <button @click="confirmApiTokenDeletion(token.id)">{{ __('Delete') }}</button>
          </div>
        </div>
      </div>
  
      <!-- Modals for displaying token, permissions, and confirmation -->
      <TokenModal v-if="displayingToken" :token="plainTextToken" @close="displayingToken = false" />
      <PermissionsModal v-if="managingApiTokenPermissions" :permissions="updateApiTokenForm.permissions" @close="managingApiTokenPermissions = false" />
      <ConfirmationModal v-if="confirmingApiTokenDeletion" @confirm="deleteApiToken" @cancel="confirmingApiTokenDeletion = false" />
    </div>
  </template>
  
  <script>
  import TokenModal from '@/Components/TokenModal.vue';
  import PermissionsModal from '@/Components/PermissionsModal.vue';
  import ConfirmationModal from '@/Components/ConfirmationModal.vue';
  
  export default {
    data() {
      return {
        createApiTokenForm: {
          name: '',
          permissions: [],
        },
        user: {
          tokens: [], // Populate this with data from the server
        },
        displayingToken: false,
        plainTextToken: '',
        managingApiTokenPermissions: false,
        confirmingApiTokenDeletion: false,
        message: '',
        errors: {},
        permissions: [], // Populate with available permissions
      };
    },
    methods: {
      createApiToken() {
        // Call your API to create a token
      },
      manageApiTokenPermissions(tokenId) {
        // Open permissions modal
      },
      confirmApiTokenDeletion(tokenId) {
        this.confirmingApiTokenDeletion = tokenId;
      },
      deleteApiToken() {
        // Call your API to delete the token
      },
    },
  };
  </script>
  