<?php

if(isset($_GET["logout"])){
  setcookie("sid", "", 1);
  unset($_COOKIE["sid"]);
}

if(!isset($_COOKIE["sid"])) {
  header("Location: index.php");
}
else {
  setcookie("sid", $_COOKIE["sid"], strtotime('+24 hours'));
}

require_once './libs/sql.php';

$eDriveDb = new eDriveSQL();
$user = $eDriveDb->getUser();

require_once './libs/fileHandler.php';
$fh = new fileHandler();

if(isset($_GET["upload"])){
  $fh->initUpload($_FILES["file"], $user->mail);
  $fh->uploadToBucket();
  $data = $fh->getTableObject();
  $eDriveDb->saveFile($data);
  header("Location: ?url={$fh->file->dir}");
}

if(isset($_GET["delete"])){
  list($dir, $id) = explode("/", $_GET["delete"]);
  $object = $eDriveDb->getObject($id, $dir);
  $fh->deleteFromBucket($object->bucketName, $dir);
  $eDriveDb->deleteFile($object->id, $dir);
  header("Location: ?url=$dir");
}

if(isset($_GET["download"])){
  list($dir, $id) = explode("/", $_GET["download"]);
  $object = $eDriveDb->getObject($id, $dir);
  $file = $fh->downloadFromBucket($dir, $object->bucketName, $object->name);
  
  header("Content-Disposition: attachment; filename=" . urlencode($file->name));    
  header("Content-Type: application/force-download");
  header("Content-Type: application/octet-stream");
  header("Content-Type: application/download");
  header("Content-Description: File Transfer");             
  header("Content-Length: " . filesize($file->tmpName));
  flush(); // this doesn't really matter.

  $fp = fopen($file->tmpName, "r"); 
   while (!feof($fp))
   {
       echo fread($fp, 65536); 
       flush(); // this is essential for large downloads
  }  
  fclose($fp);
  
  header("Location: ?url=$dir");
}

include './backend.php';

if(isset($_GET["url"])){
  require_once './libs/contentManager.php';
  
  $dir = $_GET["url"];
  $contMang = new contentManager($dir);
  $data = $eDriveDb->getData($dir, $user->mail);
  $content = $contMang->buildContentData($data);
  
  include './libs/content.php';
}
else{
  $content = $eDriveDb->getStats($user->mail);
  include './libs/cards.php';
}

include './libs/footer.php';