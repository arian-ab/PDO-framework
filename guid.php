<?php

include("db.php");

$dbms = "mysql";
$host = "localhost";
$dbname = "arian";
$user = "user";
$pass = "1234";

$db = connect($dbms,$host,$dbname,$user,$pass);

$sql = "INSERT INTO user(name,password) VALUES ('arian','1234')";

if(insert($db,$sql)){
     echo "insert success <br> <br>";
}

$sql = "UPDATE user SET name='milad' WHERE id='2'";

if(update($db,$sql)){ 
    echo "update success <br> <br>";
}

$sql = "DELETE FROM user WHERE id > 3";

if(delete($db,$sql)){ 
    echo "delete success <br> <br>";
}

$sql = "SELECT * FROM user";

if($rows = select($db,$sql)){ 
    echo "select success <br> <br>";
    echo "<pre>";
    print_r($rows);
    echo "<pre>";
}