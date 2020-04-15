<eslint-disable vue/require-v-for-key
<template>
  <div class="listPage">
    <br />
    <h1 class="text-center">Projects by Semester</h1>
    
    <!-- Select Semester -->
    <b-dropdown id="semesterSelect" variant="primary" :text="dropdownText" class="m-md-2">
      <b-dropdown-item @click='spring20()'>Spring 2020</b-dropdown-item>
      <b-dropdown-item @click='fall20()'>Fall 2020</b-dropdown-item>
    </b-dropdown>

    <!-- <input type='button' @click='allRecords()' value='Retrieve All Projects'> -->
    <br><br>

    <!-- List records -->
    <b-table v-if="false" striped hover :fields="fields" :items="items"></b-table>

    <b-card no-body v-for='project in project_table'>
      <b-row no-gutters>
        <b-col md="5">
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2 mt-3">Project Name: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h1 class="m-1">{{ project.name }}</h1>
              </b-row>
            </b-col>
          </b-row>
          
          <b-row no-gutters>
            <b-col md="4"> 
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Client: </h5>
              </b-row>
            </b-col>

            <b-col md="8"> 
              <b-row no-gutters> 
                <b-button class="m-1" id="clientTool" v-b-hover="getEmail(project.client_email)" variant="outline-dark">{{ project.client }}</b-button>
                <b-tooltip target="clientTool" triggers="hover" placement="right">
                  <a :href="emailLink">{{ project.client_email }}</a>
                </b-tooltip>
              </b-row>
            </b-col>
          </b-row>

          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Team Members: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h3 align="left" class="m-1">{{ project.team_member_names }}</h3>
              </b-row>
            </b-col>
          </b-row>

          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">T-Shirt Sizes: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters style="border: 2px solid blue; border-collapse: collapse; border-radius: 10px;">
                
                <b-col align="right" md="4">
                  <b-row align="right" no-gutters>
                    <h5 style="align: right;">Small: </h5>
                  </b-row>
                  <b-row no-gutters>
                    <h5 align="right">Large: </h5>
                  </b-row>
                </b-col>

                <b-col md="2">
                  <b-row no-gutters>
                    <h5 align="left">{{project.tshirt_s}}</h5>
                  </b-row>
                  <b-row no-gutters>
                    <h5 align="left">{{project.tshirt_l}}</h5>
                  </b-row>
                </b-col>

                <b-col md="4">
                  <b-row no-gutters>
                    <h5 align="right">Medium: </h5>
                  </b-row>
                  <b-row no-gutters>
                    <h5 align="right">X-Large: </h5>
                  </b-row>
                </b-col>

                <b-col md="2">
                  <b-row no-gutters>
                    <h5 align="left">{{project.tshirt_m}}</h5>
                  </b-row>
                  <b-row no-gutters>
                    <h5 align="left">{{project.tshirt_xl}}</h5>
                  </b-row>
                </b-col>
                
              </b-row>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
    </b-card>

    <table id="project_table" border='1' width='100%' style='border-collapse: collapse;'>
      <tr>
        <th style="display:none;">ID</th>
        <th>Project Name</th>
        <th>Project Description</th>
        <th>Client</th>
        <th>Team Members</th>
        <th :style="adminButtons"></th>
      </tr>

      <tr v-for='project in project_table'>
        <td style="display:none;">{{ project.id }}</td>
        <td>{{ project.name }}</td>
        <td>{{ project.description }}</td>
        <td>{{ project.client }}</td>
        <td>{{ project.team_member_names }}</td>
        <td :style="adminButtons"><input type='button' value='Update' @click='updateRecord(project.id)'>&nbsp;
        <input type='button' value='Delete' @click='deleteRecord(project.id)'></td>
      </tr>

      <!-- Add -->
      <tr :style="adminButtons">
        <td><input type='text' v-model='name'></td>
        <td><input type='text' v-model='description'></td>
        <td><input type='text' v-model='client'></td>
        <td><input type='text' v-model='team_member_names'></td>
        <td><input type='button' value='Add' @click='addRecord()'></td>
      </tr>
    </table>
    
    <br><br>

    <b-alert variant="success" show v-if="loggedIn">Logged in as {{this.username}}</b-alert>

    <b-alert variant="danger" dismissible @dismissed="auth=true" show v-if="!auth">Username or Password Incorrect. Try Again.</b-alert>

    <b-button @click='logout()' variant="primary" v-if="loggedIn">Log Out</b-button>

    <b-button @click='login()' variant="primary" v-if="!show">Log In to Make Changes</b-button>

    <b-form inline class="justify-content-center" @submit="onSubmit" v-if="show && !loggedIn">
      <b-form-input
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="form.user"
          required
          type="text"
          placeholder="Username"
      ></b-form-input>
      <b-form-input
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="form.pass"
          required
          :type="passwordType"
          placeholder="Password"
      ></b-form-input>

      <b-form-checkbox v-model="passwordType" value="text" unchecked-value="password" class="mb-2 mr-sm-2 mb-sm-0">Show Password</b-form-checkbox>  
      <b-button type="submit" class="mb-2 mr-sm-2 mb-sm-0" variant="primary">Submit</b-button>
      <b-button @click="onClear()" class="mb-2 mr-sm-2 mb-sm-0" variant="outline-primary">Clear</b-button>
      <b-button @click='onCancel()' class="mb-2 mr-sm-2 mb-sm-0" variant="outline-dark">Cancel</b-button>
    </b-form>

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
      table_name: undefined,
      username: 'basic',
      password: '5dSbxzQ9n0SLiVWG',
      adminUser: 'dbAdmin',
      adminPass: 'Doodle6-Clothing',
      id: 0,
      name: '',
      description: '',
      client: '',
      team_member_names: '',
      form: {
        user: '',
        pass: ''
      },
      show: false,
      loggedIn: false,
      auth: true,
      adminButtons: "display:none;",
      dropdownText: "Select Semester",
      passwordType: "password",
      fields: [
        {
          key: 'id1',
          label: 'ID',
          sortable: true
        },
        {
          key: 'name1',
          label: 'Project Name',
          sortable: true
        },
        {
          key: 'description1',
          label: 'Project Description',
          sortable: false
        },
        {
          key: 'client1',
          label: 'Client',
          sortable: true
        },
        {
          key: 'team_member_names1',
          label: 'Team Members',
          sortable: true
        }
      ],
      items: [
        { isActive: false, id1: 0, name1: 'None', description1: 'None', client1: 'None', team_member_names1: 'None' },
        { isActive: true, id1: 1, name1: 'None', description1: 'None', client1: 'None', team_member_names1: 'None' }
      ],
      emailLink: ""
    }
  },
  methods: {
    allRecords() {
      if (this.table_name != undefined) {
        axios.get('http://localhost/ajaxFile.php', {   
          params: {
            request: '1',
            table_name: this.table_name,
            username: this.username,
            password: this.password
          }   
        })
        .then(response => {
          this.project_table = response.data;
          //formatTable();
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
      
    },
    addRecord() {
      if(this.name != '' && this.description != '' && this.client != '' && this.team_member_names != ''){
        axios.get('http://localhost/ajaxFile.php', {
          params: {
            request: 2,
            table_name: this.table_name,
            username: this.username,
            password: this.password,
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
            table_name: this.table_name,
            username: this.username,
            password: this.password,
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
            table_name: this.table_name,
            username: this.username,
            password: this.password,
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
    },
    spring20() {
      this.table_name = 'spring20';
      this.dropdownText = 'Spring 2020';
      this.allRecords();
    },
    fall20() {
      this.table_name = 'fall20';
      this.dropdownText = 'Fall 2020';
      this.allRecords();
    },
    onSubmit(evt) {
      evt.preventDefault();
      this.username = this.form.user;
      this.password = this.form.pass;
      if (this.username == this.adminUser && this.password == this.adminPass) {
        this.auth = true;
        this.form.user = '';
        this.form.pass = '';
        this.allRecords();
        this.loggedIn = true;
        this.adminButtons = "";
      }
      else {
        this.auth = false;
        this.show = false;
        this.form.user = '';
        this.form.pass = '';
        this.show = true;
      }
      
    },
    onClear() {
      this.show = false;
      this.form.user = '';
      this.form.pass = '';
      this.show = true;
    },
    login() {
      this.show = true;
    },
    logout() {
      this.show = false;
      this.loggedIn = false;
      this.adminButtons = "display:none;";
      this.username = 'basic';
      this.password = '5dSbxzQ9n0SLiVWG';
    },
    onCancel() {
      this.show = false;
      this.form.user = '';
      this.form.pass = '';
    },
    getEmail(email) {
      this.emailLink = "mailto:" + email;
    },
    formatTable() {
      /*this.project_table.forEach(element => {
        this.items += { isActive: true, id1: 1, name1: 'None', description1: 'None', client1: 'None', team_member_names1: 'None' };
      });*/
      /*
      <tr v-for='project in project_table'>
        <td style="display:none;">{{ project.id }}</td>
        <td>{{ project.name }}</td>
        <td>{{ project.description }}</td>
        <td>{{ project.client }}</td>
        <td>{{ project.team_member_names }}</td>
        <td><input type='button' value='Update' @click='updateRecord(project.id)'>&nbsp;
        <input type='button' value='Delete' @click='deleteRecord(project.id)'></td>
      </tr>
      */
    }
  }/*,
  created() {
    this.allRecords();
  }*/
}
</script>

<style scoped>
</style>>