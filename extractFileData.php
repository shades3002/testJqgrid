<?php

/**
 * function extractFileData
 * Arg $path file
 * return json
 * @author shades3002@gmail.com
 */

function extractFileData($path) {
    $file = fopen($path, "r") or exit("Error en el archivo!");
    $aux = 1;
    $id = 0;
    $data = array();

    while(!feof($file)) {
        $linea = fgets($file)."<br/>";
        if($aux!=1){
            $array = array();
            $array = explode(",", $linea);
            if(!empty($array)) {
                $data[] = array(
                    'Id' =>$id,
                    'Year' => (!empty($array[0]))?$array[0]:null,
                    'Ethnicity' => (!empty($array[1]))?$array[1]:null,
                    'Sex' => (!empty($array[2]))?$array[2]:null, 
                    'Cause_of_Death'=>(!empty($array[3]))?$array[3]:null,
                    'Count' => (!empty($array[4]))?$array[4]:null, 
                    'Percent' => (!empty($array[5]))?$array[5]:null 
                );
            }
        }
        $aux++;
        $id++;
    }
    fclose($file);
    return $data;
}

?>