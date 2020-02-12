<template>
  <div class="login">
    <h1>{{ msg }}</h1>

    <div class="homeButton">
      <br />
      <br />
      <label for="fname">Username:</label>
      <input type="text" id="fname" class="ml-1" />
      <br />
      <label for="lname">Password:</label>
      <input type="password" id="lname" class="mt-1 ml-1" />
      <br />
      <router-link to="/" tag="button" id="home-button">Create Account</router-link>
      <button v-if="authenticated" v-on:click="logout" id="logout-button">Logout okta</button>
      <button v-else v-on:click="login" id="login-button">Login</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
  props: {
    msg: String
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


<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
