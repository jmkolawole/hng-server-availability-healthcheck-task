
<?php


//This function helps to autoload classes
spl_autoload_register(function ($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/hng-server-availability-healthcheck-task/'.$class.'.php';
});

//This helps to return json from the script
header('Content-type: application/json');

//Creating an instance of the class
$test = new ServerUrl();
$result = $test->testConnection('127.0.0.1:3306','root','');
echo $result;