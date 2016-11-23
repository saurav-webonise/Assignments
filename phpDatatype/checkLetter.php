<?php
    $input=$_GET['input'];
    $word=$_GET['word'];
    $count=0;
    $pos=null;
    $letter_array=str_split($word);
   
        for($i=0;$i<strlen($word);$i++)
        {
            if(strtolower($letter_array[$i])==$input)
            {
                    $pos=$i+1;
                    echo $pos;
            }   
        }
        if($pos==null)
        {
                echo "wrong letter";
        }     
?>