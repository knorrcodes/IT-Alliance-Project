<template>
  <div class="listPage">
    <hr />
    <br />
    <h1>Spring 2020</h1>
    <ul>
      <li onclick="alert('Team name: IT Alliance \nMembers: Darrin Knorr, Joe Massaro, Bassim Alamer, Josh Martin \nSemester: Spring 2020')">IT Alliance Project</li>
      <li onclick="alert('Team name: AI ChatBot for Customer Serice with SMS Text messenger Bot \nMembers Albert Huang, Austin Steele, Edward Yevincy Quentin Peters, Elizabeth Fleming \n Semester: Spring 2020')" >AI ChatBot for Customer Serice with SMS Text messenger Bot</li>
      <li onclick="alert('Team name: Champion Labs \nMembers: Payton Sharpe, Joshua Joines, Hans Lagenour, Austin Garrison, Nicholas Scheller \nSemester: Spring 2020')">Champion Lab</li>
      <li onclick="alert('Team name: WAZE: city transportation analysis \nMembers: Sara Kniepmann, Austin Scherer, Celina Snyder, Kenlee Rumer, Alex Markle \nSemester: Spring 2020')">Evansville Association for the Blind</li>
      <li onclick="alert('Team name: Evansville Association for the Blind \nMembers: Raquel Harvey, Nathan Hall, Garrett Hopf\nSemester: Spring 2020')">Silent Auction for ECTA (Evansville Community Tennis Association)</li>
      <li onclick="alert('Team name: Silent Auction for ECTA (Evansville Community Tennis Association) \nMembers: Lee Keitel, Jace Anderson, Jeremy Hertel, Brandon Beach, Sky Kollak \nSemester: Spring 2020')">Vanderburgh County Fair</li>
    </ul>
  </div>
</template>

<script>
/*the idea here is for the Project name to be a link, it would grab information from the database about the Project
    and return that informationa and display it in a pop up for the user to review. */

export default /*class listPage extends Vue*/ {
  name: "listPage",
  methods:{
    italliance: function(){
      alert("test hello");
    }
  }
  
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