<template>
  <div class="background mt-0" id="app">
    <div class="navbar mx-0 px-0 pt-0">
      <navbar />
    </div>
    <div class="row"></div>
    <img alt="Vue logo" src="./assets/ita_logo.png" />
    <!--     <router-view></router-view>
    -->

    <router-view />
    <router-link to="/" tag="button" id="home-button">Create Account</router-link>
    <button v-if="authenticated" v-on:click="logout" id="logout-button">Logout okta</button>
    <button v-else v-on:click="login" id="login-button">Login</button>
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
  },
  data: function() {
    return {
      authenticated: false
    };
  },
  created() {
    this.isAuthenticated();
  },
  watch: {
    $route: "isAuthenticated"
  },
  methods: {
    async isAuthenticated() {
      this.authenticated = await this.$auth.isAuthenticated();
    },
    login() {
      this.$auth.loginRedirect("/mainPage");
    },
    async logout() {
      await this.$auth.logout();
      await this.isAuthenticated();

      this.$router.push({ path: "/login" });
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
