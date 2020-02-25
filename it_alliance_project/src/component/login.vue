<template>
  <div class="login">
    <div class="homeButton">
      <br />
      <br />
      <label for="uname">Username:</label>
      <input type="text" id="uname" class="ml-1" />
      <br />
      <label for="pword">Password:</label>
      <input type="password" id="pword" class="mt-1 ml-1" />
      <br />
      <router-link to="/" tag="button" id="home-button">Create Account</router-link>
      <button v-if="authenticated" v-on:click="logout()" id="logout-button">Logout</button>
      <button v-else v-on:click="login()" id="login-button">Login</button>
    </div>
  </div>
</template>

<script lang="ts">
const PATH_TO_PROTECTED_ROUTE = "/private";
export default {
  name: "login",
  methods: {
    login() {
      this.$auth.loginRedirect(PATH_TO_PROTECTED_ROUTE);
    }
  }
  /*  props: {
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
      this.$router.push({ path: "/mainPage" });
    },
    async logout() {
      await this.$auth.logout();
      await this.isAuthenticated();

      this.$router.push({ path: "/login" });
    }
  } */
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
