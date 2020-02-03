<template>
  <div class="hello">
    <h1>{{ msg }}</h1>

    <div class="homeButton">
      <br />
      <h1>##LOGIN PAGE##</h1>
      <br />
      <label for="fname">First Name:</label>
      <input type="text" id="fname" class="ml-1" />
      <br />
      <label for="lname">Last Name:</label>
      <input type="text" id="lname" class="mt-1 ml-1" />
      <br />
      <button type="submit" class="mt-1">Submit</button>
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
