<!DOCTYPE html>
<head>
	<title>B Lottery</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">

	<script type="text/javascript" src="js/jquery-3.2.1.js"> </script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="app">
		<div class="container">
			<h1 class="text-center">Play the B Lotto today!</h1>
			<div class="row">
				<div class="col-12 col-md-6">
					<h2>Generate ticket</h1>
					<div class="row">
						<div class="col">
							<form class="form" action="new-ticket.php" method="POST">
								<div class="form-group">
									<label for="n_lines">How many lines do you want in your ticket?</label>
									<div class="row">
										<div class="col">								
											<input min="1" required class="form-control" type="number" name="n_lines">
										</div>			
										<div class="col">
											<input type="submit" class="btn btn-primary" value="Create Ticket">
										</div>			
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- <h2>Result</h2>
					<div class="row">
						<div class="col">
							<p>Position (out of 1K competitors)</p>
						</div>
					</div> -->
				</div>
				<div class="col-12 col-md-6">
					<h2>Tickets preview</h2>
					<div class="tickets-result">
						<div class="accordion" id="accordionExample">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/lotto.js"></script>
</body>
</html>