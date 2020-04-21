# it_alliance_project

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Run your tests
```
npm run test
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

### Vue Reference
https://bootstrap-vue.js.org/docs

https://developer.okta.com/code/vue/

## WAMP Setup
```
Download: https://sourceforge.net/projects/wampserver/

After install, run WAMP program and make sure all services are running. Icon in bottom right tray should be green. If not, check the ports. Right-click the WAMP icon and go to tools. If you have MySQL installed separately, there's probably a port conflict. Use port 3308 for WAMP's MySQL.

Left-click on the WAMP icon in the tray, click www directory. Place ajaxFile.php here.

Also place src/assets/files folder here so the mainPage carousel can access the images.

Left-click on the WAMP icon in the tray, click phpMyAdmin. Default login is root, no password.

After logging in, set up a new user account.
User name: dbAdmin
Host name: %
Password: Doodle6-Clothing
Authentication plugin: Native
Global privileges: Check all

After creating admin account, log out and back in to dbAdmin. Then revoke all privileges from root user.

Create a second user with only view privileges.
User name: basic
Host name: %
Password: 5dSbxzQ9n0SLiVWG
Authentication plugin: Native
Global privileges: Data -> SELECT

Create the database.
Database name: itadb

Import the tables.
While viewing itadb, click Import
The first words on the page should be "Importing into the database "itadb""
Under File to Import, click Choose File
Find the itadb.sql file in the src->assets folder of the it-alliance-project
Click go at the bottom of the page

Setup is complete. Type npm run serve in the VS Code console and try it out.
```