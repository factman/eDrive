<?php

/**
 * Description of contentManager
 *
 * @author Mohammed Odunayo Fatai
 */
class contentManager {
  
  /**
   * Constructor
   */
  function __construct($title){
    $this->page = new stdClass();
    $this->page->title = ucfirst($title);
    $this->page->icon = $this->getPageIcon($title);
    $this->page->color = $this->getPageColor($title);
    $this->page->files = [];
  }
  
  
  function buildContentData($data){
    foreach($data as $row){
      $file = new stdClass();
      $file->name = $row['name'];
      $file->id = $row['ID'];
      $obj = json_decode($row['object']);
      $file->fileSize = $this->getFileSize($obj->objectSize);
      $file->fileDate = date("M j, Y", $obj->objectDate);
      
      $this->page->files[] = $file;
    }
    return $this->page;
  }
  
  /**
   * 
   * @param integer $fileSize
   * @return string
   */
  function getFileSize($fileSize){
    $size = NULL;
    $ftp_data = $fileSize;
    if($ftp_data != "-1")
    {
      if($ftp_data < 1024)
      {
        $size = $ftp_data." Byte";
      }
      elseif($ftp_data >= 1024 && $ftp_data <= 1048576)
      {
        $size = substr((($ftp_data)/1024), 0, ((strripos((($ftp_data)/1024), "."))+3))." KB";
      }
      elseif($ftp_data >= 1048576 && $ftp_data <= 1073741824)
      {
        $size = substr(((($ftp_data)/1024)/1024), 0, ((strripos(((($ftp_data)/1024)/1024), "."))+3))." MB";
      }
      else
      {
        $size = substr((((($ftp_data)/1024)/1024)/1024), 0, ((strripos((((($ftp_data)/1024)/1024)/1024), "."))+3))." GB";
      }
      return $size;
    }
    else
    {
      return "----";
    }
  }
  
  /**
   * 
   * @param string $title
   * @return string
   */
  function getPageIcon($title){
    $icons = [
        "documents"=>"fa-file-text",
        "pictures"=>"fa-image",
        "audios"=>"fa-music",
        "videos"=>"fa-film",
        "archives"=>"fa-file-archive-o",
        "files"=>"fa-file"
        ];
    return $icons[$title];
  }
  
  /**
   * 
   * @param string $title
   * @return string
   */
  function getPageColor($title){
    $colors = [
        "documents"=>'{"bg":"w3-blue","text":"w3-text-blue"}',
        "pictures"=>'{"bg":"w3-pink","text":"w3-text-pink"}',
        "audios"=>'{"bg":"w3-green","text":"w3-text-green"}',
        "videos"=>'{"bg":"w3-purple","text":"w3-text-purple"}',
        "archives"=>'{"bg":"w3-indigo","text":"w3-text-indigo"}',
        "files"=>'{"bg":"w3-deep-orange","text":"w3-text-deep-orange"}'
        ];
    return json_decode($colors[$title]);
  }
}
