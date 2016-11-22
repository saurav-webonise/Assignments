<?php
include_once("simple_html_dom.php");
function webCrawler($url,$depth)
{
    $singleLink=array();
    $singleImage=array();
    $singleTitle=array();
    if($depth>0)
    {

        $html = new simple_html_dom();
        $html->load_file($url);
        
        foreach ($html->find("title") as $title) 
        {
            $singleTitle[]=array('Page Title'=>$title->plaintext);
        }
        foreach($html->find("img") as $image)
        {
            $singleImage[]=array('Image Source'=>$image->src);
        }
        foreach($html->find("a") as $link) 
        {
            $singleLink[]=array('Page Title'=>$singleTitle,'Image Source'=>$singleImage,'Link Location'=> $link->href, 'internal_links'=> webCrawler($link->href, $depth-1));
        }

        header("Content-Type: application/json; charset=utf-8");
        header("Content-Disposition: attachment; filename=WebCrawler.json");

        
        return $singleLink;

    }
}
$url = "http://127.0.0.1/WebCrawler/Homepage.html";

$answer=webCrawler($url,2);
$output = fopen("php://output", "w");
fwrite($output, json_encode($answer,JSON_PRETTY_PRINT));
?>