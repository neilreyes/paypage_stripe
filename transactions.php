<?php
require_once('./config/db.php');
require_once('./lib/pdo_db.php');
require_once('./models/Transaction.php');

$transactions = new Transaction();
$transactions = $transactions->readTransactions();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Transactions</title>
</head>

<body>

	<div class="container mt-4">
		<div class="btn-group" role="group">
			<a href="customers.php" class="btn btn-primary">Customers</a>
			<a href="transactions.php" class="btn btn-secondary">Transactions</a>
		</div>
		<hr>
		<h2>Transactions</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Transaction ID</th>
					<th>Amount</th>
					<th>Product</th>
					<th>Status</th>
					<th>Date Created</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($transactions as $t): ?>
				<tr>
					<td><?php echo $t->id; ?>
					</td>
					<td>
						<?php echo sprintf('%.2f', $t->amount / 100); ?>
						<?php echo strtoupper($t->currency); ?>
					</td>
					<td><?php echo $t->product; ?>
					</td>
					<td><?php echo $t->status; ?>
					</td>
					<td><?php echo $t->created_at; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<p><a href="index.php">Pay Page</a></p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>