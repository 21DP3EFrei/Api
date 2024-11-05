<template>
    <div class="container">
      <h1>Verify Memes</h1>
      <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
  
      <table class="table mt-3">
        <thead>
          <tr>
            <th>Picture Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
            <th>Download</th>
            <th>Category</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="mem in unverifiedMems" :key="mem.id">
            <td>{{ mem.Nosaukums }}</td>
            <td>{{ mem.Apraksts }}</td>
            <td>{{ mem.Status === 0 ? 'Pending' : mem.Status === 1 ? 'Approved' : 'Rejected' }}</td>
            <td>
              <form @submit.prevent="verifyMem(mem)">
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    :name="'status' + mem.id"
                    :id="'approve' + mem.id"
                    value="1"
                    v-model="mem.selectedStatus"
                  />
                  <label :for="'approve' + mem.id">Approve</label>
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    :name="'status' + mem.id"
                    :id="'reject' + mem.id"
                    value="0"
                    v-model="mem.selectedStatus"
                  />
                  <label :for="'reject' + mem.id">Reject</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </td>
            <td><a :href="`/storage/${mem.Attels}`" download class="btn btn-primary">Download</a></td>
            <td>{{ mem.kategorija.Nosaukums }}</td>
            <td><img :src="`/storage/${mem.Attels}`" :alt="mem.Nosaukums" width="100" height="100" /></td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        unverifiedMems: [],
        successMessage: "",
      };
    },
    methods: {
      async verifyMem(mem) {
        try {
          const response = await axios.post(`/verification/verify/${mem.id}`, {
            status: mem.selectedStatus,
          });
          this.successMessage = response.data.message;
          mem.Status = mem.selectedStatus;
        } catch (error) {
          console.error("Error verifying meme:", error);
        }
      },
    },
    async mounted() {
      try {
        const response = await axios.get("/api/unverified-mems");
        this.unverifiedMems = response.data;
      } catch (error) {
        console.error("Error loading unverified memes:", error);
      }
    },
  };
  </script>
  
  