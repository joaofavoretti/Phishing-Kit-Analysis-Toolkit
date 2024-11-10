Step1: Configuring the credentials (config/data.php)
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


$seckey="admin";  // The login is protected by a key, you can edit, change key here.

Update your DB credentials in config/data.php

$servername = "localhost";  // Host
$username = "root";  // User
$password = ''; // Password
$dbname = "nwt"; // dbname


Step2: Execute installerdb.php to install/refresh DB
xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

If it returns "Database Refreshed/Installed Successfully" then it means the DB is set up.
