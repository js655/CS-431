<?php
/**
 * Created by PhpStorm.
 * User: GrayOwl
 * Date: 11/5/17
 * Time: 4:43 PM
 */

$sqlServerName = "sql2.njit.edu";
$sqlUserName = "";
$sqlPass = "";
$dbName = "";

$username = $_POST['username'];
$password = $_POST['password'];


$connection = mysqli_connect($sqlServerName, $sqlUserName, $sqlPass, $dbName);

$sql = "SELECT * FROM users WHERE username='$username'";
$results = mysqli_query($connection, $sql);
$resultCheck = mysqli_num_rows($results);
if ($resultCheck = 1){
    if ($row = mysqli_fetch_row($results)){
        if ($password == row['userpass']){

        }
    }
}
