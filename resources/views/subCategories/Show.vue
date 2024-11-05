<template>
    <div class="container">
      <h1>Subcategory Details</h1>
      <p><strong>Subcategory Name:</strong> {{ subcategory.Nosaukums }}</p>
      <p><strong>Description:</strong> {{ subcategory.Apraksts }}</p>
      <p><strong>Category:</strong> {{ subcategory.kategorija?.Nosaukums }}</p>
      <pre>{{ subcategory }}</pre>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        subcategory: {}
      };
    },
    methods: {
      async fetchSubcategory() {
        const response = await this.$axios.get(`/api/subcategories/${this.$route.params.id}`);
        this.subcategory = response.data;
      }
    },
    created() {
      this.fetchSubcategory();
    }
  };
  </script>
  