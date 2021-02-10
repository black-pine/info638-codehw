<!DOCTYPE html>
<html>

	<!-- codehw1 with only the challenge solutions PHP and basic HTML
	codehw1js.php contains the same PHP with additional CSS and Javascript as it appears on the live server -->

	<head> <meta charset='utf-8' /> </head>

	<body>
		<div>
		<h1>Challenge 1: Correct Change</h1>
		<?php
			// calculate amount of each denomination
			$cents = $change = 159; // set the change value
			$dollar = (int) ($cents/100);
			$cents %= 100;
			$quarter = (int) ($cents/25);
			$cents %= 25;
			$dime = (int) ($cents/10);
			$cents %= 10;
			$nickel = (int) ($cents/5);
			$cents %= 5;

			// append denomination name
			$change == 1 ? $change .= ' cent' : $change .= ' cents';
			$dollar == 1 ? $dollar .= ' dollar' : $dollar .= ' dollars';
			$quarter == 1 ? $quarter .= ' quarter' : $quarter .= ' quarters';
			$dime == 1 ? $dime .= ' dime' : $dime .= ' dimes';
			$nickel == 1 ? $nickel .= ' nickel' : $nickel .= ' nickels';
			$cents == 1 ? $cents .= ' cent' : $cents .= ' cents';
			
			// final output
			echo "<p>You are due $change back in change total.</p><p>You are due back $dollar, $quarter, $dime, $nickel, and $cents.</p>";
		?>
		</div>


		<div>
		<h1>Challenge 2: 99 Bottles of Beer</h1>
		<?php
			$count = 4; // set the number of bottles to start with

			/* deprecated for-loop initalization from Challenge 2 part a
			for($count = 99; $count > 0;) { */
			while($count > 0) {
				if ($count != 1) {
					print "<p>$count bottles of beer on the wall, $count bottles of beer!<br/>";
				} else {
					print "<p>$count bottle of beer on the wall, $count bottle of beer!<br/>";
				}
				if (--$count != 1) {
					print "Take one down, pass it around, $count bottles of beer on the wall!</p>";
				} else {
					print "Take one down, pass it around, $count bottle of beer on the wall!</p>";
				}
			}
		?>
		</div>
	</body>
</html>
