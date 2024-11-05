<template>
  <div class="container">
    <h1>Create Subcategory</h1>
    <form @submit.prevent="createSubcategory">
      <div class="mb-3">
        <label for="name" class="form-label">Subcategory Name</label>
        <input type="text" class="form-control" v-model="form.Nosaukums" required />
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" v-model="form.Apraksts"></textarea>
      </div>
      <div class="mb-3">
        <label for="kategorija_id" class="form-label">Category</label>
        <select class="form-select" v-model="form.kategorija_id" required>
          <option v-for="category in categories" :key="category.K_ID" :value="category.K_ID">
            {{ category.Nosaukums }}
          </option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
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
    async createSubcategory() {
      await this.$axios.post('/api/subcategories', this.form);
      this.$router.push({ name: 'SubcategoriesIndex' });
    },
    async fetchCategories() {
      const response = await this.$axios.get('/api/categories');
      this.categories = response.data;
    }
  },
  created() {
    this.fetchCategories();
  }
};
</script>
