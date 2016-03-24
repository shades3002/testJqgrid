<?php

/**
	Examen
*/

$file = fopen("file/New_York_City_Leading_Causes_of_Death.csv", "r") or exit("Error en el archivo!");

$aux = 1;
$id = 0;
$data = null;

while(!feof($file)) {

	$linea = fgets($file). "<br />";
	if($aux!=1){
		$array = explode(",", $linea);

		$data[] = array('id' =>$id,
						'Year' => $array[0],
						'Ethnicity' => $array[1],
						'Sex' => $array[2], 
						'Cause_of_Death'=>$array[3],
						'Count' => $array[4], 
						'Percent' => $array[5],   

				);
	}
	$aux++;
	$id++;

}

fclose($file);

$page = $_POST['page'];  // Almacena el numero de pagina actual
$limit = $_POST['rows']; // Almacena el numero de filas que se van a mostrar por pagina
$sidx = $_POST['sidx'];  // Almacena el indice por el cual se hará la ordenación de los datos
$sord = $_POST['sord'];  // Almacena el modo de ordenación

if(!$sidx) $sidx =1;

$count = count($data);

//En base al numero de registros se obtiene el numero de paginas
if( $count >0 ) {
        $total_pages = ceil($count/$limit);
} else {
        $total_pages = 0;
}
if ($page > $total_pages)
        $page=$total_pages;

//Almacena numero de registro donde se va a empezar a recuperar los registros para la pagina
$start = $limit*$page - $limit;

// Se agregan los datos de la respuesta del servidor

$respuesta->page = $page;
$respuesta->total = $total_pages;
$respuesta->records = $count; 

$i=0;
foreach ($data as $key => $value) 
{

	$respuesta->rows[$i]['id']=$i;
	$respuesta->rows[$i]['cell']=$value;

	$i++;

}
// La respuesta se regresa como json
echo json_encode($respuesta);

