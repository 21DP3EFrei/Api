<!-- ShowImages.vue -->
<template>
    <Layout>
      <template #header>
        Gallery
      </template>
  
      <template #content>
        <div class="container">
          <h1>Info</h1>
          <div class="row">
            <div class="col-12" style="padding:20px;">
              <div class="card">
                <div class="card-header">Show Images</div>
                <div class="card-body">
                  <div class="row">
                    <div
                      v-for="mem in mems"
                      :key="mem.id"
                      class="col-md-3 mb-4"
                    >
                      <div class="card">
                        <img
                          :src="getImageUrl(mem.Attels)"
                          class="card-img-top"
                          :alt="mem.Nosaukums"
                        />
                        <div class="card-body">
                          <h5 class="card-title">{{ mem.Nosaukums }}</h5>
                          <p class="card-text">{{ mem.Apraksts }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </template>
    </Layout>
  </template>
  
  <script>
  import Layout from "Layout.vue";
  export default {
    name: "ShowImages",
    components: { Layout },
    props: {
      mems: {
        type: Array,
        required: true,
      },
    },
    methods: {
      getImageUrl(path) {
        return `/storage/${path}`; // Adjust based on your storage path
      },
    },
  };
  </script>
  