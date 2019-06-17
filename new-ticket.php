<?php

$n_lines = $_POST["n_lines"];

$tickets = array();
for($i = 0; $i < $n_lines; $i++){
    $line = "";
    $score = 0;
    for($j = 0; $j < 3; $j++){
        $rand_n = mt_rand(0, 2);
        $line .= $rand_n . " ";
        $score += $rand_n;
    }    
    $new_line = $line . " | Score: " . $score;
    array_push($tickets, $new_line);
}

$ticketsJSON = fopen('tickets.json', 'w');
fwrite($ticketsJSON, json_encode($tickets));
file_put_contents($ticketsJSON, json_encode($tickets), FILE_APPEND);

fclose($ticketsJSON);

header("refresh: .1; url= index.php"); 

?>


