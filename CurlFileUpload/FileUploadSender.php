  <?php
  	$message='';
    if(isset($_POST['randomStatus']))
    {
      $sendRequest = curl_init('http://localhost/CurlFileUpload/FileUploadRecieve.php');
      curl_setopt($sendRequest, CURLOPT_POST, true);
      curl_setopt($sendRequest,CURLOPT_POSTFIELDS,"randomStatus=".$_POST['randomStatus']);
      curl_setopt($sendRequest, CURLOPT_RETURNTRANSFER, true);
      echo curl_exec($sendRequest);
      curl_close($sendRequest);
    }
    else
    {
      switch($_FILES['file']['error'])
      {
          case 0:
                 $fileName=$_FILES['file']['name'];
                 $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
                 $extensionAllowed=['jpg','jpeg','gif','pdf','xls','csv','txt','php'];
                 if(!in_array($fileType, $extensionAllowed))
                 {
                   echo "File Type Not Supported";
                 }
                 else
                 {
                    $sendRequest = curl_init('http://localhost/CurlFileUpload/FileUploadRecieve.php');
                    curl_setopt($sendRequest, CURLOPT_POST, true);
                    curl_setopt($sendRequest,CURLOPT_POSTFIELDS,
                    array(
                        'file' =>
                        '@' .$_FILES["file"]['tmp_name']. ';fileName=' .$_FILES["file"]['name']
                    ));
                    curl_setopt($sendRequest, CURLOPT_RETURNTRANSFER, true);
                    echo curl_exec($sendRequest);
                    curl_close($sendRequest);
                 }
                 break;
          
          case UPLOAD_ERR_INI_SIZE: 
                 $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
                 break; 
          
          case UPLOAD_ERR_FORM_SIZE: 
                 $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                 break; 
          case UPLOAD_ERR_PARTIAL: 
                 $message = "The uploaded file was only partially uploaded"; 
                 break; 
          case UPLOAD_ERR_NO_FILE: 
                 $message = "No file was uploaded"; 
                 break; 
          case UPLOAD_ERR_NO_TMP_DIR: 
                 $message = "Missing a temporary folder"; 
                 break; 
          case UPLOAD_ERR_CANT_WRITE: 
                 $message = "Failed to write file to disk"; 
                 break; 
          case UPLOAD_ERR_EXTENSION: 
                 $message = "File upload stopped by extension"; 
                 break; 
           default: 
                 $message = "Unknown upload error"; 
                 break; 
      } 
          echo $message; 

    }
  	   ?>
