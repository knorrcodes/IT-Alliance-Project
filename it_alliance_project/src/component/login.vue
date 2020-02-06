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
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
  props: {
    msg: String
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
