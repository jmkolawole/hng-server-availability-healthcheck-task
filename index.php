
<?php
/*
$config = [
  "server" => "127.0.0.1",
  'username' => "root",
  "password" => ""
];

header('Content-type: application/json');
$link = new mysqli($config['server'],$config['username'],$config['password']);
$timestamp = time();

if($link->connect_errno){
    http_response_code(503);
    echo ("Server URL: ");
    echo $config['server'];
    echo "<br>";
    echo "Unable to connect";
}else{
    http_response_code(200);
    echo ("Server URL: ");
    echo $config['server'];
    echo "/n";
    echo "Connected";
}
*/



//require_once $_SERVER['DOCUMENT_ROOT'].'/projects/task2/init.php';
spl_autoload_register(function ($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/hng-server-availability-healthcheck-task/'.$class.'.php';
});


header('Content-type: application/json');

$test = new ServerUrl();
$result = $test->testConnection('127.0.0.1:3306','root','');
echo $result;