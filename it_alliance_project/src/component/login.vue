<template>
  <div class="login">
    <h1>{{ msg }}</h1>

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
      <button v-if="authenticated" v-on:click="logout" id="logout-button">Logout okta</button>
      <button v-else v-on:click="login" id="login-button">Login</button>
    </div>
  </div>
</template>

<script>
import auth from "@okta/okta-vue";

var authClient = new auth({
  url: "https://dev-253896.okta.com/oauth2/default/v1/authorize",
  clientId: "0oa242wfbnQmekjOF4x6",
  redirectUri: "http://localhost:8080/mainPage"
});

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
      /*  authClient.signIn().then(res => {
        if (res.status === "SUCCESS") {
          authClient.token.getWithRedirect({
            sessionToken: res.sessionToken,
            responseType: "id_token"
          });
        }
      }); */

      var uname = document.getElementById("uname").value;
      var pword = document.getElementById("pword").value;

      this.authClient.login(uname, pword).then(resp => alert(resp));

      /*       this.$auth.loginRedirect("/mainPage");
       */
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
