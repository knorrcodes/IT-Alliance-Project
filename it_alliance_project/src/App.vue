<template>
  <div class="background mt-0" id="app">
    <div class="navbar mx-0 px-0 pt-0">
      <navbar />
    </div>
    <div class="row"></div>
    <img alt="Vue logo" src="./assets/ita_logo.png" />
    <router-view />
    <div>Data: {{example1}}</div>
    <button @click="getLanguage">Get lang</button>
  </div>
</template>

<script>
import navbar from "@/component/navbar.vue";
import axios from "axios";

axios.post("http://localhost:3000/graphql", {
  query: "{ language }"
});

export default {
  name: "app",
  components: {
    navbar
  },
  data: function() {
    return { authenticated: false, example1: "" };
  },
  created() {
    this.isAuthenticated();
  },
  watch: {
    // Everytime the route changes, check for auth status
    $route: "isAuthenticated"
  },
  methods: {
    async isAuthenticated() {
      this.authenticated = await this.$auth.isAuthenticated();
    },
    async getLanguage() {
      try {
        const res = await axios.post("http://localhost:3000/graphql", {
          query: "{language}"
        });
        this.example1 = res.data.data.language;
      } catch (e) {
        console.log("err", e);
      }
    }
  }
};
</script>

<style>
.bg {
  background: black;
}
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
