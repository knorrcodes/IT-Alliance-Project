<template>
  <div class="listPage">
    <hr />
    <br />
    <h1>Spring 2020</h1>
    <ul>
      <li>IT Alliance Project</li>
      <li>AI ChatBot for Customer Serice with SMS Text messenger Bot</li>
      <li>Champion Lab</li>
      <li>Evansville Association for the Blind</li>
      <li>Silent Auction for ECTA (Evansville Community Tennis Association)</li>
      <li>Vanderburgh County Fair</li>
      <li>Web Service For Sales Tasks</li>
    </ul>
  </div>
</template>

<script>
/*the idea here is for the Project name to be a link, it would grab information from the database about the Project
    and return that informationa and display it in a pop up for the user to review. */

export default /*class listPage extends Vue*/ {
  name: "listPage"
};
</script>

<style scoped>
hr {
  width: 90%;
}
li {
  font-size: 20px;
}
</style>