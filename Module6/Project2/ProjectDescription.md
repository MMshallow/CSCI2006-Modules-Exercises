# Final Project 
## Registration and Login System <hr>
<p><b>Important!!</b></p><p><font color='#ff006e'>Please use <code>test</code> for you <b>database name</b> as I am going to use the same database name for grading purpose!!</font>

In this project, you will design and implement a and<code><font color='#e76f51'>Registration</font></code> and <code><font color='#e76f51'>Login</font></code>system. I have created the project structure with the following files for you.

## Project Structure
<code><font color='#dc2f02'>/Project2
│── /config
│   ├── database.php
│── /public
│   ├── login.php  (Login Page)
│   ├── register.php  (Registration Page)
│   ├── home.php  (Protected Home Page)
│   ├── logout.php  (Logout Page)
│── /includes
│   ├── header.php
│── /handlers
│   ├── register_handler.php
│   ├── login_handler.php
│── db.sql  (Database Schema)</font></code>

<p>Here are a short explanation of this structure:</p>

<ul>
<li>The <code>database.php</code> file is part of the <code>/config</code> directory. It will contain the database connection configurations. Put your database connection configuration and the connection string using PDO in this file. You must use <code><font color='#ff595e'> Prepared Statement</font></code> for all database operations in this project.</li>
<li>The <code>/public</code> directory contains:
<ul><li><code>login.php</code></li> 
  <li><code>home.php</code></li>
  <li><code>register.php</code> and</li>
  <li><code>logout.php</code>files.</li></ul></li>
  <p>Implement your logics for each task in the correspounding file.</p>
  <ul>
  <li><code>Login Page</code> -- The<code>login.php</code> file will contain your code that allow a registered user to login. If the login process is successful, the user will be redirected to the homepage where their profile lives.</li>
  <li><code>Registration Page</code> -- The<code>register.php</code> file will contain your code that allow a user to register. The user must be allowed to register if the form is validated as specified in your <code><font color='#ff595e'> Project 1</font></code> (see the project for details). The registration process, if successful, must record the user information in the database and redirect the user to the <code><font color='#ff595e'> Login</font></code> page.</li>
  <li><code>Home Page</code> -- The<code>home.php</code> file will contain your code that displays the profile information of a logged in user. This page is restricted and can only be accessed by a logged in user. I will make open the contents of this page, however, it must be well-styled and contain a decent amount of logged-in user information (Full Name, username, email, profile picture etc.)</li> 
  <li><code>Logout Page</code> -- The<code>logout.php</code> file will contain your code that allow a logged-in user to logout. The logout page will be accessed through a button in <code>Home page</code> and must be well-styled. The home page is the only place the logout page exists(this is not the case for real-world projects). It is highly recommended that you have a mechanism to allow the user to login back after they logout.</li></ul></ul>

<ul>
<li><code>The /includes</code> directory contains the <code>header.php</code> file used to extract the elements common across the various pages [<code>register.php, home.php, login.php, logout.php, etc.</code>] For instance, you may have CSS files, navigation menus, and other header files that you want to make common element across all or part of your page. This can go into the <code>header.php</code> file and included in other files as fillows:
<p><code>&lt;?php include '../includes/header.php'; ?&gt;</code></p></li>
<li><code>/handlers</code> directory contains the <code>register_handler</code> and <code>login_handler</code> files. The two files are used to contain the server-side logic that handles specific actions triggered by the users. For Example, the <code>register_handler.php</code> handles accepts POST data from the registration form, hashes the password to secure it, inserts the user data into the database, and redirects the user based on success or failure.</li></ul>
You must implement the system according to the prescribed system structure. A project that deviates from the project specifications will not receive points even if it is functional. Note that this is your <code><font color='#ff595e'> Final Project</font></code> for this class.
<p>Submit a directory containing all the directories and files in project 2. name it <code>project2</code>.</p> 
  