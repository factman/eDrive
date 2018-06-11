<?php

/**
 * Description of controller
 *
 * @author Mohammed Odunayo Fatai
 */
class eDriveSQL {
  
  /**
   * 
   * @return boolean|eDriveSQL Object
   */
  function __construct() {
    $this->config = (object) [
        "host"=>"localhost",
        "user"=>"root",
        "pass"=>"p1si656jx3Tr",
        "dbname"=>"eDrive_db"
    ];
    $this->sql = new mysqli($this->config->host, $this->config->user, $this->config->pass);
    if(mysqli_connect_error()){
      return FALSE;
    }
    else{
      $this->sql->select_db($this->config->dbname);
      
      $this->sql->query("CREATE DATABASE IF NOT EXISTS {$this->config->dbname}");
      
      $this->sql->query("CREATE TABLE IF NOT EXISTS users ("
              . "ID int NOT NULL AUTO_INCREMENT COMMENT 'User ID',"
              . "PRIMARY KEY (ID),"
              . "name VARCHAR(255) NOT NULL COMMENT 'User Name',"
              . "mail VARCHAR(255) NOT NULL COMMENT 'User Email',"
              . "pass VARCHAR(255) NOT NULL COMMENT 'User Password')");
      
      $this->sql->query("CREATE TABLE IF NOT EXISTS documents ("
              . "ID int NOT NULL AUTO_INCREMENT COMMENT 'Document ID',"
              . "PRIMARY KEY (ID),"
              . "name VARCHAR(255) NOT NULL COMMENT 'Document Name',"
              . "user VARCHAR(255) NOT NULL COMMENT 'Document Owner',"
              . "object TEXT NOT NULL COMMENT 'File Object')");
      
      $this->sql->query("CREATE TABLE IF NOT EXISTS pictures ("
              . "ID int NOT NULL AUTO_INCREMENT COMMENT 'Document ID',"
              . "PRIMARY KEY (ID),"
              . "name VARCHAR(255) NOT NULL COMMENT 'Document Name',"
              . "user VARCHAR(255) NOT NULL COMMENT 'Document Owner',"
              . "object TEXT NOT NULL COMMENT 'File Object')");
      
      $this->sql->query("CREATE TABLE IF NOT EXISTS audios ("
              . "ID int NOT NULL AUTO_INCREMENT COMMENT 'Document ID',"
              . "PRIMARY KEY (ID),"
              . "name VARCHAR(255) NOT NULL COMMENT 'Document Name',"
              . "user VARCHAR(255) NOT NULL COMMENT 'Document Owner',"
              . "object TEXT NOT NULL COMMENT 'File Object')");
      
      $this->sql->query("CREATE TABLE IF NOT EXISTS videos ("
              . "ID int NOT NULL AUTO_INCREMENT COMMENT 'Document ID',"
              . "PRIMARY KEY (ID),"
              . "name VARCHAR(255) NOT NULL COMMENT 'Document Name',"
              . "user VARCHAR(255) NOT NULL COMMENT 'Document Owner',"
              . "object TEXT NOT NULL COMMENT 'File Object')");
      
      $this->sql->query("CREATE TABLE IF NOT EXISTS archives ("
              . "ID int NOT NULL AUTO_INCREMENT COMMENT 'Document ID',"
              . "PRIMARY KEY (ID),"
              . "name VARCHAR(255) NOT NULL COMMENT 'Document Name',"
              . "user VARCHAR(255) NOT NULL COMMENT 'Document Owner',"
              . "object TEXT NOT NULL COMMENT 'File Object')");
      
      $this->sql->query("CREATE TABLE IF NOT EXISTS files ("
              . "ID int NOT NULL AUTO_INCREMENT COMMENT 'Document ID',"
              . "PRIMARY KEY (ID),"
              . "name VARCHAR(255) NOT NULL COMMENT 'Document Name',"
              . "user VARCHAR(255) NOT NULL COMMENT 'Document Owner',"
              . "object TEXT NOT NULL COMMENT 'File Object')");
      
      return $this;
    }
  }
  
  /**
   * 
   * @param string $mail
   * @return boolean
   */
  function checkEmail($mail){
    $dbData = $this->sql->query("SELECT COUNT(ID) AS count FROM users WHERE mail='$mail'")->fetch_assoc();
    
    if($dbData["count"] == 0){
      return TRUE;
    }
    return FALSE;
  }
  
  /**
   * 
   * @param string $name
   * @param string $mail
   * @param string $pass
   */
  function saveUser($name, $mail, $pass){
    $this->sql->query("INSERT INTO users (name, mail, pass) VALUES('$name','$mail','$pass')");
  }
  
  /**
   * 
   * @param string $mail
   * @param string $pass
   * @return boolean
   */
  function AuthPassword($mail, $pass){
    $dbData = $this->sql->query("SELECT pass FROM users WHERE mail='$mail'")->fetch_assoc();
    $hash = $dbData["pass"];
    
    if(password_verify($pass, $hash)){
      return TRUE;
    }
    
    return FALSE;
  }
  
  /**
   * 
   * @return object
   */
  function getUser(){
    $dbData = $this->sql->query("SELECT mail, name FROM users WHERE mail='{$_COOKIE['sid']}'")->fetch_assoc();
    return (object) $dbData;
  }
  
  /**
   * 
   * @param string $mail
   * @param array $arr
   * @return \stdClass
   */
  function getStats(string $mail, array $arr = null){
    if(is_null($arr)){
      $arr = ["documents","pictures","audios","videos","archives","files"];
    }
    
    $stats = new stdClass();
    
    foreach($arr as $a){
      $dbData = $this->sql->query("SELECT COUNT(ID) AS nums FROM $a WHERE user='$mail'")->fetch_assoc();
      $stats->{$a} = $dbData["nums"];
    }
    return $stats;
  }
  
  /**
   * 
   * @param string $dir
   * @param string $mail
   * @return array
   */
  function getData($dir, $mail){
    $dbData = $this->sql->query("SELECT * FROM $dir WHERE user='$mail'");
    $rows = [];
    
    while($row = $dbData->fetch_assoc()){
      $rows[] = $row;
    }
    return $rows;
  }
  
  /**
   * 
   * @param string $id
   * @param string $dir
   * @return object
   */
  function getObject($id, $dir){
    $dbData = $this->sql->query("SELECT ID, name, object FROM $dir WHERE ID=$id")->fetch_assoc();
    $obj = json_decode($dbData["object"]);
    return (object)["id"=>$dbData["ID"], "bucketName"=>$obj->objectName, "name"=>$dbData["name"]];
  }
  
  /**
   * 
   * @param object $file
   */
  function saveFile($file){
    $this->sql->query("INSERT INTO $file->table (name, user, object) VALUES('$file->name','$file->user','$file->object')");
  }
  
  /**
   * 
   * @param string $id
   * @param string $dir
   */
  function deleteFile($id, $dir){
    $this->sql->query("DELETE FROM $dir WHERE ID=$id");
  }
  
}
