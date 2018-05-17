<?php
$host = "localhost";
$user = "root";
$password="";
$database = "race";

session_start();
$con = new mysqli($host, $user, $password, $database);
