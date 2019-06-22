<!DOCTYPE html>
<head>
	<title>REST Lotto</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

	<script type="text/javascript" src="js/jquery-3.2.1.js"> </script>
	<script type="text/javascript" src="js/vue.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- <script type="text/javascript" src="js/lotto.js"></script> -->

</head>
<body>
	<div id="app">
		<div class="container">
			<h1>Spin the Lotto today!</h1>
			<div class="row">
				<div class="col-md-6">
					<h2>Generate ticket</h1>
					<form class="form" action="new-ticket.php" method="POST">
						<div class="form-group">
							<label for="n_lines">How many lines do you want in your ticket?</label>
							<input min="1" required class="form-control col-md-6" type="number" name="n_lines">
						</div>
						<input type="submit" class="push-left btn btn-primary" value="Create Ticket">
					</form>
				</div>
				<div class="col-md-6">
					<h2>Ticket preview</h2>
					<div class="tickets-result">
						<div class="accordion" id="accordionExample">
							
						</div>
					</div>

					<script type="text/javascript">

						var main = function(){
							$.getJSON('tickets.json', function(tickets){
								var response = "";

								$.each(tickets, function(key, ticket){
									var ticket_id = "ticket_" + ticket.id;
									var ticket_info = "ticket_" + ticket.id + "_info";
									if(ticket.status){ var status = 'disabled'};

									response += '<div class="card">' +
										'<div class="card-header" id="' + ticket_id +'">' +
											'<h2 class="mb-0">' +
												'<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#' + ticket_info + '" aria-expanded="false" aria-controls="' + ticket_info + '">Ticket ' + ticket.id + " | " +  ticket.n_lines + " lines" +
												'</button>' + 
												'<form class="form" action="amend-lines.php" method="POST"> <input class="form-control" type="number" name="n_lines">' +
													'<input class="form-control" type="hidden" name="ticket_id" value="' + ticket.id  + '">' +
													'<input type="submit" class="btn btn-primary"' + status + ' value="Amend Lines">' +
												'</form>' +
												'<form class="form" action="status.php" method="POST">' +
													'<input class="form-control" type="hidden" name="ticket_id" value="' + ticket.id  + '">' +
													'<input type="submit" class="btn btn-primary"' + status +  ' value="Status">' +
												'</form>' + 
											'</h2>' +
										'</div>' +

										'<div id="' + ticket_info + '" class="collapse" aria-labelledby="' + ticket_id + '" data-parent="#accordionExample">' +
											'<div class="card-body"><ul>';
									$.each(ticket.lines, function(line, score){
										response += '<li>' + line + ': ' + score + '</li>';	
									});
									response += '</ul></div></div></div>';
									
								});
								$('.tickets-result .accordion').append(response);
							});

							$("input[disabled]").hover(function(){
								alert("You cant check the ticket status twice");
							});
						}

						$(document).ready(main);
					</script>
				</div>
				<div class="float">
					<h2>Result</h2>
					<p>Position (out of 1K competitors)</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>