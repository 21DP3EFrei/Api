<template>
    <div class="container">
      <h1>Categories</h1>
      <router-link to="/categories/create" class="btn btn-primary mb-3">Create New Category</router-link>
      <router-link to="/subcategories" class="btn btn-primary mb-3">Switch to Subcategories</router-link>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in categories" :key="category.K_ID">
            <td>{{ category.Nosaukums }}</td>
            <td>{{ category.Apraksts }}</td>
            <td>
              <router-link :to="{ name: 'categories.edit', params: { id: category.K_ID } }" class="btn btn-sm btn-primary">Edit</router-link>
              <button class="btn btn-sm btn-danger" @click="deleteCategory(category.K_ID)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        categories: []
      };
    },
    created() {
      this.fetchCategories();
    },
    methods: {
      async fetchCategories() {
        const response = await this.$http.get('/categories');
        this.categories = response.data;
      },
      async deleteCategory(id) {
        if (confirm('Are you sure you want to delete this category?')) {
          await this.$http.delete(`/categories/${id}`);
          this.fetchCategories();
        }
      }
    }
  };
  </script>
  
  <style scoped>
  @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
  </style>
  