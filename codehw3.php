<!DOCTYPE html>
<html>

	<!-- codehw3 with only the challenge solutions PHP and basic HTML
	codehw3js.php contains the same PHP with additional CSS and Javascript as it appears on the live server -->

	<head>
		<meta charset='utf-8' />
		<title>Code Homework 3</title>
	</head>

	<body>
		<h1>Challenge 1: Book lists</h1>

		<table>
			<thead>
				<tr>
					<th>Title</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th># of Pages</th>
					<th>Type</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>

			<?php
				// Define multi-dimensional array of books
				$bookList = [ array('title' => 'PHP and MySQL Web Development', 'first' => 'Luke', 'last' => 'Welling', 'pages' => 144, 'type' => 'Paperback', 'price' => 31.63), 
					array('title' => 'Web Design with HTML, CSS, JavaScript and jQuery', 'first' => 'Jon', 'last' => 'Duckett', 'pages' => 135, 'type' => 'Paperback', 'price' => 41.23), 
					array('title' => 'PHP Cookbook: Solutions & Examples for PHP Programmers', 'first' => 'David', 'last' => 'Sklar', 'pages' => 14, 'type' => 'Paperback', 'price' => 40.88), 
					array('title' => 'JavaScript and JQuery: Interactive Front-End Web Development', 'first' => 'Jon', 'last' => 'Duckett', 'pages' => 251, 'type' => 'Paperback', 'price' => 22.09), 
					array('title' => 'Modern PHP: New Features and Good Practices', 'first' => 'Josh', 'last' => 'Lockhart', 'pages' => 7, 'type' => 'Paperback', 'price' => 28.49), 
					array('title' => 'Programming PHP', 'first' => 'Kevin', 'last' => 'Tatroe', 'pages' => 26, 'type' => 'Paperback', 'price' => 28.96)
				];

				// Loop through each book
				foreach ($bookList as $book) {
					echo '<tr>';
						// Loop through each piece of information about a book
						foreach ($book as $key => $info) {
							if ($key == 'price') { echo "<td>\$$info</td>"; } // Add '$' for prices
							else { echo "<td>$info</td>"; }
						}
					echo '</tr>';
				}
			?>

			</tbody>
		</table>

		<?php
			// Calculate total cost
			$totalCost = array_sum(array_column($bookList, 'price'));
			echo "Your total price is: \$$totalCost";
		?>


		<h1>Challenge 2: Coin Toss, continued</h1>

		<?php
			$total = 4; // set number of heads in a row

			echo "<p>Beginning the coin flipping! Looking for $total heads in a row...<br/>";
			$tosses = coinToss($total);
			echo "<br/>Flipped $total heads in a row after $tosses flips!</p>";


			// Function to simulate coin toss & print heads/tails image until desired # of consectutive heads
			// RETURN the total number of times the coin was tossed (or 0 if input <= 0)
			function coinToss($consecHeads) {
				// Return 0 if non-positive number of consecutive heads requested
				if($consecHeads <= 0) { return 0; }

				$heads = '../img/heads.jpg';
				$tails = '../img/tails.png';
				$headCt = 0; // Count of consecutive heads
				$coinCt = 0; // RETURN value of total tosses

				do {
					if(mt_rand(0,1)) {
						echo "<img src='$heads' alt='HEADS' width=85>";
						$headCt++;
					}
					else {
						echo "<img src='$tails' alt='TAILS' width=85>";
						$headCt = 0;
					}
					$coinCt++;
				} while ($headCt != $consecHeads);
				return $coinCt;
			}
		?>
	</body>
</html>