<?php
    if (!empty($_GET['tid']) && !empty($_GET['product'])) {
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
        $tid = $_GET['tid'];
        $product = $_GET['product'];
    } else {
        header('Location: index.php');
    }
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
	<title>Thank You</title>
</head>

<body>
	<div class="container">
		<h2 class="my-4 text-center">Thank you for purchasing <?php echo $product; ?>
		</h2>
		<hr />
		<p>Your transaction ID is <?php echo $tid; ?>
		</p>
		<p>Check your email for your info</p>
		<p><a href="index.php" class="btn btn-light mt-2">Go back</a></p>
	</div>
</body>

</html>