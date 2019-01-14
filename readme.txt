Steps to launch the project

1.Just run xampp-win32-5.6.21-0-VC11-installer.exe
2. Copy the 'project' folder in 'xampp/htdocs' folder, in the xampp installation directory.
3. Run 'apache' server and 'mysql' server from 'xampp-controller.exe'
4. Open 'http://localhost/phpmyadmin/' in a browser and click on 'Import' tab at the top of page.
5. Click browse and drill down to 'project/db/kart_inventory.sql' and select the file, leave all other fiels as default and click 'Go'.
6. Confirm that 'kart_inventory' is now showing in the Schema list on the left.
7. Now open the 'kart_inventory' schema, go to user_table, create a new user by adding a new row or just edit existing user's username and password. Encrypt the password with MD5 function.
8. Now open another browser window and enter 'localhost:80/project' in the URL field, and login with the new username and password.