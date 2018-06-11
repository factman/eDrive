<?php

require_once './libs/bucketManager.php';

/**
 * Description of uploader
 *
 * @author Mohammed Odunayo Fatai
 */
class fileHandler extends bucketManager{
  
  /**
   * Constructor
   */
  function __construct() {
    $this->file = new stdClass();
    
    /**
     * Parent Constructor
     */
    parent::__construct();
  }
  
  function initUpload($file, $mail){
    $this->file->displayName = $file['name'];
    $this->file->bucketName = $mail.$file['name'];
    $this->file->object = $file["tmp_name"];
    $this->file->type = $file["type"];
    $this->file->size = $file["size"];
    $this->file->dir = $this->getFileDir($file['name']);
    $this->file->bucket = "edrive-".$this->file->dir;
    $this->file->user = $mail;
  }


  /**
   * 
   * @param string $filename
   * @return string
   */
  private function getFileDir($filename){
    $mime_types = [
        // documents
        'txt' => 'documents',
        'htm' => 'documents',
        'html' => 'documents',
        'php' => 'documents',
        'css' => 'documents',
        'js' => 'documents',
        'json' => 'documents',
        'xml' => 'documents',
        'doc' => 'documents',
        'docx' => 'documents',
        'rtf' => 'documents',
        'xls' => 'documents',
        'ppt' => 'documents',
        'pdf' => 'documents',

        // pictures
        'png' => 'pictures',
        'jpe' => 'pictures',
        'jpeg' => 'pictures',
        'jpg' => 'pictures',
        'gif' => 'pictures',
        'bmp' => 'pictures',
        'ico' => 'pictures',
        'tiff' => 'pictures',
        'tif' => 'pictures',
        'svg' => 'pictures',
        'svgz' => 'pictures',
        'psd' => 'pictures',

        // archives
        'zip' => 'archives',
        'rar' => 'archives',
        'exe' => 'archives',
        'msi' => 'archives',
        'cab' => 'archives',
        'tar' => 'archives',

        // audios
        'mp3' => 'audios',
        'wav' => 'audios',
        'aif' => 'audios',
        'm4a' => 'audios',
        
        //videos
        'qt' => 'videos',
        'mov' => 'videos',
        'swf' => 'videos',
        'flv' => 'videos',
        'mpeg' => 'videos',
        'mpg' => 'videos',
        'mpe' => 'videos',
        'avi' => 'videos',
        'mp4' => 'videos',
        'm4v' => 'videos',

        // files
        'ai' => 'files',
        'eps' => 'files',
        'ps' => 'files',
        'odt' => 'files',
        'ods' => 'files',
    ];
    $arr = explode('.',$filename);
    $ex = array_pop($arr);
    $ext = strtolower($ex);
    if (array_key_exists($ext, $mime_types)) {
        return $mime_types[$ext];
    }
    else {
        return 'files';
    }
  }
  
  /**
   * 
   * @return \stdClass
   */
  function getTableObject(){
    $obj = new stdClass();
    $obj->name = $this->file->displayName;
    $obj->user = $this->file->user;
    $obj->table = $this->file->dir;
    $obj->object = json_encode((object)[
        "objectName"=>$this->file->bucketName,
        "objectSize"=>$this->file->size,
        "objectDate"=>time(),
        "objectType"=>array_pop(explode('.',$this->file->displayName))
    ]);
    return $obj;
  }
  
  /**
   * Upload to Cloude Bucket
   */
  function uploadToBucket(){
    $this->upload_object($this->file->bucket, $this->file->bucketName, $this->file->object);
  }
  
  /**
   * 
   * @param string $objectName
   * @param string $bucketName
   */
  function deleteFromBucket($objectName, $bucketName){
    $bucketName = "edrive-".$bucketName;
    $this->delete_object($bucketName, $objectName);
  }
  
  function downloadFromBucket($bucketName, $objectName, $fileName){
    $bucketName = "edrive-".$bucketName;
    $destination = "./libs/tmp/$fileName";
    $tmpDestination = "./libs/tmp/download.tmp";
    $this->download_object($bucketName, $objectName, $tmpDestination);
    return (object)["tmpName"=>$tmpDestination, "name"=>$destination];
  }
}
