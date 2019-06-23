# Lotto Solution

Welcome to the B Lotto. A REST interface in PHP to generate and interact with **lottery tickets** with n lines. The rules of the game are described below.  


## Lottery Rules
* Each ticket has a series of lines with 3 numbers, each of which has a value of 0, 1, or 2. 
* Each line score is calculated as follow:
** if the sum of the values on a line is 2, the score is 10
** else if they are all the same, the score is 5 
** else if so long as both 2nd and 3rd numbers are different from the 1st, the score is 1
** else the score is 0


## Features enabled:
### Create Ticket
new-ticket.php through the method 	

```php
function new_ticket(arg $nLines, arg $numbersPerLine);

```

### Amend Lines
A ticket can be amended with n additional lines by calling amend-lines.php through the method 


```php
function amend_lines(arg $nLines, arg $numbersPerLine, arg $ticketId){

```

### Check Status 
Once the status is checked on a ticket, its lines can't be updated. The lines are sorted in descending order according to the score. The status is checked through the file status.php by calling the method score:

```php
function score(arg $ticketId);

```

### Delete Ticket
Delete the ticket from the database

```php
function delete_ticket(arg $ticketId);

```
	
