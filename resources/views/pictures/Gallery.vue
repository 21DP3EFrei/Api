<template>
    <div class="container">
      <h1>Gallery</h1>
  
      <form id="filterForm" @submit.prevent="submitFilterForm">
        <div class="row mb-3">
          <div class="col-md-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" v-model="filters.category_id" @change="submitFilterForm">
              <option value="">All Categories</option>
              <option v-for="category in categories" :key="category.K_ID" :value="category.K_ID">
                {{ category.Nosaukums }}
              </option>
            </select>
          </div>
  
          <div class="col-md-3">
            <label for="subcategory_id" class="form-label">Subcategory</label>
            <select class="form-select form-select-sm" id="subcategory_id" v-model="filters.subcategory_id" @change="submitFilterForm">
              <option value="">All Subcategories</option>
              <option v-for="subcategory in subcategories" :key="subcategory.id" :value="subcategory.id">
                {{ subcategory.Nosaukums }}
              </option>
            </select>
          </div>
  
          <div class="col-md-3">
            <label for="sort_by" class="form-label">Sort By</label>
            <select class="form-select form-select-sm" id="sort_by" v-model="filters.sort_by" @change="submitFilterForm">
              <option value="oldest">Oldest First</option>
              <option value="newest">Newest First</option>
              <option value="name_az">Name (A-Z)</option>
              <option value="author">Author</option>
            </select>
          </div>
  
          <div class="col-md-3">
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="searchInput" v-model="searchTerm" @input="fetchSuggestions" placeholder="Search memes..." autocomplete="off">
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <div id="autosuggestDropdown" class="dropdown-menu">
              <a v-for="suggestion in suggestions" :key="suggestion.id" class="dropdown-item" href="#">{{ suggestion.Nosaukums }}</a>
            </div>
          </div>
        </div>
      </form>
  
      <div class="row mt-3">
        <div class="col-md-3 mb-3" v-for="picture in pictures" :key="picture.id">
          <div class="card">
            <router-link :to="{ name: 'pictures.show', params: { id: picture.id } }">
              <img :src="`/storage/${picture.Attels}`" class="card-img-top" :alt="picture.Nosaukums" />
            </router-link>
            <div class="card-body">
              <h5 class="card-title">{{ picture.Nosaukums }}</h5>
              <p class="card-text">{{ picture.Apraksts }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        categories: [], // Load from your API
        subcategories: [], // Load from your API
        pictures: [], // Load from your API
        filters: {
          category_id: '',
          subcategory_id: '',
          sort_by: 'oldest',
        },
        searchTerm: '',
        suggestions: [],
      };
    },
    methods: {
      submitFilterForm() {
        this.$router.push({ query: { ...this.filters, search: this.searchTerm } });
      },
      fetchPictures() {
        // Fetch pictures based on filters and search term
      },
      fetchSuggestions() {
        if (this.searchTerm.trim() === '') {
          this.suggestions = [];
          return;
        }
  
        fetch(`{{ route('pictures.search') }}?search=${this.searchTerm}`)
          .then(response => response.json())
          .then(data => {
            this.suggestions = data;
          })
          .catch(error => {
            console.error('Error fetching autosuggestions:', error);
          });
      },
    },
    mounted() {
      // Fetch categories, subcategories, and pictures on mount
    },
  };
  </script>
  