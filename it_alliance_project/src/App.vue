<template>
  <div class="background" id="app">
    <div class="navbar">
      <navbar />
    </div>
    <div class="row">
      <div class="col-2">
        <router-link :to="{ name: 'mainPage' }">
          <button type="submit">Home</button>
          <!--<mainPage />-->
        </router-link>
      </div>
      <div class="col-3"></div>
      <div class="col-2">
        <router-link to="/listPage">
          <button type="submit">List</button>
          <!--<listPage />-->
        </router-link>
      </div>
      <div class="col-3"></div>
      <div class="col-2">
        <router-link to="/login">
          <button type="submit">Log In</button>
          <!--<login />-->
        </router-link>
      </div>
    </div>
    <img alt="Vue logo" src="./assets/ita_logo.png" />
    <router-view></router-view>
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
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
