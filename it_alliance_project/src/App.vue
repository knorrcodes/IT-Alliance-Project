<template>
  <div class="background" id="app">
    <div class="row">
      <div class="col-10"></div>
      <div class="col-2">
        <!--<router-link to="@/component/login.vue" tag="button">Log In</router-link>-->
        <router-link to="/login'}" event='click'>
          <button type="submit">Log In</button>
        </router-link>
      </div>
    </div>
    <img alt="Vue logo" src="./assets/ita_logo.png" />
    <login />
  </div>
</template>

<script>
import login from "@/component/mainPage.vue";

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
