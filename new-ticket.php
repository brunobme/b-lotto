<?php
/* 

new_ticket method: to create a new ID ticket with n new random lines 
-- arg $nLines: number of lines to add 
-- arg $numbersPerLine: n random integers from 0 to 2

*/

// function to generate n lines with m numbers per line
include 'generate-lines.php'; 

$nLines = $_POST["n_lines"];
$numbersPerLine = 3;

function new_ticket($nLines, $numbersPerLine){
    if(file_exists("tickets.json")){
        $ticketsJSON = file_get_contents('tickets.json');
    }else{
        $ticketsJSON = fopen('tickets.json', 'w');
    }
    $tickets = json_decode($ticketsJSON, true);

    $lastTicket = end($tickets);

    $newTicket = array(
        "id"        => $lastTicket["id"] + 1, //ticket ID starting from 1 and increasing according to the last existent ticket
        "n_lines"   => $nLines, //n lines
        "lines"     => array(), //string array of lines
    );

    $newTicket["lines"] = generate_lines($nLines, $numbersPerLine);

    $tickets[] = $newTicket;
    file_put_contents('tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));

}

new_ticket($nLines, $numbersPerLine);

header("refresh: .1; url= index.php"); 

?>


