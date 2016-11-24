<?php          
  function array_flatten($array) 
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
           $arrayList=array_flatten($value);
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
    foreach ($organisationDetails as $file) 
    {
        $result = [];
        array_walk_recursive($file, function($item) use (&$result) 
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

  $flattenArray=array_flatten($organisationDetails);
  arrayToCsv($flattenArray);

  $organisationDetails = array(
      10 => array(
        'name' => 'weboniseLab',
        'jobRole' => array(
          '11' => array(
            'name' => 'developer',
            'created' => '2016-02-01',
          ),
          '12' => array(
            'name' => 'sr. developer',
            'created' => '2016-02-10',
          ),
        ),
        'cfa' => array(
          '11' => array(
            'name' => 'php',
            'created' => '2016-03-10',
          ),
          '12' => array(
            'name' => 'ruby',
            'created' => '2016-04-15',
          ),
        )
      ),
      11 => array(
        'name' => 'Hartley Lab',
        'jobRole' => array(
          '11' => array(
            'name' => 'front end',
            'created' => '2016-03-01',
          ),
          '12' => array(
            'name' => 'design',
            'created' => '2016-03-10',
          ),
        ),
        'cfa' => array(
          '11' => array(
            'name' => 'UI',
            'created' => '2016-02-01',
          ),
          '12' => array(
            'name' => 'UX',
            'created' => '2016-01-01',
          ),
        )
      ),
      15 => array(
        'name' => 'Hartley Lab',
        'jobRole' => array(
          '11' => array(
            'name' => 'front end',
            'created' => '2016-03-01',
          ),
          '12' => array(
            'name' => 'design',
            'created' => '2016-03-10',
          ),
        )
      )
    );
?>

