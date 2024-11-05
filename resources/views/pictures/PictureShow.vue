<template>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>{{ picture.Nosaukums }} Info</h1>
          <div class="mb-3">
            <label for="name" class="form-label"><u>Name</u></label>
            <p class="form-control">{{ picture.Nosaukums }}</p>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label"><u>Description</u></label>
            <p class="form-control">{{ picture.Apraksts }}</p>
          </div>
          <div class="mb-3">
            <label for="author" class="form-label"><u>Author</u></label>
            <p class="form-control">{{ picture.Autors }}</p>
          </div>
          <div class="mb-3">
            <label for="copyright" class="form-label"><u>Copyright</u></label>
            <p class="form-control">{{ picture.Autortiesibas ? 'Yes' : 'No' }}</p>
          </div>
          <form @submit.prevent="downloadPicture" class="mt-3">
            <button type="submit" class="btn btn-primary" style="margin-bottom: 50px;">Download</button>
          </form>
        </div>
        <div class="col-md-6">
          <img :src="`/storage/${picture.Attels}`" :alt="picture.Nosaukums" class="img-fluid" />
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        picture: {}, // Load from your API
      };
    },
    methods: {
      downloadPicture() {
        window.location.href = `{{ route('pictures.download', ':id') }}`.replace(':id', this.picture.id);
      },
    },
    mounted() {
      const pictureId = this.$route.params.id;
      // Fetch picture data based on pictureId
    },
  };
  </script>
