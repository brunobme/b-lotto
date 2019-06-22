<?php

$ticketId = $_POST["ticket_id"];

function score($ticketId){
    $ticketsJSON = file_get_contents('tickets.json');
    $tickets = json_decode($ticketsJSON, true);
    
    foreach($tickets[$ticketId]["lines"] as $line){
        $lineArray = str_split($line);
        $lineTotal = array_sum($lineArray); 
        $result = 0;
        // print_r($auxArray);
        // break;
        if($lineTotal == 2){
            $result = 10;
        }else if(sizeof(array_values($lineArray)) > 1){
            $result = 5;
        }else if($lineArray[0] != $lineArray[1] && $lineArray[0] != $lineArray[2]){
            $result = 1;
        }
        $scoreArray[$line] = $result;
    }

    arsort($scoreArray);

    $tickets[$ticketId]["lines"] = $scoreArray;
    $tickets[$ticketId]["status"] = true;
    // print_r($scoreArray);
    file_put_contents('tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));

}

score($ticketId);

header("refresh: .1; url= index.php"); 

?>


