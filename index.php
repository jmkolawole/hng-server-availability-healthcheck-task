
<?php

//This function helps to autoload classes
spl_autoload_register(function ($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/hng-server-availability-healthcheck-task/'.$class.'.php';
});

//This helps to return json from the script
header('Content-type: application/json');

//Creating an instance of the class
$test = new ServerUrl('127.0.0.1','root','',3306,10); // The last two arguments are optional unless you want to ping the server
$result = $test->testServerConnection(); //Test the connection
echo $result;
$result2 = $test->ping(); //Ping the Server
echo $result2;


