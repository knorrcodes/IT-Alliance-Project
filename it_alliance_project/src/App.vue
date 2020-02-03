<template>
  <div class="background" id="app">
    <img alt="Vue logo" src="./assets/ita_logo.png" />
    <login />
  </div>
</template>

<script>
import login from "@/component/list_page.vue";

export default {
  name: "app",
  components: {
    login
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
