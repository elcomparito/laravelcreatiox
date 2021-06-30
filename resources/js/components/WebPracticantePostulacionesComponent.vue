<template>
  <div class="overflow-auto">
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>

    <p class="mt-3">Current Page: {{ currentPage }}</p>
    <p>Dato: {{  }}</p>

    <b-table
      id="my-table"
      :items="items"
      :per-page="perPage"
      :current-page="currentPage"
      small
    ></b-table>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      perPage: 10,
      currentPage: 1,
      items: [],

      user:{}
    };
  },

  methods: {

    getUser() {
      axios
        .get("/me")
        .then((response) => {
          this.user = response.data;
          console.log(this.user);
        });
    },

    getPostulaciones() {
      axios
        .get("/api/postulacion/get-all-by-practicante/" + this.user.id)
        .then((response) => {
          this.items = response.data.data;
          console.log(this.items);
        });
    },
  },

  actions: {
  },

  created() {
    this.getUser();
    this.getPostulaciones();
  },

  computed: {
    rows() {
      return this.items.length;
    },
  },
};
</script>