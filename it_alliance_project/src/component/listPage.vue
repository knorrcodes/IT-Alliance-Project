<eslint-disable vue/require-v-for-key
<template>
  <div class="listPage">
    <br />
    <h1 class="text-center">##LIST PAGE##</h1>
    <br />
    <!-- Select All records -->
    <input type='button' @click='allRecords()' value='Retrieve All Projects'>
    <br><br>

    <!-- List records -->
    <table id="project_table" border='1' width='100%' style='border-collapse: collapse;'>
      <tr>
        <th style="display:none;">ID</th>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>Client</th>
        <th>Team Members</th>
        <th></th>
      </tr>

      <tr v-for='project in project_table'>
        <td style="display:none;">{{ project.id }}</td>
        <td>{{ project.name }}</td>
        <td>{{ project.description }}</td>
        <td>{{ project.client }}</td>
        <td>{{ project.team_member_names }}</td>
        <td><input type='button' value='Update' @click='updateRecord(project.id);'>&nbsp;
        <input type='button' value='Delete' @click='deleteRecord(project.id)'></td>
      </tr>

      <!-- Add -->
      <tr>
        <td><input type='text' v-model='name'></td>
        <td><input type='text' v-model='description'></td>
        <td><input type='text' v-model='client'></td>
        <td><input type='text' v-model='team_member_names'></td>
        <td><input type='button' value='Add' @click='addRecord();'></td>
      </tr>
    </table>
    
    <br><br>
  
  </div>
</template>

<script>

const axios = require('axios').default;

export default /*class listPage extends Vue*/ {
  name: "listPage",
  data() {
    return {
      project_table: undefined,
      id: 0,
      name: '',
      description: '',
      client: '',
      team_member_names: ''
    };
  },
  methods: {
    allRecords() {
      axios.get('http://localhost/ajaxFile.php', {   
        params: {
          request: '1'
        }   
      })
      .then(response => {
        this.project_table = response.data;
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
    },
    addRecord() {
      if(this.name != '' && this.description != '' && this.client != '' && this.team_member_names != ''){
        axios.get('http://localhost/ajaxFile.php', {
          params: {
            request: 2,
            name: this.name,
            description: this.description,
            client: this.client,
            team_member_names: this.team_member_names
          }
        })
        .then(response => {

          // Fetch records
          this.allRecords();

          // Empty values
          this.name = '';
          this.description = '';
          this.client = '';
          this.team_member_names = '';
  
          alert(response.data);
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
      }else{
        alert('Please fill all fields.');
      }
    },
    updateRecord(id) {

      // Read value from Textbox
      var project_name = this.name;
      var project_description = this.description;
      var project_client = this.client;
      var project_team_member_names = this.team_member_names;

      if (project_name !='' || project_description !='' || project_client != '' || project_team_member_names != '' ) {
        axios.get('http://localhost/ajaxFile.php', {
          params: {
            request: 3,
            id: id,
            name: project_name,
            description: project_description,
            client: project_client,
            team_member_names: project_team_member_names
          }
        })
        .then(response => {
          // Fetch records
          this.allRecords();

          // Empty values
          this.name = '';
          this.description = '';
          this.client = '';
          this.team_member_names = '';

          alert(response.data);
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
      }else{
        alert('Please fill in the field you wish to update.');
      }
    },
    deleteRecord(id) {
      if (confirm('Are you sure you want to delete?')) {
        axios.get('http://localhost/ajaxFile.php', {
          params: {
            request: 4,
            id: id,
          }
        })
        
        .then(response => {
          this.allRecords();
          
          // Empty values
          this.name = '';
          this.description = '';
          this.client = '';
          this.team_member_names = '';

          alert(response.data);
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
      }
    }
  },
  created() {
    this.allRecords();
  }
}
</script>

<style scoped>
</style>>