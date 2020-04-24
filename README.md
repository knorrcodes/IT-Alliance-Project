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

1. Download: https://sourceforge.net/projects/wampserver/

2. After install, run WAMP program and make sure all services are running.
    1. Icon in bottom right tray should be green. 
    2. If not, check the ports. 
    3. Right-click the WAMP icon and go to tools. 
    4. If you have MySQL installed separately, there's probably a port conflict. 
    5. Use port 3308 for WAMP's MySQL.

3. Left-click on the WAMP icon in the tray, click www directory. Place ajaxFile.php here.

4. Also place src/assets/files folder here so the mainPage carousel can access the images.

5. Left-click on the WAMP icon in the tray, click phpMyAdmin. Default login is root, no password.

6. After logging in, set up a new user account.
    ```
    User name: dbAdmin
    Host name: %
    Password: Doodle6-Clothing
    Authentication plugin: Native
    Global privileges: Check all
    ```

7. After creating admin account, log out and back in to dbAdmin. Then revoke all privileges from root user.

8. Create a second user with only view privileges.
    ```
    User name: basic
    Host name: %
    Password: 5dSbxzQ9n0SLiVWG
    Authentication plugin: Native
    Global privileges: Data -> SELECT
    ```

9. Create the database.
    ```
    Database name: itadb
    ```

10. Import the tables:
    1. While viewing itadb, click Import
    2. The first words on the page should be "Importing into the database "itadb""
    3. Under File to Import, click Choose File
    4. Find the itadb.sql file in the src->assets folder of the it-alliance-project
    5. Click go at the bottom of the page

```
Setup is complete. Type npm run serve in the VS Code console and try it out.
```