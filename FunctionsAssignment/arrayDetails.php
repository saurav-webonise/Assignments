<?php          
include('arrayContents.php');
  function arrayFlatten($array) 
  { 
    if (!is_array($array)) 
    { 
      return FALSE; 
    } 
    $result = array(); 
    foreach ($array as $key => $value) 
    { 
       if (is_array($value)) 
       { 
           $arrayList=arrayFlatten($value);
           foreach ($arrayList as $listItem) 
           {
               $result[] = $listItem; 
           }
       } 
        else 
        { 
            $result[$key] = $value; 
        }   
     } 
  return $result; 
} 
 function arrayToCsv($flattenArray)
 {
    $output = fopen("php://output",'w') or die("Can't open php://output");
    header('Content-Type: application/vnd.ms-excel'); 
    header('Content-Disposition: attachment;filename="demo.csv"');
    global $organisationDetails;
    foreach ($organisationDetails as $data) 
    {
        $result = [];
        array_walk_recursive($data, function($item) use (&$result) 
        {
          if(empty($item))
          {
            $result[]='-';
          }
          else
          {
            $result[] = $item;
          }      
        });
        
        fputcsv($output, $result);
    }
    fclose($output);
  } 

  
  $flattenArray=arrayFlatten($organisationDetails);
  arrayToCsv($flattenArray);

?>

