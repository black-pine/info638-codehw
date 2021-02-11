<!DOCTYPE html>
<html>

	<!-- codehw2 with only the challenge solutions PHP and basic HTML
	codehw2js.php contains the same PHP with additional CSS and Javascript as it appears on the live server -->

	<head>
		<meta charset='utf-8' />
		<title>Code Homework 2</title>
	</head>

	<body>
		<h1>Challenge 1: ISBN Validation</h1>

		<?php
			$code = '0156439611'; // ISBN

			echo "<p>Checking ISBN: $code for validity...</p>";

			// check if ISBN is valid and echo results
			if (validISBN(strtoupper($code))) {
				echo "<a href='https://isbnsearch.org/isbn/$code' target='_blank' rel='noopener noreferrer'>This is a valid ISBN!</a>";
			}
			else {
				echo "This is NOT a vaild ISBN!";
			}


			function validISBN($isbn) {
				// validity checks
				if (strlen($isbn) != 10) { return FALSE; }
				if (!(is_numeric($isbn) || (is_numeric(substr($isbn,0,9)) && substr($isbn, -1) == 'X'))) { return FALSE; }

				// check for non-numeric last digit & start sum
				if (substr($isbn, -1) == 'X') {
					$sum = 10;
					$isbn = (int) $isbn;
				}
				else {
					$sum = $isbn % 10;
					$isbn /= 10;
				}
				// calculate sum for ISBN check
				for($i = 2; $i <= 10; $i++) {
					$sum += $isbn%10 * $i;
					$isbn /= 10;
				}

				// return TRUE if there is 0 remainder
				return !($sum%11);
			}
		?>

		<h1>Challenge 2: Coin Toss</h1>

		<?php
			echo '<p>Flipping a coin 1 time... <br/>';
			coinToss();
			echo'</p>';

			for ($i = 3; $i < 10; $i += 2) {
				echo "<p>Flipping a coin $i times... <br/>";
				for($j = 1; $j <= $i ;$j++) { coinToss(); }
				echo "</p>";
			}

			echo '<p>Beginning the coin flipping...<br/>';
			$double = $first = FALSE;
			$coinCt = 0;
			do {
				do {
					$first = coinToss();
					$coinCt++;
				} while (!$first);
				$double = coinToss();
				$coinCt++;
			} while (!$double);

			echo "<br/>Flipped 2 heads in a row after $coinCt flips!</p>";


			function coinToss() {
				/* absolute image filepaths
				$heads = 'http://clipart-library.com/data_images/338909.jpg';
				$tails = 'http://clipart-library.com/image_gallery/225541.png';
				*/
				$heads = '../img/heads.jpg';
				$tails = '../img/tails.png';

				if (mt_rand(0,1)) { 
					echo "<img src='$heads' alt='HEADS' width=85>";
					return TRUE;
				}
				else {
					echo "<img src='$tails' alt='TAILS' width=85>";
					return FALSE;
				}
			}
		?>
	</body>
</html>