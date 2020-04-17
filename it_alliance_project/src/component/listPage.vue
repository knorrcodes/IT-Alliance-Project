<eslint-disable vue/require-v-for-key
<template>
  <div class="listPage">
    <hr />
    <!-- <br /> -->
    <div v-if="false">
      <h1>Spring 2020</h1>
        <ul>
          <li onclick="alert('Team name: IT Alliance \nMembers: Darrin Knorr, Joe Massaro, Bassim Alamer, Josh Martin \nSemester: Spring 2020')">IT Alliance Project</li>
          <li onclick="alert('Team name: AI ChatBot for Customer Serice with SMS Text messenger Bot \nMembers Albert Huang, Austin Steele, Edward Yevincy Quentin Peters, Elizabeth Fleming \n Semester: Spring 2020')" >AI ChatBot for Customer Serice with SMS Text messenger Bot</li>
          <li onclick="alert('Team name: Champion Labs \nMembers: Payton Sharpe, Joshua Joines, Hans Lagenour, Austin Garrison, Nicholas Scheller \nSemester: Spring 2020')">Champion Lab</li>
          <li onclick="alert('Team name: WAZE: city transportation analysis \nMembers: Sara Kniepmann, Austin Scherer, Celina Snyder, Kenlee Rumer, Alex Markle \nSemester: Spring 2020')">Evansville Association for the Blind</li>
          <li onclick="alert('Team name: Evansville Association for the Blind \nMembers: Raquel Harvey, Nathan Hall, Garrett Hopf\nSemester: Spring 2020')">Silent Auction for ECTA (Evansville Community Tennis Association)</li>
          <li onclick="alert('Team name: Silent Auction for ECTA (Evansville Community Tennis Association) \nMembers: Lee Keitel, Jace Anderson, Jeremy Hertel, Brandon Beach, Sky Kollak \nSemester: Spring 2020')">Vanderburgh County Fair</li>
        </ul>

      <br><br>
    </div>
    <h1 class="text-center">Projects by Semester</h1>
    
    <!-- Select Semester -->
    <b-dropdown id="semesterSelect" variant="primary" :text="dropdownText" class="m-md-2">
      <b-dropdown-item @click='spring20(0)'>Spring 2020</b-dropdown-item>
      <b-dropdown-item @click='fall20(0)'>Fall 2020</b-dropdown-item>
    </b-dropdown>

    <br><br>

    <b-form @submit="addRecord">
      <b-row no-gutters>
        <b-col md="8">
          <!-- Project Name -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto">Project Name: </h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-form-input class="ml-2" required v-model="addForm.name" placeholder="Enter project name"></b-form-input>
              </b-row>
            </b-col>
          </b-row>
          
          <!-- Client -->
          <b-row no-gutters>
            <b-col md="3"> 
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Client: </h5>
              </b-row>
            </b-col>

            <b-col md="9"> 
              <b-row no-gutters> 
                <b-form-input class="mt-2 ml-2" required v-model="addForm.client" placeholder="Enter client name"></b-form-input>
              </b-row>
            </b-col>
          </b-row>

          <!-- Client Email -->
          <b-row no-gutters>
            <b-col md="3"> 
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Client Email: </h5>
              </b-row>
            </b-col>

            <b-col md="9"> 
              <b-row no-gutters> 
                <b-form-input class="mt-2 ml-2" required v-model="addForm.client_email" placeholder="Enter client email"></b-form-input>
              </b-row>
            </b-col>
          </b-row>

          <!-- Team Members -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Team Members: </h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-form-input class="mt-2 ml-2" required v-model="addForm.team_member_names" placeholder="Enter team members"></b-form-input>
              </b-row>
            </b-col>
          </b-row>

          <!-- T-Shirt Sizes -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">T-Shirt Sizes: </h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <h5 class="ml-2 mt-2">S : </h5>
                <b-dropdown size="sm" v-model="addForm.tshirt_s" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="addForm.tshirt_s">
                  <b-dropdown-item @click="setTshirtS(0)">0</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(1)">1</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(2)">2</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(3)">3</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(4)">4</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(5)">5</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(6)">6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">M : </h5>
                <b-dropdown size="sm" v-model="addForm.tshirt_m" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="addForm.tshirt_m">
                  <b-dropdown-item @click="setTshirtM(0)">0</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(1)">1</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(2)">2</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(3)">3</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(4)">4</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(5)">5</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(6)">6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">L : </h5>
                <b-dropdown size="sm" v-model="addForm.tshirt_l" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="addForm.tshirt_l">
                  <b-dropdown-item @click="setTshirtL(0)">0</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(1)">1</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(2)">2</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(3)">3</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(4)">4</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(5)">5</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(6)">6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">XL : </h5>
                <b-dropdown size="sm" v-model="addForm.tshirt_xl" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="addForm.tshirt_xl">
                  <b-dropdown-item @click="setTshirtXL(0)">0</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtXL(1)">1</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtXL(2)">2</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtXL(3)">3</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtXL(4)">4</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtXL(5)">5</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtXL(6)">6</b-dropdown-item>
                </b-dropdown>
              </b-row>
            </b-col>
          </b-row>

          <!-- Project Priority -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Priority: </h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-dropdown :variant="changePriorityColor(addForm.priority)" v-model="addForm.priority" class="ml-2 mt-2" :text="addForm.priority">
                  <b-dropdown-item @click="setPriority(5)" variant="danger">5 - Very High</b-dropdown-item>
                  <b-dropdown-item @click="setPriority(4)" variant="warning">4 - High</b-dropdown-item>
                  <b-dropdown-item @click="setPriority(3)" variant="success">3 - Normal</b-dropdown-item>
                  <b-dropdown-item @click="setPriority(2)" variant="primary">2 - Low</b-dropdown-item>
                  <b-dropdown-item @click="setPriority(1)" variant="info">1 - Very Low</b-dropdown-item>
                </b-dropdown>
              </b-row>
            </b-col>
          </b-row>

          <!-- Project Status -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Project Status: </h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-button variant="warning" class="ml-2 mt-2">Proposed</b-button>
              </b-row>
            </b-col>
          </b-row>
          
          <!-- Semester -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Semester: </h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-dropdown id="semesterSelect" class="ml-2 mt-2" variant="primary" :text="dropdownText1">
                  <b-dropdown-item @click='spring20(1)'>Spring 2020</b-dropdown-item>
                  <b-dropdown-item @click='fall20(1)'>Fall 2020</b-dropdown-item>
                </b-dropdown>
              </b-row>
            </b-col>
          </b-row>

          <!-- Start Date -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Start Date:</h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <v-date-picker 
                :popover="{ placement: 'bottom', visibility: 'click' }" 
                class="ml-2 mt-2"
                v-model="addForm.start_date"
                required
                :input-props="{placeholder: 'Select date'}"></v-date-picker>
              </b-row>
            </b-col>
          </b-row>
          
          <!-- Projected Completion Date -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Projected Completion:</h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <v-date-picker 
                :popover="{ placement: 'bottom', visibility: 'click' }" 
                class="ml-2 mt-2" 
                v-model="addForm.projected_date"
                required
                :input-props="{placeholder: 'Select date'}"></v-date-picker>
              </b-row>
            </b-col>
          </b-row>

          <!-- Completed Date -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto mt-2">Completed Date:</h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <v-date-picker 
                  :popover="{ placement: 'bottom', visibility: 'click' }" 
                  class="ml-2 mt-2" 
                  v-model="addForm.completed_date"
                  required
                  :input-props="{placeholder: 'Select date'}"></v-date-picker>
              </b-row>
            </b-col>
          </b-row>

          <!-- Description -->
          <b-row no-gutters>
            <b-col md="3">
              <b-row no-gutters>
                <h5 class="ml-auto mt-2">Description:</h5>
              </b-row>
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-form-textarea align="left" required v-model="addForm.description" max-rows="8" class="ml-2 mt-2" placeholder="Enter project description"></b-form-textarea>
              </b-row>
            </b-col>
          </b-row>

          <!-- Buttons -->
          <b-row no-gutters>
            <b-col md="3">
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-button type="submit" class="ml-2 mt-2" variant="primary">Submit</b-button>
                <b-button @click="addFormClear()" class="ml-2 mt-2" variant="outline-primary">Clear</b-button>
                <b-button @click='addFormCancel()' class="ml-2 mt-2" variant="outline-dark">Cancel</b-button>
              </b-row>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      
    </b-form>

    <br><br>

    <b-card no-body v-for='project in project_table'>
      <b-row no-gutters>
        <b-col md="6">
          <!-- Project Name -->
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
          
          <!-- Client -->
          <b-row no-gutters>
            <b-col md="4"> 
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Client: </h5>
              </b-row>
            </b-col>

            <b-col md="8"> 
              <b-row no-gutters> 
                <b-button class="m-1" :id="project.client" variant="outline-dark">{{ project.client }}</b-button>
                <b-tooltip :target="project.client" triggers="hover" placement="right" variant="light">
                  <a :href="getEmail(project.client_email)">{{ project.client_email }}</a>
                </b-tooltip>
              </b-row>
            </b-col>
          </b-row>

          <!-- Team Members -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Team Members: </h5>
              </b-row>
            </b-col>

            <b-col md="6">
              <b-row no-gutters>
                <h3 align="left" class="m-1">{{ project.team_member_names }}</h3>
              </b-row>
            </b-col>
          </b-row>

          <!-- T-Shirt Sizes -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">T-Shirt Sizes: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h5 class="ml-1 mt-2">S : </h5>
                <b-dropdown size="sm" :disabled="true" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="project.tshirt_s">
                  <b-dropdown-item>0</b-dropdown-item>
                  <b-dropdown-item>1</b-dropdown-item>
                  <b-dropdown-item>2</b-dropdown-item>
                  <b-dropdown-item>3</b-dropdown-item>
                  <b-dropdown-item>4</b-dropdown-item>
                  <b-dropdown-item>5</b-dropdown-item>
                  <b-dropdown-item>6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">M : </h5>
                <b-dropdown size="sm" :disabled="true" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="project.tshirt_m">
                  <b-dropdown-item>0</b-dropdown-item>
                  <b-dropdown-item>1</b-dropdown-item>
                  <b-dropdown-item>2</b-dropdown-item>
                  <b-dropdown-item>3</b-dropdown-item>
                  <b-dropdown-item>4</b-dropdown-item>
                  <b-dropdown-item>5</b-dropdown-item>
                  <b-dropdown-item>6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">L : </h5>
                <b-dropdown size="sm" :disabled="true" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="project.tshirt_l">
                  <b-dropdown-item>0</b-dropdown-item>
                  <b-dropdown-item>1</b-dropdown-item>
                  <b-dropdown-item>2</b-dropdown-item>
                  <b-dropdown-item>3</b-dropdown-item>
                  <b-dropdown-item>4</b-dropdown-item>
                  <b-dropdown-item>5</b-dropdown-item>
                  <b-dropdown-item>6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">XL : </h5>
                <b-dropdown size="sm" :disabled="true" variant="dark" class="ml-1 mt-2 wrap-dropdown" :text="project.tshirt_xl">
                  <b-dropdown-item>0</b-dropdown-item>
                  <b-dropdown-item>1</b-dropdown-item>
                  <b-dropdown-item>2</b-dropdown-item>
                  <b-dropdown-item>3</b-dropdown-item>
                  <b-dropdown-item>4</b-dropdown-item>
                  <b-dropdown-item>5</b-dropdown-item>
                  <b-dropdown-item>6</b-dropdown-item>
                </b-dropdown>
              </b-row>
            </b-col>
          </b-row>

          <!-- Project Status -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Project Status: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <b-dropdown :disabled="false" :variant="changeStatusColor(project.status)" class="ml-1 mt-2" :text="project.status">
                  <b-dropdown-item variant="warning">Proposed</b-dropdown-item>
                  <b-dropdown-item variant="success">Approved</b-dropdown-item>
                  <b-dropdown-item variant="primary">In Progress</b-dropdown-item>
                  <b-dropdown-item variant="danger">Waiting</b-dropdown-item>
                  <b-dropdown-item variant="dark">Completed</b-dropdown-item>
                </b-dropdown>
              </b-row>
            </b-col>
          </b-row>

          <!-- Project Priority -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Priority: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <b-dropdown :disabled="false" :variant="changePriorityColor(project.priority)" class="ml-1 mt-2" :text="project.priority">
                  <b-dropdown-item variant="danger">5 - Very High</b-dropdown-item>
                  <b-dropdown-item variant="warning">4 - High</b-dropdown-item>
                  <b-dropdown-item variant="success">3 - Normal</b-dropdown-item>
                  <b-dropdown-item variant="primary">2 - Low</b-dropdown-item>
                  <b-dropdown-item variant="info">1 - Very Low</b-dropdown-item>
                </b-dropdown>
              </b-row>
            </b-col>
          </b-row>

          <!-- Start Date -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Start Date:</h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h5 class="ml-1 mt-2">{{ formatDate(project.start_date) }}</h5>
              </b-row>
            </b-col>
          </b-row>
          
          <!-- Projected Completion Date -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Projected Completion:</h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h5 class="ml-1 mt-2">{{ formatDate(project.projected_date) }}</h5>
              </b-row>
            </b-col>
          </b-row>

          <!-- Completed Date -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Completed Date:</h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h5 class="ml-1 mt-2">{{ formatDate(project.completed_date) }}</h5>
              </b-row>
            </b-col>
          </b-row>

          <!-- Description -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 class="ml-auto m-2">Description:</h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h5 align="left" class="ml-1 mt-2">{{ project.description }}</h5>
              </b-row>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      
    </b-card>

    <br><br>

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

    <!-- Login Bar -->
    <b-form inline class="justify-content-center" @submit="onSubmit" v-if="show && !loggedIn">
      <b-form-input
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="loginForm.user"
          required
          type="text"
          placeholder="Username"
      ></b-form-input>
      <b-form-input
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="loginForm.pass"
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
/*the idea here is for the Project name to be a link, it would grab information from the database about the Project
    and return that informationa and display it in a pop up for the user to review. */

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
      loginForm: {
        user: '',
        pass: ''
      },
      addForm: {
        table_name: '',
        id: 0,
        priority: '3 - Normal',
        status: 'Proposed',
        name: '',
        start_date: '',
        projected_date: '',
        completed_date: '',
        description: '',
        client: '',
        client_email: '',
        team_member_names: '',
        tshirt_s: '0',
        tshirt_m: '0',
        tshirt_l: '0',
        tshirt_xl: '0'
      },
      show: false,
      loggedIn: false,
      auth: true,
      adminButtons: 'display:none;',
      dropdownText: 'Select Semester',
      dropdownText1: 'Select Semester',
      passwordType: 'password',
      dropdownVariant: 'dark'
    }
  },
  methods: {
    italliance: function(){
      alert("test hello");
    },
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
    /* addRecord() {
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
    }, */
    addRecord(evt) {
      evt.preventDefault();
      if(this.loggedIn == true){
        axios.get('http://localhost/ajaxFile.php', {
          params: {
            request: 2,
            table_name: this.addForm.table_name,
            username: this.username,
            password: this.password,
            priority: this.addForm.priority,
            status: this.addForm.status,
            name: this.addForm.name,
            start_date: this.addForm.start_date.toISOString().substring(0,10),
            projected_date: this.addForm.projected_date.toISOString().substring(0,10),
            completed_date: this.addForm.completed_date.toISOString().substring(0,10),
            description: this.addForm.description,
            client: this.addForm.client,
            client_email: this.addForm.client_email,
            team_member_names: this.addForm.team_member_names,
            tshirt_s: this.addForm.tshirt_s,
            tshirt_m: this.addForm.tshirt_m,
            tshirt_l: this.addForm.tshirt_l,
            tshirt_xl: this.addForm.tshirt_xl
          }
        })
        .then(response => {

          // Fetch records
          this.allRecords();

          // Empty values
          this.addForm.table_name = '';
          this.addForm.id = 0;
          this.addForm.priority = '3 - Normal';
          this.addForm.status = 'Proposed';
          this.addForm.name = '';
          this.addForm.start_date = '';
          this.addForm.projected_date = '';
          this.addForm.completed_date = '';
          this.addForm.description = '';
          this.addForm.client = '';
          this.addForm.client_email = '';
          this.addForm.team_member_names = '';
          this.addForm.tshirt_s = '0';
          this.addForm.tshirt_m = '0';
          this.addForm.tshirt_l = '0';
          this.addForm.tshirt_xl = '0';
  
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
        alert('Please log in to add a project.');
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
    spring20(mode) {
      switch(mode) {
        case 0:
          this.table_name = 'spring20';
          this.dropdownText = 'Spring 2020';
          this.allRecords();
          break;
        case 1:
          this.addForm.table_name = 'spring20';
          this.dropdownText1 = 'Spring 2020';
          break;
      }
    },
    fall20(mode) {
      switch(mode) {
        case 0:
          this.table_name = 'fall20';
          this.dropdownText = 'Fall 2020';
          this.allRecords();
          break;
        case 1:
          this.addForm.table_name = 'fall20';
          this.dropdownText1 = 'Fall 2020';
          break;
      }
    },
    onSubmit(evt) {
      evt.preventDefault();
      this.username = this.loginForm.user;
      this.password = this.loginForm.pass;
      if (this.username == this.adminUser && this.password == this.adminPass) {
        this.auth = true;
        this.loginForm.user = '';
        this.loginForm.pass = '';
        this.allRecords();
        this.loggedIn = true;
        this.adminButtons = "";
      }
      else {
        this.auth = false;
        this.show = false;
        this.loginForm.user = '';
        this.loginForm.pass = '';
        this.show = true;
      }
      
    },
    onClear() {
      this.show = false;
      this.loginForm.user = '';
      this.loginForm.pass = '';
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
      this.loginForm.user = '';
      this.loginForm.pass = '';
    },
    getEmail(email) {
      let emailLink = "mailto:" + email;
      return emailLink;
    },
    formatDate(inDate) {
      var dateText = "";
      if (inDate == null)
        return dateText;
      var nums = inDate.split("-");
      var month = "";
      var day = nums[2];
      var year = nums[0];
      switch(parseInt(nums[1])) {
        case 1:
          month = "January";
          break;
        case 2:
          month = "February";
          break;
        case 3:
          month = "March";
          break;
        case 4:
          month = "April";
          break;
        case 5:
          month = "May";
          break;
        case 6:
          month = "June";
          break;
        case 7:
          month = "July";
          break;
        case 8:
          month = "August";
          break;
        case 9:
          month = "September";
          break;
        case 10:
          month = "October";
          break;
        case 11:
          month = "November";
          break;
        case 12:
          month = "December";
          break;
        default:
          month = nums[1];
          break;
      }
      dateText = month + " " + day + ", " + year;
      return dateText;
    },
    changeStatusColor(inStatus) {
      var variant = "";

      switch(inStatus) {
        case "Proposed":
          variant = "warning";
          break;
        case "Approved":
          variant = "success";
          break;
        case "In Progress":
          variant = "primary";
          break;
        case "Waiting":
          variant = "danger";
          break;
        case "Completed":
          variant = "dark";
          break;
      }
      return variant;
    },
    changePriorityColor(inPriority) {
      var variant = "";

      switch(inPriority) {
        case "5 - Very High":
          variant = "danger";
          break;
        case "4 - High":
          variant = "warning";
          break;
        case "3 - Normal":
          variant = "success";
          break;
        case "2 - Low":
          variant = "primary";
          break;
        case "1 - Very Low":
          variant = "info";
          break;
      }
      return variant;
    },
    setPriority(num) {
      switch(num) {
        case 5:
          this.addForm.priority = "5 - Very High";
          break;
        case 4:
          this.addForm.priority = "4 - High";
          break;
        case 3:
          this.addForm.priority = "3 - Normal";
          break;
        case 2:
          this.addForm.priority = "2 - Low";
          break;
        case 1:
          this.addForm.priority = "1 - Very Low";
          break;
      }
    },
    setTshirtS(num) {
      switch(num) {
        case 0:
          this.addForm.tshirt_s = "0";
          break;
        case 1:
          this.addForm.tshirt_s = "1";
          break;
        case 2:
          this.addForm.tshirt_s = "2";
          break;
        case 3:
          this.addForm.tshirt_s = "3";
          break;
        case 4:
          this.addForm.tshirt_s = "4";
          break;
        case 5:
          this.addForm.tshirt_s = "5";
          break;
        case 6:
          this.addForm.tshirt_s = "6";
          break;
      }
    },
    setTshirtM(num) {
      switch(num) {
        case 0:
          this.addForm.tshirt_m = "0";
          break;
        case 1:
          this.addForm.tshirt_m = "1";
          break;
        case 2:
          this.addForm.tshirt_m = "2";
          break;
        case 3:
          this.addForm.tshirt_m = "3";
          break;
        case 4:
          this.addForm.tshirt_m = "4";
          break;
        case 5:
          this.addForm.tshirt_m = "5";
          break;
        case 6:
          this.addForm.tshirt_m = "6";
          break;
      }
    },
    setTshirtL(num) {
      switch(num) {
        case 0:
          this.addForm.tshirt_l = "0";
          break;
        case 1:
          this.addForm.tshirt_l = "1";
          break;
        case 2:
          this.addForm.tshirt_l = "2";
          break;
        case 3:
          this.addForm.tshirt_l = "3";
          break;
        case 4:
          this.addForm.tshirt_l = "4";
          break;
        case 5:
          this.addForm.tshirt_l = "5";
          break;
        case 6:
          this.addForm.tshirt_l = "6";
          break;
      }
    },
    setTshirtXL(num) {
      switch(num) {
        case 0:
          this.addForm.tshirt_xl = "0";
          break;
        case 1:
          this.addForm.tshirt_xl = "1";
          break;
        case 2:
          this.addForm.tshirt_xl = "2";
          break;
        case 3:
          this.addForm.tshirt_xl = "3";
          break;
        case 4:
          this.addForm.tshirt_xl = "4";
          break;
        case 5:
          this.addForm.tshirt_xl = "5";
          break;
        case 6:
          this.addForm.tshirt_xl = "6";
          break;
      }
    },
    addFormClear() {

    },
    addFormCancel() {

    }
  }/*,
  created() {
    this.allRecords();
  }*/
}
</script>

<style scoped>
hr {
  width: 90%;
}
li {
  font-size: 20px;
}
/* Removes the min-width on the dropdown-menu and sets the width to 100% of the parent */
.wrap-dropdown .dropdown-menu {
  display: contents;
  width: 100%;
  min-width: 0rem;
}
/* applies white-space: normal to all tags inside the dropdown-menu */
/* .wrap-dropdown * {
  white-space: normal;
} */
</style>