<template>
    <div class="container">
      <h1>Category Details</h1>
      <p><strong>Category Name:</strong> {{ category.Nosaukums }}</p>
      <p><strong>Description:</strong> {{ category.Apraksts }}</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        category: {}
      };
    },
    created() {
      this.fetchCategory();
    },
    methods: {
      async fetchCategory() {
        const response = await this.$http.get(`/categories/${this.$route.params.id}`);
        this.category = response.data;
      }
    }
  };
  </script>
  
  <style scoped>
  @import url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
  </style>
  