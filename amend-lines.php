<?php

$nLines = $_POST["n_lines"];
$ticketId = $_POST["ticket_id"];

$numbersPerLine = 3;


function amend_lines($nLines, $numbersPerLine, $ticketId){
    $ticketsJSON = file_get_contents('tickets.json');
    $tickets = json_decode($ticketsJSON, true);

    $tickets[$ticketId]["n_lines"] += $nLines;

    for($i = 0; $i < $nLines; $i++){
        $line = "";
        for($j = 0; $j < $numbersPerLine; $j++){
            $rand_n = mt_rand(0, 2);
            $line .= $rand_n;
        }    
        array_push($tickets[$ticketId]["lines"], $line);
        // print_r($newTicket);
    }

    file_put_contents('tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));

}

amend_lines($nLines, $numbersPerLine, $ticketId);

header("refresh: .1; url= index.php"); 

?>


