<?php 
// server-> username -> password-> database
define("server","127.0.0.1"); // local host = 127.0.0.1
define("username","root");
define("password","");
define("database","quiz");
$conn=mysqli_connect(server,username,password,database);
if(!$conn) {
 echo "<pre>";
echo "Connection failed: " . mysqli_connect_error();
}
?>