<!DOCTYPE html>
<html>

	<!-- codehw3 as it appears on the live server with additional CSS & Javascript to enhance the appearance and viewing experience
	codehw3.php contains the same PHP, but stripped down front end code -->

	<head>
		<meta charset='utf-8' />
		<title>Code Homework 3</title>
	</head>

	<body>
		<nav>
			<ul>
				<li><a href='javascript:dispClk("books")'>Challenge 1</a></li>
				<li><a href='javascript:dispClk("toss")'>Challenge 2</a></li>
			</ul>
		</nav>

		<div id='books'>
			<hgroup>
				<h2>Challenge 1</h2>
				<h1>Book Lists</h1>
			</hgroup>

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
								if ($key == 'price') { echo "<td>\$$info</td>"; }
								else { echo "<td>$info</td>"; }
							}
						echo '</tr>';
					}
				?>

				</tbody>
			</table>

			<div id='grandTotal'>
			<?php
				// Calculate total cost
				$totalCost = array_sum(array_column($bookList, 'price'));
				echo "Your total price is: <b>\$$totalCost</b>";
			?>
			</div>
		</div>

		<div id='toss' hidden>
			<hgroup>
				<h2>Challenge 2</h2>
				<h1>Coin Toss, continued</h1>
			</hgroup>

			<?php
				$total = 4; // set number of heads in a row

				echo "<p>Beginning the coin flipping! Looking for <b>$total</b> heads in a row...</p><p>";
				$tosses = coinToss($total);
				echo "</p><p>Flipped <b>$total</b> heads in a row after <b>$tosses</b> flips!</p>";


				// Function to simulate coin toss & print heads/tails image until desired # of consectutive heads
				// RETURN the total number of times the coin was tossed
				function coinToss($consecHeads) {
					/* absolute image filepaths
					$heads = 'http://clipart-library.com/data_images/338909.jpg';
					$tails = 'http://clipart-library.com/image_gallery/225541.png';
					*/
					$heads = '../img/heads.jpg';
					$tails = '../img/tails.png';
					$headCt = 0;
					$coinCt = 0;

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
		</div>
	</body>
</html>


<script type='text/javascript'>
	// show or hide the main 2 <div> elements by id
	function dispClk(idtxt) {
		if(idtxt == 'books') { document.getElementById('toss').setAttribute("hidden", ""); }
		else if (idtxt == 'toss') { document.getElementById('books').setAttribute("hidden", ""); }
		document.getElementById(idtxt).removeAttribute("hidden");
		return;
	}
</script>

<style type="text/css">
	body { text-align: center; }
	nav ul {
		list-style-type: none;
		padding: 10px;
		background-color: #A695C7;
	}
	nav ul li {
		display: inline-block;
		margin: 0px 40px;
		font-size: 20px;
	}
	nav ul li a {
		text-decoration: none;
		color: #FFFFFF;
	}
	nav ul li a:hover { text-decoration: underline; }
	hgroup {
		margin-bottom: 25px;
		color: #A695C7;
	}
	h1, h2 { margin: 0px; }
	h2 { color: #444444; }
	table {
		margin: auto;
		border: 3px solid black;
		border-collapse: collapse;
	}
	th, td {
 		border-right: 1px solid black;
 		padding: 5px 10px;
	}
	th { background-color: #BBBBBB; }
	tr:nth-child(even) { background-color: #E9E9E9; }
	td:first-child { text-align: left; }
	#grandTotal {
		width: 40%;
		margin: auto;
		margin-top: 25px;
		padding: 10px;
		background-color: #A695C7;
		font-size: 30px;
		text-align: center;
		border: 2px solid #A695C7;
		border-radius: 25px;
	}
</style>