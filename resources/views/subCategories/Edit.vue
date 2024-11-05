<template>
    <div class="container">
      <h1>Edit Subcategory</h1>
      <form @submit.prevent="updateSubcategory">
        <div class="mb-3">
          <label for="Nosaukums" class="form-label">Subcategory Name:</label>
          <input type="text" class="form-control" v-model="form.Nosaukums" required />
        </div>
        <div class="mb-3">
          <label for="Apraksts" class="form-label">Description:</label>
          <textarea class="form-control" v-model="form.Apraksts"></textarea>
        </div>
        <div class="mb-3">
          <label for="kategorija_id" class="form-label">Category:</label>
          <select class="form-select" v-model="form.kategorija_id" required>
            <option v-for="category in categories" :key="category.K_ID" :value="category.K_ID">
              {{ category.Nosaukums }}
            </option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          Nosaukums: '',
          Apraksts: '',
          kategorija_id: ''
        },
        categories: []
      };
    },
    methods: {
      async updateSubcategory() {
        await this.$axios.put(`/api/subcategories/${this.$route.params.id}`, this.form);
        this.$router.push({ name: 'SubcategoriesIndex' });
      },
      async fetchSubcategory() {
        const response = await this.$axios.get(`/api/subcategories/${this.$route.params.id}`);
        this.form = response.data;
      },
      async fetchCategories() {
        const response = await this.$axios.get('/api/categories');
        this.categories = response.data;
      }
    },
    created() {
      this.fetchSubcategory();
      this.fetchCategories();
    }
  };
  </script>
