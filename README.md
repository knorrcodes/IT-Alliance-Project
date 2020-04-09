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

Left-click on the WAMP icon in the tray, click phpMyAdmin. Default login is root, no password.

After logging in, set up a new user account.
User name: dbAdmin
Host name: %
Password: Doodle6-Clothing
Authentication plugin: Native
Global privileges: Check all

After creating admin account, log out and back in to dbAdmin. Then revoke all privileges from root user.

Create the database.
Database name: itadb

Create the table.
Table name: project_table

Column structure:
#   Column Name         Type    Null    Extra
1   id                  int(11) No      AUTO_INCREMENT, Primary Key
2   name                text    No  
3   description         text    No
4   client              text    No
5   team_member_names   text    No

Setup is complete. Type npm run serve in the VS Code console and try it out.
```