<?php


// connect to my database for Sql databases
function connect($dbms,$host,$dbname,$user,$pass){
    $config = "$dbms:host=$host;dbname=$dbname;charset=utf8mb4";
    try{
        $db = new PDO($config,$user,$pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connecting was successfull";
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage()." in Line: ".$e->getLine();
        exit();
    }
    //return $db object for future qureies
    return $db;
}
// No return query such as Insert , ...
function insert($db,$sql){
    try{
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo "\nInsertError : ".$e->getMessage()." in Line: ".$e->getLine();
        return false;
    }
    //id of new new row
    //echo $db->lastInsertId();
}
function update($db,$sql){
    try{
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo "\nUpdateError : ".$e->getMessage()." in Line: ".$e->getLine();
        return false;
    }
    //number of row which updated
    //echo $db->rowCount()
}
function delete($db,$sql){
    try{
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        echo "\ndeleteError : ".$e->getMessage()." in Line: ".$e->getLine();
        return false;
    }
    
}
// return query such ad SELECT
function select($db,$sql){
    try{
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        //$row = $stmt->fetch(PDO::FETCH_OBJ);
        return $rows;
    }catch(PDOException $e){
        echo "\nselectError : ".$e->getMessage()." in Line: ".$e->getLine();
        return false;
    }
    
}


// for transaction
function start_trans($db){
    $db->beginTransaction();
}
function end_trans($db){
    $db->commit();
}
//----------------

?>