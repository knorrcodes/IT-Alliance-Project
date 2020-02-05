<template>
  <div class="background" id="app">
    <!-- <navbar /> -->

    <div>
      <b-navbar toggleable="lg" type="dark" variant="info">
        <b-navbar-brand href="#">NavBar</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item href="#">Link</b-nav-item>
            <b-nav-item href="#" disabled>Disabled</b-nav-item>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
            <b-nav-form>
              <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
              <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
            </b-nav-form>

              <b-nav-item-dropdown text="Lang" right>
                <b-dropdown-item href="#">EN</b-dropdown-item>
                <b-dropdown-item href="#">ES</b-dropdown-item>
                <b-dropdown-item href="#">RU</b-dropdown-item>
                <b-dropdown-item href="#">FA</b-dropdown-item>
              </b-nav-item-dropdown>

              <b-nav-item-dropdown right>
                <!-- Using 'button-content' slot -->
                <template v-slot:button-content>
                  <em>User</em>
                </template>
                <b-dropdown-item href="#">Profile</b-dropdown-item>
                <b-dropdown-item href="#">Sign Out</b-dropdown-item>
              </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
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

export default {
  name: "app",
  /*components: {
    login,
    listPage,
    mainPage
  }*/
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
