<?php
/* 

check_status method: to calculated the requested ID ticket score reordering the lines according to the result
-- arg $ticketId: ticket identifier to check status and update

*/

$ticketId = $_POST["ticket_id"];

function check_status($ticketId){
    $ticketsJSON = file_get_contents('tickets.json');
    $tickets = json_decode($ticketsJSON, true);
    $totalScore = 0;

    $scoreArray = array();
    foreach($tickets as &$ticket){
        if ($ticket['id'] == $ticketId){
            foreach($ticket["lines"] as $line){
                $lineArray = str_split($line);
                $lineTotal = array_sum($lineArray); 
                $score = "00";

                if($lineTotal == 2){
                    $score = "10";
                }else if($lineArray[0] == $lineArray[1] && $lineArray[1] == $lineArray[2]){
                    $score = "05";
                }else if($lineArray[0] != $lineArray[1] && $lineArray[0] != $lineArray[2]){
                    $score = "01";
                }

                $totalScore += (int)$score;
                $line = $score . "-" . $line;
                array_push($scoreArray, $line);
                rsort($scoreArray);
            }

            $ticket["lines"] = $scoreArray;
            $ticket["status"] = true;
            $ticket["score"] = $totalScore;
            break;
        }
    }
    
    file_put_contents('tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));
}

check_status($ticketId);

header("refresh: .1; url= index.php"); 

?>


