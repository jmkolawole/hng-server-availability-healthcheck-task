<?php
class ServerUrl{

    public function testConnection($server,$username,$password){
        $timestamp = time();
        $link = new mysqli($server,$username,$password);
        if($link->connect_errno){
            $output = "";
            http_response_code(503);
            $output .= "Server URL: ";
            $output .= $server;
            $output .= "\n";
            $output .= "Server Status: Unable to connect - Unavailable";
            $output .= "\n";
            $output .= "Timestamp: ";
            $output .= date('F d, Y h:i:s A',$timestamp);

            return $output;
        }else{
            $output = "";
            http_response_code(200);
            $output .= "Server URL: ";
            $output .= $server;
            $output .= "\n";
            $output .= "Server Status: Connection Successful - Available";
            $output .= "\n";
            $output .= "Timestamp: ";
            $output .= date('F d, Y h:i:s A',$timestamp);

            return $output;
        }
    }
}