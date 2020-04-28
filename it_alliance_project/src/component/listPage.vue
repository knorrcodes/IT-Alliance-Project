<eslint-disable vue/require-v-for-key
<template>
  <div class="listPage">
    <hr />
    <!-- <br /> -->
    <!-- <div>
      <h1>Spring 2020</h1>
        <ul>
          <li onclick="alert('Team name: IT Alliance \nMembers: Darrin Knorr, Joe Massaro, Bassim Alamer, Josh Martin \nSemester: Spring 2020')">IT Alliance Project</li>
          <li onclick="alert('Team name: AI ChatBot for Customer Serice with SMS Text messenger Bot \nMembers Albert Huang, Austin Steele, Edward Yevincy Quentin Peters, Elizabeth Fleming \n Semester: Spring 2020')" >AI ChatBot for Customer Service with SMS Text messenger Bot</li>
          <li onclick="alert('Team name: Champion Labs \nMembers: Payton Sharpe, Joshua Joines, Hans Lagenour, Austin Garrison, Nicholas Scheller \nSemester: Spring 2020')">Champion Lab</li>
          <li onclick="alert('Team name: WAZE: city transportation analysis \nMembers: Sara Kniepmann, Austin Scherer, Celina Snyder, Kenlee Rumer, Alex Markle \nSemester: Spring 2020')">Evansville Association for the Blind</li>
          <li onclick="alert('Team name: Evansville Association for the Blind \nMembers: Raquel Harvey, Nathan Hall, Garrett Hopf\nSemester: Spring 2020')">Silent Auction for ECTA (Evansville Community Tennis Association)</li>
          <li onclick="alert('Team name: Silent Auction for ECTA (Evansville Community Tennis Association) \nMembers: Lee Keitel, Jace Anderson, Jeremy Hertel, Brandon Beach, Sky Kollak \nSemester: Spring 2020')">Vanderburgh County Fair</li>
        </ul>

      <br><br>
    </div> -->
    <b-row no-gutters>
      <h1 class="mx-auto">Projects by Semester</h1>
    </b-row>
    <hr />
    <!-- File Testing -->
    <div>
      <!-- File Input Form -->
      <!-- <b-row no-gutters>
        <b-form-file
          id="fileInput"
          v-model="files"
          :state="Boolean(files)"
          placeholder="Choose a file or drop one here"
          drop-placeholder="Drop file here"
          class="mx-5"
          multiple
        ></b-form-file>
      </b-row> -->
      <!-- File Buttons -->
      <!-- <b-row no-gutters>
        <b-button v-if='files' @click='toBlob()'>Covert to Blobs</b-button>
        <b-button v-if='long_blobs' @click='exportBlobs()'>Export Blobs</b-button>
        <b-button @click='importBlobs()'>Import Blobs</b-button>
        <b-button v-if='new_long_blobs' @click='toFile()'>Convert to Files</b-button>
      </b-row> -->
      <!-- <b-row v-for='file in files' no-gutters>
        <div class="mt-3 ml-5">Selected file(s): {{ file ? file.name : '' }}</div>
      </b-row> -->

      <!-- File 1 -->
      <!-- <b-row v-if='files' v-for='file in files' no-gutters>
        <p>Before File:</p>
        <p class="ml-2">{{file}}</p>
        <p class="ml-2">{{file.name}}</p>
        <p class="ml-2">{{file.type}}</p>
        <b-img class="ml-2" :src="createURL(file)" :alt="file.name" title="file"></b-img>
        <p class="ml-2">{{createURL(file)}}</p>
      </b-row> -->
      <!-- Blob 1 -->
      <!-- <b-row v-if='long_blobs' v-for='blob in long_blobs' no-gutters>
        <p>Before Blob:</p>
        <p class="ml-2">{{blob}}</p>
        <p class="ml-2">{{blob.long_blob}}</p>
        <b-img class="ml-2" :src="createURL(blob.long_blob)" :alt="blob.name" title="blob"></b-img>
      </b-row> -->
      <!-- Blob 2 -->
      <!-- <b-row v-if='new_long_blobs' v-for='newBlob in new_long_blobs'  no-gutters>
        <p>After Blob: </p>
        <p class="ml-2">{{newBlob}}</p>
        <p class="ml-2">{{blob.long_blob.text()}}</p>
        <p class="ml-2">{{new_long_blobs.indexOf(newBlob)}}</p>
        <p class="ml-2">{{newBlob.long_blob}}</p>
        <b-img :src="createURL(newBlob.long_blob)" :alt="newBlob.name"></b-img>
        <p class="ml-2">{{ createURL(newBlob.long_blob) }}</p>
        <b-button @click='imageView(newBlob.id)' class="ml-2">View Image</b-button>
      </b-row> -->
      <!-- File 2 -->
      <!-- <b-row v-if='newFiles' v-for='file in newFiles' no-gutters>
        <p>After File: </p>
        <p class="ml-2">{{file}}</p>
        <p class="ml-2">{{file.name}}</p>
        <p class="ml-2">{{file.type}}</p>
        <b-img class="ml-2" :src="createURL(file)"></b-img>
        <p class="ml-2">{{createURL(file)}}</p>
      </b-row> -->
    </div>
    
    <!-- Select Semester -->
    <b-dropdown id="semesterSelect" variant="primary" :text="dropdownText" class="m-md-2">
      <b-dropdown-item @click='spring20(0)'>Spring 2020</b-dropdown-item>
      <b-dropdown-item @click='fall20(0)'>Fall 2020</b-dropdown-item>
    </b-dropdown>
  
    <b-button @click='logout()' variant="primary" v-if="loggedIn">Log Out</b-button>

    <b-button @click='login()' variant="primary" v-if="!show">Log In to Make Changes</b-button>

    <b-button @click='addClick()' class="ml-2" variant="primary" v-if="loggedIn && !addMode">Add Record</b-button>

    <b-alert variant="success" show v-if="loggedIn">Logged in as {{this.username}}</b-alert>
    <b-alert variant="danger" dismissible @dismissed="auth=true" show v-if="!auth">Username or Password Incorrect. Try Again.</b-alert>
    
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
      <br><br>
    </b-form>

    <!-- Add / Modify Form -->
    <b-form v-if="(addMode || modifyMode) && loggedIn" @submit="addRecord">
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
                <b-form-textarea class="mt-2 ml-2" max-rows="8" required v-model="addForm.team_member_names" placeholder="Enter team members"></b-form-textarea>
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
                <b-dropdown size="sm" v-model="addForm.tshirt_s" variant="dark" class="ml-1 mt-2" :text="addForm.tshirt_s">
                  <b-dropdown-item @click="setTshirtS(0)">0</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(1)">1</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(2)">2</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(3)">3</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(4)">4</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(5)">5</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtS(6)">6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">M : </h5>
                <b-dropdown size="sm" v-model="addForm.tshirt_m" variant="dark" class="ml-1 mt-2" :text="addForm.tshirt_m">
                  <b-dropdown-item @click="setTshirtM(0)">0</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(1)">1</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(2)">2</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(3)">3</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(4)">4</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(5)">5</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtM(6)">6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">L : </h5>
                <b-dropdown size="sm" v-model="addForm.tshirt_l" variant="dark" class="ml-1 mt-2" :text="addForm.tshirt_l">
                  <b-dropdown-item @click="setTshirtL(0)">0</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(1)">1</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(2)">2</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(3)">3</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(4)">4</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(5)">5</b-dropdown-item>
                  <b-dropdown-item @click="setTshirtL(6)">6</b-dropdown-item>
                </b-dropdown>
                <h5 class="ml-3 mt-2">XL : </h5>
                <b-dropdown size="sm" v-model="addForm.tshirt_xl" variant="dark" class="ml-1 mt-2" :text="addForm.tshirt_xl">
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
                <b-dropdown :disabled="!modifyMode" :variant="changeStatusColor(addForm.status)" class="ml-2 mt-2" :text="addForm.status">
                  <b-dropdown-item @click="setStatus('Proposed')" variant="warning">Proposed</b-dropdown-item>
                  <b-dropdown-item @click="setStatus('Approved')" variant="success">Approved</b-dropdown-item>
                  <b-dropdown-item @click="setStatus('In Progress')" variant="primary">In Progress</b-dropdown-item>
                  <b-dropdown-item @click="setStatus('Waiting')" variant="danger">Waiting</b-dropdown-item>
                  <b-dropdown-item @click="setStatus('Completed')" variant="dark">Completed</b-dropdown-item>
                </b-dropdown>
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
                <b-dropdown id="semesterSelect" class="ml-2 mt-2" variant="primary" :text="addForm.semester">
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
                is-required
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
                is-required
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

          <!-- Submit / Clear / Cancel Buttons -->
          <b-row no-gutters>
            <b-col md="3">
            </b-col>

            <b-col md="9">
              <b-row no-gutters>
                <b-button type="submit" class="ml-2 mt-2" variant="primary">Submit</b-button>
                <b-button @click="addFormClear()" v-if="addMode" class="ml-2 mt-2" variant="outline-primary">Clear</b-button>
                <b-button @click='addFormCancel()' class="ml-2 mt-2" variant="outline-dark">Cancel</b-button>
              </b-row>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      <br><br>
    </b-form>

    <!-- Project List -->
    <b-card class="mt-3" no-body v-for='project in project_table'>
      <b-row no-gutters>
        <b-col md="6">
          <!-- Project Name -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto m-2 mt-3">Project Name: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h1 align="left" class="m-1">{{ project.name }}</h1>
              </b-row>
            </b-col>
          </b-row>
          
          <!-- Client -->
          <b-row no-gutters>
            <b-col md="4"> 
              <b-row no-gutters>
                <h5 align="right" class="ml-auto m-2">Client: </h5>
              </b-row>
            </b-col>

            <b-col md="8"> 
              <b-row no-gutters> 
                <b-button class="m-1" :id="project.client+project.id" variant="outline-dark">{{ project.client }}</b-button>
                <b-tooltip :target="project.client+project.id" triggers="hover" placement="right" variant="light">
                  <a :href="getEmail(project.client_email)">{{ project.client_email }}</a>
                </b-tooltip>
              </b-row>
            </b-col>
          </b-row>

          <!-- Team Members -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto m-2">Team Members: </h5>
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
                <h5 align="right" class="ml-auto m-2">T-Shirt Sizes: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h5 class="ml-1 mt-2">S : </h5>
                <b-button size="sm" variant="dark" class="ml-1 mt-2">{{project.tshirt_s}}</b-button>
                <h5 class="ml-3 mt-2">M : </h5>
                <b-button size="sm" variant="dark" class="ml-1 mt-2">{{project.tshirt_m}}</b-button>
                <h5 class="ml-3 mt-2">L : </h5>
                <b-button size="sm" variant="dark" class="ml-1 mt-2">{{project.tshirt_l}}</b-button>
                <h5 class="ml-3 mt-2">XL : </h5>
                <b-button size="sm" variant="dark" class="ml-1 mt-2">{{project.tshirt_xl}}</b-button>
              </b-row>
            </b-col>
          </b-row>

          <!-- Project Status -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto m-2">Project Status: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <b-button :variant="changeStatusColor(project.status)" class="ml-1 mt-2">{{project.status}}</b-button>
              </b-row>
            </b-col>
          </b-row>

          <!-- Project Priority -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto m-2">Priority: </h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <b-button :variant="changePriorityColor(project.priority)" class="ml-1 mt-2">{{project.priority}}</b-button>
              </b-row>
            </b-col>
          </b-row>

          <!-- Start Date -->
          <b-row no-gutters>
            <b-col md="4">
              <b-row no-gutters>
                <h5 align="right" class="ml-auto m-2">Start Date:</h5>
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
                <h5 align="right" class="ml-auto m-2">Projected Completion:</h5>
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
                <h5 align="right" class="ml-auto m-2">Completed Date:</h5>
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
                <h5 align="right" class="ml-auto m-2">Description:</h5>
              </b-row>
            </b-col>

            <b-col md="8">
              <b-row no-gutters>
                <h5 align="left" class="ml-1 mt-2">{{ project.description }}</h5>
              </b-row>
            </b-col>
          </b-row>

          <!-- Update / Delete Buttons -->
          <b-row v-if="loggedIn" no-gutters>
            <b-col md="4"></b-col>

            <b-col md="8">
              <b-row no-gutters>
                <b-button @click="modifyRecord(project)" class="ml-2 my-2" variant="primary">Modify</b-button>
                <b-button @click="deleteRecord(project.id)" class="ml-2 my-2" variant="danger">Delete</b-button>
              </b-row>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      
    </b-card>
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
        semester: 'Select Semester',
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
      passwordType: 'password',
      dropdownVariant: 'dark',
      addMode: false,
      modifyMode: false,
      files: null,
      blobs: null,
      newBlobs: null,
      newFiles: null,
      numFiles: 0,
      long_blob: {
        semester: null,
        project_id: null,
        long_blob: null,
        file_name: null,
        file_type: null
      },
      long_blobs: null,
      new_long_blobs: null
    }
  },
  methods: {
    italliance(){
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
    addRecord(evt) {
      evt.preventDefault();
      let completedDate = null;
      if (this.addForm.completed_date != '' && this.addForm.completed_date != null) {
        completedDate = this.addForm.completed_date.toISOString().substring(0,10);
      }

      if (this.addForm.semester != 'Select Semester') {
        if (this.addForm.start_date != '' && this.addForm.projected_date != '' && this.addForm.start_date != null && this.addForm.projected_date != null) {
          if (completedDate == null) {
            if(this.loggedIn == true && this.addMode == true){
              axios.get('http://localhost/ajaxFile.php', {
                params: {
                  request: '2',
                  table_name: this.addForm.table_name,
                  username: this.username,
                  password: this.password,
                  priority: this.addForm.priority,
                  status: this.addForm.status,
                  semester: this.addForm.semester,
                  name: this.addForm.name,
                  start_date: this.addForm.start_date.toISOString().substring(0,10),
                  projected_date: this.addForm.projected_date.toISOString().substring(0,10),
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
                this.addForm.semester = 'Select Semester';
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

                // Turn Off Add Form
                this.addMode = false;

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
              this.updateRecord();
            }
          }
          else {
            if(this.loggedIn == true && this.addMode == true){
              axios.get('http://localhost/ajaxFile.php', {
                params: {
                  request: '2',
                  table_name: this.addForm.table_name,
                  username: this.username,
                  password: this.password,
                  priority: this.addForm.priority,
                  status: this.addForm.status,
                  semester: this.addForm.semester,
                  name: this.addForm.name,
                  start_date: this.addForm.start_date.toISOString().substring(0,10),
                  projected_date: this.addForm.projected_date.toISOString().substring(0,10),
                  completed_date: completedDate,
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
                this.addForm.semester = 'Select Semester';
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

                // Turn Off Add Form
                this.addMode = false;

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
              this.updateRecord();
            }
          }
        }
        else {
          alert("Please choose a start date and projected completion date.");
        }
      }
      else {
        alert("Please select a semester.");
      }
    },
    updateRecord() {
      let completedDate = null;
      if (this.addForm.completed_date != '' && this.addForm.completed_date != null) {
        completedDate = this.addForm.completed_date.toISOString().substring(0,10);
      }
      
      if (this.addForm.start_date != '' && this.addForm.projected_date != '' && this.addForm.start_date != null && this.addForm.projected_date != null) {
        if (completedDate == null) {
          if (this.loggedIn && this.modifyMode) {
            axios.get('http://localhost/ajaxFile.php', {
              params: {
                request: '3',
                table_name: this.addForm.table_name,
                username: this.username,
                password: this.password,
                id: this.addForm.id,
                priority: this.addForm.priority,
                status: this.addForm.status,
                semester: this.addForm.semester,
                name: this.addForm.name,
                start_date: this.addForm.start_date.toISOString().substring(0,10),
                projected_date: this.addForm.projected_date.toISOString().substring(0,10),
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
              this.addForm.semester = 'Select Semester';
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

              // Turn Off Add Form
              this.modifyMode = false;

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
        else {
          if (this.loggedIn && this.modifyMode) {
            axios.get('http://localhost/ajaxFile.php', {
              params: {
                request: '3',
                table_name: this.addForm.table_name,
                username: this.username,
                password: this.password,
                id: this.addForm.id,
                priority: this.addForm.priority,
                status: this.addForm.status,
                semester: this.addForm.semester,
                name: this.addForm.name,
                start_date: this.addForm.start_date.toISOString().substring(0,10),
                projected_date: this.addForm.projected_date.toISOString().substring(0,10),
                completed_date: completedDate,
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
              this.addForm.semester = 'Select Semester';
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

              // Turn Off Add Form
              this.modifyMode = false;

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
      }
      else {
        alert("Please choose a start date and projected completion date.");
      }
    },
    deleteRecord(id) {
      if (confirm('Are you sure you want to delete?')) {
        axios.get('http://localhost/ajaxFile.php', {
          params: {
            request: '4',
            table_name: this.table_name,
            username: this.username,
            password: this.password,
            id: id,
          }
        })
        .then(response => {
          this.allRecords();
          
          // Empty values
          /* this.name = '';
          this.description = '';
          this.client = '';
          this.team_member_names = ''; */

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
          this.addForm.semester = 'Spring 2020';
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
          this.addForm.semester = 'Fall 2020';
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
    setStatus(inStatus) {
      this.addForm.status = inStatus;
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
      this.addForm.table_name = '';
      this.addForm.id = 0;
      this.addForm.priority = '3 - Normal';
      this.addForm.status = 'Proposed';
      this.addForm.name = '';
      this.addForm.semester = 'Select Semester';
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
    },
    addFormCancel() {
      // Reset Add Form to Default
      this.addForm.table_name = '';
      this.addForm.id = 0;
      this.addForm.priority = '3 - Normal';
      this.addForm.status = 'Proposed';
      this.addForm.name = '';
      this.addForm.semester = 'Select Semester';
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

      // Turn Off Add Form
      this.addMode = false;
      this.modifyMode = false;
    },
    modifyRecord(project) {
      this.addMode = false;
      this.modifyMode = true;

      window.scrollTo(0,0);

      let start = project.start_date.split('-');
      start[1]--;
      let startDate = new Date(start[0], start[1], start[2]);

      let projected = project.projected_date.split('-');
      projected[1]--;
      let projectedDate = new Date(projected[0], projected[1], projected[2]);

      let completedDate = '';
      if (project.completed_date != null) {
        let completed = project.completed_date.split('-');
        completed[1]--;
        completedDate = new Date(completed[0], completed[1], completed[2]);
      }

      // Fill in Add Form with Existing Data
      this.addForm.table_name = this.getTableName(project.semester);
      this.addForm.id = project.id;
      this.addForm.priority = project.priority;
      this.addForm.status = project.status;
      this.addForm.semester = project.semester;
      this.addForm.name = project.name;
      this.addForm.start_date = startDate;
      this.addForm.projected_date = projectedDate;
      this.addForm.completed_date = completedDate;
      this.addForm.description = project.description;
      this.addForm.client = project.client;
      this.addForm.client_email = project.client_email;
      this.addForm.team_member_names = project.team_member_names;
      this.addForm.tshirt_s = project.tshirt_s;
      this.addForm.tshirt_m = project.tshirt_m;
      this.addForm.tshirt_l = project.tshirt_l;
      this.addForm.tshirt_xl = project.tshirt_xl;
    },
    addClick() {
      this.addMode = true;
      this.modifyMode = false;

      // Empty values
      this.addForm.table_name = '';
      this.addForm.id = 0;
      this.addForm.priority = '3 - Normal';
      this.addForm.status = 'Proposed';
      this.addForm.semester = 'Select Semester';
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
    },
    getTableName(semester) {
      let table_name = '';
      switch(semester) {
        case 'Spring 2020':
          table_name = 'spring20';
          break;
        case 'Fall 2020':
          table_name = 'fall20';
          break;
      }
      return table_name;
    },
    createURL(file) {
      let objectURL = URL.createObjectURL(file);
      return objectURL;
    },
    toBlob() {
      this.long_blobs = [];
      for (let i = 0; i < this.files.length; i++) {
        let text = "\"" + this.files[i].type + "\"";
        let blob = new Blob([this.files[i]], {type : text});
        let blobForm = {
          'semester': 'spring20',
          'project_id': 1,
          'long_blob': blob,
          'file_name': this.files[i].name,
          'file_type': this.files[i].type,
        };
        this.long_blobs[i] = blobForm;
      }
    },
    toFile() {
      this.newFiles = [];
      for (let i = 0; i < this.new_long_blobs.length; i++) {
        //let text1 = "\"" + new_long_blobs[i].file_type + "\"";
        //let fileNum = i + 1;
        //let fileName = "file" + fileNum;
        let file = new File([this.new_long_blobs[i].long_blob], this.new_long_blobs[i].file_name, {type: this.new_long_blobs[i].file_type});
        this.newFiles[i] = file;
      }
    },
    exportBlobs() {
      for (let i = 0; i < this.long_blobs.length; i++) {
        axios.post('http://localhost/ajaxFile.php', {
          params: {
            request: '5',
            table_name: 'blobstorage',
            username: 'dbAdmin',
            password: 'Doodle6-Clothing',
            semester: this.long_blobs[i].semester,
            project_id: this.long_blobs[i].project_id,
            long_blob: this.long_blobs[i].long_blob,
            file_name: this.long_blobs[i].file_name,
            file_type: this.long_blobs[i].file_type
          }
        })
        .then(response => {
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
    importBlobs() {
      axios.get('http://localhost/ajaxFile.php', {
        params: {
          request: '6',
          table_name: 'blobstorage',
          username: 'dbAdmin',
          password: 'Doodle6-Clothing',
          semester: 'spring20',
          project_id: 1
        }
      })
      .then(response => {
        //alert(response.data);
        //this.toFile(response.data);
        //this.newBlobs = response.data;
        this.decodeJSON(response.data);
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
    decodeJSON(data) {
      /* let blobForm = {
        'semester': null,
        'project_id': null,
        'long_blob': null,
        'file_name': null,
        'file_type': null,
      }; */
      this.new_long_blobs = [];
      for (let i = 0; i < data.length; i++) {
        //let blob = new Blob([JSON.parse(data[i].long_blob)], {type: data[i].file_type});
        let blob = JSON.parse(data[i].long_blob);
        let blobForm = {
        'id': data[i].id,
        'semester': data[i].semester,
        'project_id': data[i].project_id,
        'long_blob': blob,
        'file_name': data[i].file_name,
        'file_type': data[i].file_type,
      };
        /* blobForm.semester = data[i].semester;
        blobForm.project_id = data[i].project_id;
        blobForm.long_blob = data[i].long_blob;
        blobForm.file_name = data[i].file_name;
        blobForm.file_type = data[i].file_type; */
        //let blobForm = this.long_blob;
        this.new_long_blobs[i] = blobForm;
      }
      /* this.long_blob.semester = null;
      this.long_blob.project_id = null;
      this.long_blob.long_blob = null;
      this.long_blob.file_name = null;
      this.long_blob.file_type = null; */

      //let x = data.split('"');
      //let array = x[3];
      /*let x = data[0].files;
      this.newBlobs = [];
      for (let i = 0; i < x.length; i++) {
        this.newBlobs[i] = x[i];
      }*/
      /* this.newBlobs = [];
      this.newBlobs[0] = data; */
      //x[0] = data.files;
    },
    typeOf(value) {
      return typeof value;
    },
    imageView(id) {
      axios.get('http://localhost/ajaxFile.php', {
        params: {
          request: '7',
          username: 'dbAdmin',
          password: 'Doodle6-Clothing',
          id: id
        }
      })
      .then(response => {
        //alert(response.data);
        //return response.data;
        let binaryData = [];
        binaryData.push(response.data);
        let url = this.createURL(new Blob([binaryData], {type: "image/jpeg"}));
        //let url = this.createURL(response.data);
        return url;
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
}
</script>

<style scoped>
hr {
  width: 90%;
}
li {
  font-size: 20px;
}
</style>