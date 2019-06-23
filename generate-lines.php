<?php 
/* 

generate_lines method: to generate n lines with m numbers per line

$nLines: number of lines to add 
$numbersPerLine: n random integers from 0 to 2

*/


function generate_lines($nLines, $numbersPerLine){
    $newLines = array();

    for($i = 0; $i < $nLines; $i++){
        $line = "";
        for($j = 0; $j < $numbersPerLine; $j++){
            $rand_n = mt_rand(0, 2);
            $line .= $rand_n;
        }    

        array_push($newLines, $line);
    }

    return $newLines;
} 

?>