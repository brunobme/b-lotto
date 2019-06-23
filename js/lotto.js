var main = function(){

	$.getJSON('tickets.json', function(tickets){
		var html_response = ""; //html code to iterate in id=ticket-results

		$.each(tickets, function(key, ticket){
			var {id, n_lines, lines, status, score} = ticket;

			var tag_ticket_id = `ticket_${id}`;
			var tag_ticket_info = `ticket_${id}_info`;

			//ticket card header
			html_response += `
				<div class="card">
					<div class="card-header" id="${tag_ticket_id}">
						<div class="row">
							<h2 class="mb-0 col-md-6 float-left">
								<span class="col">Ticket ${id}</span>
								<button class="col text-left btn btn-link" type="button" data-toggle="collapse" data-target="#${tag_ticket_info}" aria-expanded="false" aria-controls="#${tag_ticket_info}">Show Lines
								</button>
							</h2>
							<ul class="col-md-6 float-left">
								<li>Lines: ${n_lines}</li>
								<li>Ticket Score: ${score}</li>
							</ul>
							<form class="delete form" action="delete-ticket.php" method="POST">
								<input type="hidden" name="ticket_id" value="${id}">
								<input type="submit" class="btn btn-secondary" value="X">
							</form> 
						</div>`;

			if(!status){
				//if status wasnt checked yet Amend line and Check status triggers are available
				html_response += `<div class="row">
								<form class="form col-md-9" action="amend-lines.php" method="POST">
									<div class="row">
										<input type="hidden" name="ticket_id" value="${id}">
										<div class="col">
											<input class="form-control col" type="number" name="n_lines">
										</div>
										<div class="col">
											<input type="submit" class="col btn btn-primary" value="Amend Lines">
										</div>
									</div>
								</form>
								<form class="form col-md-3" action="status.php" method="POST">
									<input type="hidden" name="ticket_id" value="${id}">
									<input type="submit" class="btn btn-primary" value="Status">
								</form> 
							</div>`;
			}//END ticket card header

			//ticket card body
			html_response += `</div>
						<div id="${tag_ticket_info}" class="collapse" aria-labelledby="${tag_ticket_id}" data-parent="#accordionExample">
							<div class="card-body">
								<table class="table table-striped">
									<thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">Value</th>
									      <th scope="col">Score</th>
									    </tr>
									  </thead>
									  <tbody>`;

			var count = 1;

			//line iteration for each ticket 
			$.each(lines, function(lines, line){
				html_response += `
					<tr>
						<th scope="row">${count}</th>
						<td>${line.substring(line.indexOf("-") + 1, line.length)}</td>`

				//show scores or not if the lines array contain the dash character
				if (line.indexOf("-") != -1){
					html_response += `<td>${line.substring(0, line.indexOf("-"))}</td>`;
				}else{
					html_response += `<td title="Check the status to get the score">?</td>`;
				}
		
				html_response += `</tr>`;
				count++;
			});

			html_response += `</tbody></table></div></div></div>`;//END ticket card body
			
		});

		$('.tickets-result .accordion').append(html_response);
	});

}

$(document).ready(main);
