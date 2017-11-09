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
            $json =array(
                'login' => 'Yes',
                'type' => $row['usertype']
            );
            echo $json;
        }else {
            $json =  array(
                'login' => 'No',
                'type' => ''
            );
            echo $json;
        }
    }
}
function lookupGrade($type,$class,$conn,$userID){
    if ($type == 'Student' || $type == 'Faculty'){
        if($type == Faculty){
            $sql = "SELECT * FROM grades_lookup";
            $json = array([]);
            $i = 0;
            $result = mysqli_fetch_array(conn, $sql);
            foreach ($result as &$value){
                $json[$i] = $value;
                $i += 1;
            }
            echo $json;
        }
    } else if (type == 'Student'){
        $sql = "SELECT * FROM grades_lookup WHERE studentid = $userID";
        $result = mysqli_query_row($conn, $sql);
        $json = array(mysqli_fetch_row($result));
        echo $json;
    }
}
function addGrades($type, $username,$grade){
    if ($type == 'Faculty'){
        $update = "UPDATE grades_lookup SET grade='$grade' WHERE studentid=$username";
        echo "ok";
    }
}
function editGrades($type, $username,$grade){
    if ($type == 'Exercutive'){
        $update = "UPDATE grades_lookup SET grade='$grade' WHERE studentid=$username";
        echo "ok";
    }
}
function courseLookup($conn,$userID){
    $sql = "SELECT * FROM course_lookup WHERE studentid = $userID";
    $result = mysqli_query_row($conn, $sql);
    $json = array(mysqli_fetch_row($result));
    echo $json;
}
