<?php

# Includes the autoloader for libraries installed with composer
require __DIR__ . './vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Storage\StorageClient;

/**
 * Description of bucketManager
 *
 * @author Mohammed Odunayo
 */
class bucketManager extends StorageClient {
  
  /**
   * Constructor
   */
  function __construct() {
    $this->projectId = 'edrive-206512';
    parent::__construct(['projectId' => $this->projectId]);
  }
  
  /**
   * Get objects in the specified bucket name with the matching prefix.
   * 
   * @param string $bucketname
   * @param string $mail
   * @return object
   */
  function getBucketObjects($bucketname, $mail){
    $obj = [];
    $bucket = $this->bucket($bucketname);
    $opt = ["prefix" => $mail];
    foreach ($bucket->objects($opt) as $object){
      $obj[$object->name()] = $object;
    }
    return (object) $obj;
  }
  
  /**
  * Download an object from Cloud Storage and save it as a local file.
  *
  * @param string $bucketName the name of your Google Cloud bucket.
  * @param string $objectName the name of your Google Cloud object.
  * @param string $destination the local destination to save the encrypted object.
  *
  * @return void
  */
 function download_object($bucketName, $objectName, $destination)
 {
     $bucket = $this->bucket($bucketName);
     $object = $bucket->object($objectName);
     $object->downloadToFile($destination);
 }
 
 /**
  * Upload a file.
  *
  * @param string $bucketName the name of your Google Cloud bucket.
  * @param string $objectName the name of the object.
  * @param string $source the path to the file to upload.
  *
  * @return Psr\Http\Message\StreamInterface
  */
 function upload_object($bucketName, $objectName, $source)
 {
     $file = fopen($source, 'r');
     $bucket = $this->bucket($bucketName);
     $object = $bucket->upload($file, [
         'name' => $objectName
     ]);
 }
 
 /**
  * Delete an object.
  *
  * @param string $bucketName the name of your Cloud Storage bucket.
  * @param string $objectName the name of your Cloud Storage object.
  * @param array $options
  *
  * @return void
  */
 function delete_object($bucketName, $objectName)
 {
     $bucket = $this->bucket($bucketName);
     $object = $bucket->object($objectName);
     $object->delete();
 }

/**
 * Move an object to a new name and/or bucket.
 *
 * @param string $bucketName the name of your Cloud Storage bucket.
 * @param string $objectName the name of your Cloud Storage object.
 * @param string $newBucketName the destination bucket name.
 * @param string $newObjectName the destination object name.
 *
 * @return void
 */
function rename_object($bucketName, $objectName, $newBucketName, $newObjectName)
{
    $bucket = $this->bucket($bucketName);
    $object = $bucket->object($objectName);
    $object->copy($newBucketName, ['name' => $newObjectName]);
    $object->delete();
}

/**
 * Copy an object to a new name and/or bucket.
 *
 * @param string $bucketName the name of your Cloud Storage bucket.
 * @param string $objectName the name of your Cloud Storage object.
 * @param string $newBucketName the destination bucket name.
 * @param string $newObjectName the destination object name.
 * @return void
 */
function copy_object($bucketName, $objectName, $newBucketName, $newObjectName)
{
    $bucket = $this->bucket($bucketName);
    $object = $bucket->object($objectName);
    $object->copy($newBucketName, ['name' => $newObjectName]);
}

/**
 * Move an object to a new name and/or bucket.
 *
 * @param string $bucketName the name of your Cloud Storage bucket.
 * @param string $objectName the name of your Cloud Storage object.
 * @param string $newBucketName the destination bucket name.
 * @param string $newObjectName the destination object name.
 *
 * @return void
 */
function move_object($bucketName, $objectName, $newBucketName, $newObjectName)
{
    $bucket = $this->bucket($bucketName);
    $object = $bucket->object($objectName);
    $object->copy($newBucketName, ['name' => $newObjectName]);
    $object->delete();
}

}