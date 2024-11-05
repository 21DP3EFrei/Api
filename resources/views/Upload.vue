<!-- Upload.vue -->
<template>
    <Layout>
      <template #header>
        Upload
      </template>
  
      <template #content>
        <div class="container">
          <h1>Upload</h1>
          <div v-if="successMessage" class="alert alert-success" role="alert">
            {{ successMessage }}
          </div>
  
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="fileName" class="form-label">File Name</label>
              <input type="text" v-model="formData.fileName" class="form-control" required />
            </div>
  
            <div class="mb-3">
              <label for="fileDescription" class="form-label">Description</label>
              <textarea v-model="formData.fileDescription" class="form-control" rows="3"></textarea>
            </div>
  
            <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input type="text" v-model="formData.author" class="form-control" required />
            </div>
  
            <div class="mb-3">
              <label for="copyright" class="form-label">Copyright</label>
              <select v-model="formData.copyright" class="form-select">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
  
            <div class="mb-3">
              <label for="category_id" class="form-label">Category</label>
              <select v-model="formData.category_id" class="form-select" required>
                <option
                  v-for="category in categories"
                  :key="category.K_ID"
                  :value="category.K_ID"
                >
                  {{ category.Nosaukums }}
                </option>
              </select>
            </div>
  
            <div class="mb-3">
              <label for="subcategory_id" class="form-label">Subcategory</label>
              <select v-model="formData.subcategory_id" class="form-select" required>
                <option v-for="subcategory in subcategories" :key="subcategory.id" :value="subcategory.id">
                  {{ subcategory.name }}
                </option>
              </select>
            </div>
  
            <div class="mb-3">
              <label for="uploadFile" class="form-label">Upload File</label>
              <input type="file" @change="handleFileUpload" class="form-control" required />
            </div>
  
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </template>
    </Layout>
  </template>
  
  <script>
  import Layout from "Layout.vue";
  export default {
    name: "Upload",
    components: { Layout },
    props: {
      categories: {
        type: Array,
        required: true,
      },
      subcategories: {
        type: Array,
        required: false,
        default: () => [],
      },
    },
    data() {
      return {
        formData: {
          fileName: "",
          fileDescription: "",
          author: "",
          copyright: "Yes",
          category_id: "",
          subcategory_id: "",
          uploadFile: null,
        },
        successMessage: null,
      };
    },
    methods: {
      handleFileUpload(event) {
        this.formData.uploadFile = event.target.files[0];
      },
      submitForm() {
        const formData = new FormData();
        for (const key in this.formData) {
          formData.append(key, this.formData[key]);
        }
  
        this.$inertia.post(this.route("upload.post"), formData, {
          onSuccess: () => {
            this.successMessage = "File uploaded successfully!";
          },
        });
      },
    },
    watch: {
      "formData.category_id"(newValue) {
        if (newValue) {
          fetch(`/fetch-subcategories/${newValue}`)
            .then((response) => response.json())
            .then((data) => {
              this.subcategories = data;
            });
        } else {
          this.subcategories = [];
        }
      },
    },
  };
  </script>
  