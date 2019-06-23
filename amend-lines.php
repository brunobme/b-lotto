<?php

/* 

amend_lines method: to append new random lines to the end of the ID ticket
-- arg $nLines: number of lines to add 
-- arg $numbersPerLine: n random integers from 0 to 2
-- arg $ticketId: ticket identifier

*/

// include function to generate n lines with m numbers per line
include 'generate-lines.php'; 

$nLines = $_POST["n_lines"];
$ticketId = $_POST["ticket_id"];
$numbersPerLine = 3;


function amend_lines($nLines, $numbersPerLine, $ticketId){
    $ticketsJSON = file_get_contents('tickets.json'); //current db state
    $tickets = json_decode($ticketsJSON, true);
    
    $newLines = generate_lines($nLines, $numbersPerLine);

    // add the newLines array to the original tickets object
    foreach($tickets as &$ticket){
        if ($ticket['id'] == $ticketId){
            $ticket["n_lines"] += $nLines;
            $ticket["lines"] = array_merge($ticket["lines"], $newLines);
            break;
        }
    }

    file_put_contents('tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));

}

amend_lines($nLines, $numbersPerLine, $ticketId);

header("refresh: .1; url= index.php"); 

?>


