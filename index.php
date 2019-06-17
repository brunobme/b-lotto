<!DOCTYPE html>
<head>
	<title>REST Lotto</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
	<script type="text/javascript" src="js/vue.js"></script>
	<script type="text/javascript" src="js/lotto.js"></script>

</head>
<body>
	<div id="app">
		<div class="container">
			<div class="row">
				<h1>Spin the Lotto today!</h1>
				<h2>3 chances to win</h2>
				<div class="col-md-6">
					<h2>Generate ticket</h1>
					<form class="form" action="new-ticket.php" method="POST">
						<div class="form-group">
							<label for="n_lines">How many lines do you want in your ticket?</label>
							<input class="form-control" type="number" name="n_lines">
						</div>
						<input type="submit" class="" value="Create Ticket">
					</form>
				</div>
				<div class="col-md-6">
					<h2>Ticket preview</h2>
					<ul class="tickets-result"></ul>
					<script type="text/javascript">
						// var test = "Success"
						// document.write(test);
						$.getJSON('tickets.json', function(data) {
							for (x in data){
								$(".tickets-result").append("<li> Line " + (parseInt(x) + 1) + ": " + data[x] + "</li>");
							}
					     });
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