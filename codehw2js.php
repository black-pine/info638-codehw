<!DOCTYPE html>
<html>

	<!-- codehw2 as it appears on the live server with additional CSS & Javascript to enhance the appearance and viewing experience
	codehw2.php contains the same PHP, but stripped down front end code -->

	<head>
		<meta charset='utf-8' />
		<title>Code Homework 2</title>
	</head>

	<body>
		<!-- navigation for viewing one challenge at a time -->
		<table>
			<tr>
				<td class='left'>
					<nav>
						<ul>
							<li><a href='javascript:dispClk("isbn")'>Challenge 1</a></li>
							<li><a href='javascript:dispClk("toss")'>Challenge 2</a>
								<ul>
									<li><a href='javascript:dispClk("1")'>One Flip</a></li>
									<li><a href='javascript:dispClk("3")'>Three Flips</a></li>
									<li><a href='javascript:dispClk("5")'>Five Flips</a></li>
									<li><a href='javascript:dispClk("7")'>Seven Flips</a></li>
									<li><a href='javascript:dispClk("9")'>Nine Flips</a></li>
									<li><a href='javascript:dispClk("double")'>Two Heads</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</td>

				<td class='right'>
					<div id='isbn'>
						<h2>Challenge 1</h2>
						<h1>ISBN Validation</h1>

						<?php
							$code = '0156439611'; // ISBN

							echo "<p>Checking ISBN: <b>$code</b> for validity...</p>";
							if (validISBN(strtoupper($code))) { echo "<a href='https://isbnsearch.org/isbn/$code' target='_blank' rel='noopener noreferrer'>This is a valid ISBN!</a>"; }
							else { echo "This is NOT a vaild ISBN!"; }

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
					</div>

					<div id='toss' hidden>
						<h2>Challenge 2</h2>
						<h1>Coin Toss</h1>

						<?php
							echo "<p id='1'>Flipping a coin 1 time... <br/>";
							coinToss();
							echo'</p>';

							for ($i = 3; $i < 10; $i += 2) {
								echo "<p id='$i'>Flipping a coin $i times... <br/>";
								for($j = 1; $j <= $i ;$j++) { coinToss(); }
								echo "</p>";
							}

							echo "<p id='double'>Beginning the coin flipping...<br/>";
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

							echo "<br/>Flipped 2 heads in a row after <b>$coinCt</b> flips!</p>";


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
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>


<!-- optional formatting to isolate challenges -->
<script type='text/javascript'>
	// show or hide certain <div> or <p> elements on the page by id
	function dispClk(idtxt) {
		if (idtxt == 'isbn') {
			document.getElementById(idtxt).removeAttribute("hidden");
			document.getElementById('toss').setAttribute("hidden", "");
		}
		else if (idtxt == 'toss') {
			document.getElementById('isbn').setAttribute("hidden", "");
			document.getElementById('toss').removeAttribute("hidden");
			var tosses = document.getElementById('toss').getElementsByTagName("p");
			for (var i = 0; i < tosses.length; i++) { tosses[i].removeAttribute("hidden"); }
		}
		else {
			document.getElementById('isbn').setAttribute("hidden", "");
			document.getElementById('toss').removeAttribute("hidden");
			var tosses = document.getElementById('toss').getElementsByTagName("p");
			for (var i = 0; i < tosses.length; i++) { tosses[i].setAttribute("hidden", ""); }
			document.getElementById(idtxt).removeAttribute("hidden");
		}
		return;
	}
</script>
<style>
	table { width: 100%; }
		
	tr { vertical-align: top; }

	td.left { 
		width: 180px;
	}
	td.right {
		padding-left: 25px;
		border: 2px solid #A695C7;
	}
	nav {
		padding: 10px 30px;
		background-color: #A695C7;
	}
	ul {
		padding: 0px;
		list-style-type: none;
		text-align: center;
	}
	nav ul li {
		font-size: 22px;
		padding-bottom: 10px;
	}
	nav ul li a {
		text-decoration: none;
		color: #FFFFFF;
	}
	nav ul li a:hover {
		text-decoration: underline;
	}
	nav ul li ul li {
		padding: 0px 0px 0px 30px;
		font-size: 17px;
		text-align: left;
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