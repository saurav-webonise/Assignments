<?php
include_once("simple_html_dom.php");
$links = array();
$images= array();
function webCrawler($url,$depth)
{
    if($depth>0)
    {
        $html = new simple_html_dom();
        $html->load_file($url);
        global $links,$images;
        foreach($html->find("img") as $key=>$image)
        {
            array_push($images, $image->src);
        }
        foreach($html->find("a") as $key=>$link) 
        {
            array_push($links, $link->href);
            array_push($links, $link->name);
            webCrawler($link->href,$depth-1);
        }

        $links = array_unique($links);

        header("Content-Type: application/json; charset=utf-8");
        header("Content-Disposition: attachment; filename=WebCrawler.json");

        
        return [$links,$images];

    }
}
$url = "http://127.0.0.1/WebCrawler/Homepage.html";

$s=webCrawler($url,2);
$output = fopen("php://output", "w");
fwrite($output, json_encode($s,JSON_PRETTY_PRINT));
?>