<?php

class ServerUrl
{
    public $server;
    public $username;
    public $password;
    public $port;
    public $timeout;

    public function __construct($server, $username, $password,$port=null,$timeout=null)
    {
        //Instantiate the class
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
        $this->timeout = $timeout;
    }

    public function testServerConnection()
    {
        $timestamp = time();
        $link = new mysqli($this->server, $this->username, $this->password);
        if ($link->connect_errno) {
            $output = "";
            http_response_code(503);
            $output .= "Server URL: ";
            $output .= $this->server;
            $output .= "\n";
            $output .= "Server Status: Unable to connect - Unavailable";
            $output .= "\n";
            $output .= "Timestamp: ";
            $output .= date('F d, Y h:i:s A', $timestamp);
            $output .= "\n";

            return $output;
        }else {
            $output = "";
            http_response_code(200);
            $output .= "Server URL: ";
            $output .= $this->server;
            $output .= "\n";
            $output .= "Server Status: Connection Successful - Available";
            $output .= "\n";
            $output .= "Timestamp: ";
            $output .= date('F d, Y h:i:s A', $timestamp);
            $output .= "\n";
            $output .= "\n";

            return $output;
        }

    }

    public function ping(){
        
        $tb = microtime(true);
        $fp = fsockopen($this->server,$this->port,$errno,$errstr, $this->timeout);
        if(!$fp){
            $output = "";
            $output .= $errstr;

            return $output;
        }else{
            $output = "";
            
            $output .= "Pinged";


            $ta = microtime(true);
            $output .= " In ".(($ta - $tb) * 1000).'ms';



            return $output;

        }
    }
}