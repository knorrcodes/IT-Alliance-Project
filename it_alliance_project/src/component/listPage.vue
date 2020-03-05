<eslint-disable vue/require-v-for-key
<template>
  <div class="listPage">
    <br />
    <h1 class="text-center">##LIST PAGE##</h1>

    <table border='1' width='80%' style='border-collapse: collapse;'>
      <tr>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>Client</th>
        <th>Team Members</th>
        <th></th>
      </tr>

      <!-- Add -->
      <tr>
        <td><input type='text' v-model='project_name'></td>
        <td><input type='text' v-model='project_descrip'></td>
        <td><input type='text' v-model='client_name'></td>
        <td><input type='text' v-model='team_member_names'></td>
        <td><input type='button' value='Add' @click='addRecord();'></td>
      </tr>

      <!-- Update/Delete -->
      <tr v-for='(id,index) in itadatabase'>
        <td><input type='text' v-model='project_table.project_name' ></td>
        <td><input type='text' v-model='project_table.project_descrip' ></td>
        <td><input type='text' v-model='project_table.client_name' ></td>
        <td><input type='text' v-model='project_table.team_member_names' ></td>
        <td><input type='button' value='Update' @click='updateRecord(index,project_table.id);'>&nbsp;
        <input type='button' value='Delete' @click='deleteRecord(index,project_table.id)'></td>
      </tr>
    </table>
  </div>
</template>

<script>
/* import { Vue } from "vue-property-decorator"; */
/* 
var app = new Vue({
  el: '#listPage',
  data: {
    project_table: "",
    id: "",
    project_name: "",
    project_descrip: "",
    client_name: "",
    team_member_names: ""
  },
  methods: {
   allRecords: function(){
     axios.post('ajaxfile.php', {
       request: 1
     })
     .then(function (response) {
       app.project_table = response.data;
     })
     .catch(function (error) {
       console.log(error);
     });
 
   },
   addRecord: function(){

     if(this.project_name != '' && this.project_descrip != '' && this.client_name != '' && this.team_member_names != ''){
       axios.post('ajaxfile.php', {
         request: 2,
         project_name: this.project_name,
         project_descrip: this.project_descrip,
         client_name: this.client_name,
         team_member_names: this.team_member_names
       })
       .then(function (response) {

         // Fetch records
         app.allRecords();

         // Empty values
         app.project_name = '';
         app.project_descrip = '';
         app.client_name = '';
         app.team_member_names = '';
 
         alert(response.data);
       })
       .catch(function (error) {
         console.log(error);
       });
     }else{
       alert('Fill all fields.');
     }
 
   },
   updateRecord: function(index,id){

     // Read value from Textbox
     var project_name = this.project_table[index].project_name;
     var project_descrip = this.users[index].project_descrip;
     var client_name = this.project_table[index].client_name;
     var team_member_names = this.project_table[index].team_member_names;

     if(project_name !='' && project_descrip !=''){
       axios.post('ajaxfile.php', {
         request: 3,
         id: id,
         project_name: project_name,
         project_descrip: project_descrip
       })
       .then(function (response) {
         alert(response.data);
       })
       .catch(function (error) {
         console.log(error);
       });
     }
   },
   deleteRecord: function(index,id){
 
     axios.post('ajaxfile.php', {
       request: 4,
       id: id
     })
     .then(function (response) {

       // Remove index from users
       app.project_table.splice(index, 1);
       alert(response.data);
     })
     .catch(function (error) {
       console.log(error);
     });
 
    } 
  },
  created: function(){
    this.allRecords();
  }
})
 */
export default /*class listPage extends Vue*/ {
  name: "listPage",
  data: {
    project_table: "",
    id: "",
    project_name: "",
    project_descrip: "",
    client_name: "",
    team_member_names: ""
  },
  methods: {
   allRecords: function(){
     axios.post('ajaxfile.php', {
       request: 1
     })
     .then(function (response) {
       app.project_table = response.data;
     })
     .catch(function (error) {
       console.log(error);
     });
 
   },
   addRecord: function(){

     if(this.project_name != '' && this.project_descrip != '' && this.client_name != '' && this.team_member_names != ''){
       axios.post('ajaxfile.php', {
         request: 2,
         project_name: this.project_name,
         project_descrip: this.project_descrip,
         client_name: this.client_name,
         team_member_names: this.team_member_names
       })
       .then(function (response) {

         // Fetch records
         app.allRecords();

         // Empty values
         app.project_name = '';
         app.project_descrip = '';
         app.client_name = '';
         app.team_member_names = '';
 
         alert(response.data);
       })
       .catch(function (error) {
         console.log(error);
       });
     }else{
       alert('Fill all fields.');
     }
 
   },
   updateRecord: function(index,id){

     // Read value from Textbox
     var project_name = this.project_table[index].project_name;
     var project_descrip = this.users[index].project_descrip;
     var client_name = this.project_table[index].client_name;
     var team_member_names = this.project_table[index].team_member_names;

     if(project_name !='' && project_descrip !=''){
       axios.post('ajaxfile.php', {
         request: 3,
         id: id,
         project_name: project_name,
         project_descrip: project_descrip
       })
       .then(function (response) {
         alert(response.data);
       })
       .catch(function (error) {
         console.log(error);
       });
     }
   },
   deleteRecord: function(index,id){
 
     axios.post('ajaxfile.php', {
       request: 4,
       id: id
     })
     .then(function (response) {

       // Remove index from users
       app.project_table.splice(index, 1);
       alert(response.data);
     })
     .catch(function (error) {
       console.log(error);
     });
 
    } 
  },
  created: function(){
    this.allRecords();
  }
}
</script>

<style scoped>
</style>>