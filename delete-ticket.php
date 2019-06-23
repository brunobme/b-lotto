<?php

/* 

delete_ticket method: to delete the requested ID ticket from the database
-- arg $ticketId: ticket identifier

*/

$ticketId = $_POST["ticket_id"];

function delete_ticket($ticketId){
    
    $ticketsJSON = file_get_contents('tickets.json');
    $tickets = json_decode($ticketsJSON, true);

    foreach ($tickets as $key => $ticket) {
        if($ticket['id'] == $ticketId){
            unset($tickets[$key]);
        }
    }

    file_put_contents('tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));

}

delete_ticket($ticketId);

header("refresh: .1; url= index.php"); 

?>


