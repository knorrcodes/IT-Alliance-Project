<template>
  <div class="mainPage">
    <br />
    <h1 class="text-center">##MAIN PAGE##</h1>
    <div class="row">
      <div class="col-6">
        <button type="submit">Something</button>
      </div>
      <div class="col-6">
        <button type="submit">Projects Page</button>
      </div>
    </div>
    <div class="row mt-5">
      <h2 class="border mx-auto">SCROLLING FEED OF POPULAR PROJECTS</h2>
    </div>
  </div>
</template>

<script>
/*import { Vue } from "vue-property-decorator";*/

export default /*class mainPage extends Vue*/ {
  name: "mainPage"
}
</script>

<style scoped>
.border {
  border: 5;
}
</style>