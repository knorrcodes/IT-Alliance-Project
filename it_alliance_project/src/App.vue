<template>
  <div class="background mt-0" id="app">
    <div class="navbar mx-0 px-0 pt-0">
      <navbar />
    </div>
    <div class="row"></div>
    <img alt="Vue logo" src="./assets/ita_logo.png" />
    <router-view />
  </div>
</template>

<script>
/*import listPage from "@/component/listPage.vue"
import login from "@/component/login.vue";
import mainPage from "@/component/mainPage.vue";*/
import navbar from "@/component/navbar.vue";

export default {
  name: "app",
  components: {
    /*login,
    listPage,
    mainPage,*/
    navbar
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
