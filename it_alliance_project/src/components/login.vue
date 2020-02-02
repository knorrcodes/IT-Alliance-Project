<template>
  <div class="hello">
    <h1>{{ msg }}</h1>

    <div class="homeButton">
      <span>
        <button>Create New Project</button>
      </span>
      <span>
        <button>View Projects</button>
      </span>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <h1>##LOGIN PAGE##</h1>
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

<!-- Add "scoped" attribute to limit CSS to this component only -->
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
