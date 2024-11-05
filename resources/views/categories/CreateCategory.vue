<template>
    <div class="container">
      <h1>Create Category</h1>
      <form @submit.prevent="createCategory">
        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="name" v-model="category.name" required />
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" v-model="category.description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        category: {
          name: '',
          description: ''
        }
      };
    },
    methods: {
      async createCategory() {
        try {
          await this.$http.post('/categories', this.category);
          this.$router.push({ name: 'categories.index' });
        } catch (error) {
          console.error(error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
  </style>
  