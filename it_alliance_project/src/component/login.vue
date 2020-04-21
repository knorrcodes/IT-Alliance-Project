<template>
  <div class="login">
    <hr />
    <b-row no-gutters>
      <h1 class="mx-auto">Login Page</h1>
    </b-row>
    <hr />

    <div class="homeButton">
      <label for="uname">Username:</label>
      <input type="text" id="uname" class="ml-1" />
      <br />
      <label for="pword">Password:</label>
      <input type="password" id="pword" class="mt-1 ml-1" />
      <br />
      <!-- <router-link to="/" tag="button" id="home-button">Create Account</router-link> -->
      <b-button v-if="this.$parent.authenticated" v-on:click="logout()" variant="primary" id="logout-button">Logout</b-button>
      <b-button v-else v-on:click="login()" variant="primary" id="login-button">Login</b-button>
    </div>
  </div>
</template>

<script lang="ts">
const PATH_TO_PROTECTED_ROUTE = "/listPage";
export default {
  name: "login",
  data: function() {
    return {
      claims: ""
    };
  },
  created() {
    this.setup();
  },
  methods: {
    async setup() {
      this.claims = await this.$auth.getUser();
    },
    login() {
      if (this.authenticated == false) {
        this.$router.push("/mainPage");
      } else {
        this.$auth.loginRedirect(PATH_TO_PROTECTED_ROUTE);
      }
    },
    logout() {}
  }
};
</script>


<style scoped>
hr {
  width: 90%;
}
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
