<!DOCTYPE html>
<html>
	
	<!-- codehw1.php as it appears on the live server with additional CSS & Javascript to enhance the appearance and viewing experience -->

	<head>
		<meta charset='utf-8' />
	</head>

	<body>
		<!-- navigation for viewing one challenge at a time -->
		<nav>
			<ul>
				<li><a href='javascript:dispClk("change")'>Challenge 1</a></li>
				<li><a href='javascript:dispClk("beer")'>Challenge 2</a></li>
			</ul>
		</nav>


		<div id='change'>
		<h2>Challenge 1</h2>
		<h1>Correct Change</h1>
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
			echo "<p>You are due $change back in change total.<p/><p>You are due back $dollar, $quarter, $dime, $nickel, and $cents.</p>";
		?>
		</div>


		<div id='beer' hidden>
		<h2>Challenge 2</h2>
		<h1>99 Bottles of Beer</h1>
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
					print "Take one down, pass it around, $count bottles of beer on the wall!<p/>";
				} else {
					print "Take one down, pass it around, $count bottle of beer on the wall!<p/>";
				}
			}
		?>
		</div>
	</body>
</html>


<!-- optional formatting to isolate challenges -->
<script type='text/javascript'>
	// show or hide certain <div> elements on the page by id
	function dispClk(idtxt) {
		var challenges = document.getElementsByTagName("div");
		for (var i = 0; i < challenges.length; i++) { challenges[i].setAttribute("hidden", ""); }
		document.getElementById(idtxt).removeAttribute("hidden");
		return;
	}
</script>
<style>
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
	nav ul li a:hover {
		text-decoration: underline;
	}
	h1 {
		margin-top: 0px;
		color: #A695C7;
	}
	h2 {
		margin-bottom: 0px;
		color: #444444;
	}
</style>