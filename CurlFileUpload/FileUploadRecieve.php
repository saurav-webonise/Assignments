<?php
	if(isset($_POST['randomStatus']))
	{
		$status=array('0' => 'Successful','1'=>'Error','2'=>'Bad Request','3'=>'Request Not Found' );
    	$key = array_rand($status);
    	$value = $status[$key];
		echo $value;
	}
	else
	{
	  switch($_FILES['file']['error'])
	  {	
	 	case 0:
  			echo $_FILES['file']['name']." is uploaded.";
			move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']['name']);
            break;
          
        case UPLOAD_ERR_INI_SIZE: 
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
            echo $message;
            break; 
          
        case UPLOAD_ERR_FORM_SIZE: 
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            echo $message;
            break; 

        case UPLOAD_ERR_PARTIAL: 
            $message = "The uploaded file was only partially uploaded"; 
            echo $message;
            break; 

        case UPLOAD_ERR_NO_FILE: 
            $message = "No file was uploaded"; 
            echo $message;
            break; 

        case UPLOAD_ERR_NO_TMP_DIR: 
            $message = "Missing a temporary folder"; 
            echo $message;
            break; 

        case UPLOAD_ERR_CANT_WRITE: 
            $message = "Failed to write file to disk"; 
            echo $message;
            break; 

        case UPLOAD_ERR_EXTENSION: 
            $message = "File upload stopped by extension"; 
            echo $message;
            break; 
        default: 
            $message = "Unknown upload error"; 
            echo $message;
            break; 
      }
   }
?>