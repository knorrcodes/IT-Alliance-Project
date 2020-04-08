<eslint-disable vue/require-v-for-key
<template>
  <div class="listPage">
    <br />
    <h1 class="text-center">##LIST PAGE##</h1>
    <br />
    <!-- Select All records -->
    <input type='button' @click='allRecords()' value='Retrieve All Projects'>
    <br><br>

    <!-- Select record by ID -->
    <input type='text' v-model='project_id' placeholder="Enter Project ID">
    <input type='button' @click='recordByID()' value='Select Project by ID'>
    <br><br>

    <!-- List records -->
    <table id="project_table" border='1' width='100%' style='border-collapse: collapse;'>
      <tr>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>Client</th>
        <th>Team Members</th>
      </tr>

      <tr v-for='project in project_table'>
        <td>{{ project.name }}</td>
        <td>{{ project.description }}</td>
        <td>{{ project.client }}</td>
        <td>{{ project.team_member_names }}</td>
      </tr>
    </table>
    
    <br><br>
    
    
    
    
    <!-- 
    <table id="project_table" border='1' width='100%' style='border-collapse: collapse;'>
      <tr>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>Client</th>
        <th>Team Members</th>
        <th></th>
      </tr> -->

      <!-- Add -->
      <!-- <tr>
        <td><input type='text' v-model='project_name'></td>
        <td><input type='text' v-model='project_descrip'></td>
        <td><input type='text' v-model='client_name'></td>
        <td><input type='text' v-model='team_member_names'></td>
        <td><input type='button' value='Add' @click='addRecord();'></td>
      </tr> -->

      <!-- Update/Delete -->
      <!-- <tr v-for='(id) in project_table'>
        <td><input type='text' v-model='project_table.project_name' ></td>
        <td><input type='text' v-model='project_table.project_descrip' ></td>
        <td><input type='text' v-model='project_table.client_name' ></td>
        <td><input type='text' v-model='project_table.team_member_names' ></td>
        <td><input type='button' value='Update' @click='updateRecord(project_table.id);'>&nbsp;
        <input type='button' value='Delete' @click='deleteRecord(project_table.id)'></td>
      </tr>
    </table> -->
  </div>
</template>

<script>

const axios = require('axios').default;
const qs = require('qs')

axios.get('https://api.github.com/users/codeheaven-io');

const options = {
  method: 'POST',
  headers: { 'content-type': 'application/x-www-form-urlencoded' }
}

var config = {
  headers: {'X-My-Custom-Header': 'Header-Value'}
};

/* 
axios(options)
  .then(function(response) {
    console.log(response.data)
  })
  .catch(function(error) {
    console.log(error)
  }) */
/*
import Vue from 'vue';

var project_table = new Vue({
  el: '#project_table',
  data: {
    rows: [
      { id: '', project_name: '', project_descrip: '', client_name: '', team_member_names: '' }
    ]
  }
})
*/
export default /*class listPage extends Vue*/ {
  name: "listPage",
  data() {
    return {
      project_table: undefined,
      project_id: 0
    };
  },
  methods: {
    allRecords() {
      axios.get('http://localhost/ajaxFile.php', {      
        request: '1'
        }
      )
      .then(response => {
        console.log(response.data);
        console.log(this.project_table)
        this.project_table = response.data;
        console.log(this.project_table);
      })
      .catch(error => {
        if (error.response) {
          // The request was made and the server responded with a status code
          // that falls out of the range of 2xx
          console.log(error.response.data);
          console.log(error.response.status);
          console.log(error.response.headers);
        } else if (error.request) {
          // The request was made but no response was received
          // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
          // http.ClientRequest in node.js
          console.log(error.request);
        } else {
          // Something happened in setting up the request that triggered an Error
          console.log('Error', error.message);
        }
        console.log(error.config);
      });
  
    }/*,
    addRecord: function(){

      if(this.project_name != '' && this.project_descrip != '' && this.client_name != '' && this.team_member_names != ''){
        axios.post('./ajaxFile.php', {
          request: 2,
          project_name: this.project_name,
          project_descrip: this.project_descrip,
          client_name: this.client_name,
          team_member_names: this.team_member_names
        }, options)
        .then(function (response) {

          // Fetch records
          allRecords();

          // Empty values
          this.project_name = '';
          this.project_descrip = '';
          this.client_name = '';
          this.team_member_names = '';
  
          alert(response.data);
        })
        .catch(function (error) {
        if (error.response) {
          // The request was made and the server responded with a status code
          // that falls out of the range of 2xx
          console.log(error.response.data);
          console.log(error.response.status);
          console.log(error.response.headers);
        } else if (error.request) {
          // The request was made but no response was received
          // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
          // http.ClientRequest in node.js
          console.log(error.request);
        } else {
          // Something happened in setting up the request that triggered an Error
          console.log('Error', error.message);
        }
        console.log(error.config);
      });
      }else{
        alert('Fill all fields.');
      }
    },
    updateRecord: function(id){

      // Read value from Textbox
      var project_name = this.project_table[project_id].project_name;
      var project_descrip = this.users[project_id].project_descrip;
      var client_name = this.project_table[project_id].client_name;
      var team_member_names = this.project_table[project_id].team_member_names;

      if(project_name !='' && project_descrip !=''){
        axios.post('../ajaxFile.php', {
          request: 3,
          project_id: project_id,
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
    deleteRecord: function(id){
  
      axios.post('../ajaxFile.php', {
        request: 4,
        project_id: project_id
      })
      .then(function (response) {

        // Remove index from users
        /* project_table.splice(index, 1);
        alert(response.data); */
 /*     })
      .catch(function (error) {
        console.log(error);
      });
    }
  },
  created: function(){
    this.allRecords();
  }*/
}}
</script>

<style scoped>
</style>>