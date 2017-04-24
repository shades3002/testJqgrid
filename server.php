<?php

/**
 *	Prepare the data to be displayed on the grid, read the file 
 *	and get the data to return it in a json
 *	@author shades3002@gmail.com
 */

require "extractFileData.php";
$path = "file/New_York_City_Leading_Causes_of_Death.csv";
$data = array();
$data = extractFileData($path);
$respuesta = new stdClass();
$page = 0;
$rows = 0;
$sidx = 0;
extract($_POST);

if(!$sidx){
	$sidx = 1;
} 

$count = count($data);

//Based on the number of records you get the number of pages
if($count > 0 && $rows > 0) {
	$total_pages = ceil($count/$rows);
} else {
	$total_pages = 0;
}

if($page > $total_pages) {
	$page=$total_pages;
}
        
//Stores the registration number where the records for the page are to be retrieved
$start = $rows*$page - $rows;

//Server response data is added
$respuesta->page = $page;
$respuesta->total = $total_pages;
$respuesta->records = $count; 

$i=0;
foreach ($data as $key => $value) {
	$respuesta->rows[$i]['id']=$i;
	$respuesta->rows[$i]['cell']=$value;

	$i++;
}
//return json
echo json_encode($respuesta);

?>