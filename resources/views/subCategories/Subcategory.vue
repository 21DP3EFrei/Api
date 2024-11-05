<template>
    <div class="container">
      <h1>Subcategories</h1>
      <router-link to="/subcategories/create" class="btn btn-primary mb-3">Create New Subcategory</router-link>
      <router-link to="/categories" class="btn btn-primary mb-3">Back to Categories</router-link>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="subcategory in subcategories" :key="subcategory.id">
            <td>{{ subcategory.Nosaukums }}</td>
            <td>{{ subcategory.Apraksts }}</td>
            <td>{{ subcategory.kategorija?.Nosaukums }}</td>
            <td>
              <router-link :to="{ name: 'SubcategoriesEdit', params: { id: subcategory.id } }" class="btn btn-sm btn-primary">Edit</router-link>
              <button class="btn btn-sm btn-danger" @click="deleteSubcategory(subcategory.id)">Delete</button>
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
        subcategories: []
      };
    },
    methods: {
      async fetchSubcategories() {
        const response = await this.$axios.get('/api/subcategories');
        this.subcategories = response.data;
      },
      async deleteSubcategory(id) {
        if (confirm('Are you sure you want to delete this subcategory?')) {
          await this.$axios.delete(`/api/subcategories/${id}`);
          this.fetchSubcategories(); // Refresh the list
        }
      }
    },
    created() {
      this.fetchSubcategories();
    }
  };
  </script>
 