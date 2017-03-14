<html><head>
		<title>Play It By Peer</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body class="">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header" class="alt">
				</header>

				<!-- Nav -->
					<nav id="nav" class="alt">
					<ul>
							<li><a href="./index.php" class="active">Home</a></li>
							
							<?php 
							if (!isset ($_SESSION)) {
								session_start();
								
							}
							
							if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != ''){ 
								printf("<li><a href=\"#first\" class=\"\">Sell</a></li>");
							    printf("<li><a href=\"./logout.php\" class=\"\">Logout</a></li>");
							} else {
								printf("<li><a href=\"./login.php\" class=\"\">Login</a></li>");
							}
							?>
						
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Play It By Beer</h2>
										</header>

										<h2>Registration</h2>
<?php
if (isset($_POST) && count ($_POST) > 0) {
	$firstName = htmlspecialchars(ucfirst(trim($_POST["first_name"])));
	$lastName = htmlspecialchars(ucfirst(trim($_POST["last_name"])));
	$email = trim(strtolower($_POST["email"]));
	$passOne = $_POST["pass_one"];
	$passTwo = $_POST["pass_two"];
	
	
	
	//check wheter user/email alerady exists
	$dbh = new PDO("mysql:host=localhost;dbname=test", "group16", "REACH-state-worn-gone" );
	$stmt = $dbh->prepare("SELECT id, email, password FROM Users WHERE email = ?" );
	$stmt->execute(array($email));
	$rowCount = $stmt->rowCount();
	if ($passOne != $passTwo) { //in case Javascript is disabled.
		printf("<h2> Passwords do not match. </h2>");
	} else {
		if ($rowCount > 0) { 
			printf("<h2> An account already exists with the given email.</h2>");
		} else {
			$query = "INSERT INTO users SET email = :email, first_name = :first_name, last_name = :last_name, password = :password";
			$stmt = $dbh->prepare($query);
			$siteSalt  = "ulbuynsell";
			$saltedHash = hash('sha256', $passOne.$siteSalt);	
			$affectedRows = $stmt->execute(array(':email' => $email, ':first_name' => $firstName, ':last_name' => $lastName, ':password' => $saltedHash));
			
			if ($affectedRows > 0) {
					$insertId = $dbh->lastInsertId();
					printf("<h2> Welcome %s! Please <a href=\"./login.php\"> login </a> to proceed. </h2>", $firstName);
													 //logout first
								/*http://php.net/manual/en/function.session-unset.php*/
								session_unset();
								session_destroy();
								session_write_close();
								setcookie(session_name(),'',0,'/');
								session_regenerate_id(true);		
				
			}
			


		}
	}
	

}

?>

<?php 

if (!isset($_POST) || count($_POST) == 0) { ?>
											<form method="post">
												<label> First name*:</label>
												<input type="text" name="first_name" placeholder="first name" required="required" maxlength="60"/>
												<label> Last name:</label>
												<input type="text" name="last_name" placeholder="last name" maxlength="60"/>
												<label> Email*:</label>
												<input type="text" name="email" placeholder="email" required="required" maxlength="60"/>
												
												<br>
												
												<label> Student/Staff ID*:</label>
												<input type="SID" name="SID" placeholder="SID" required="required" maxlength="50"/>
												<br>
												
												
												<label> Password*:</label>
												<input type="password" name="pass_one" placeholder="password" required="required" maxlength="50"/>
												<br>
												<label> Re-enter password*:</label>
												<input type="password" name="pass_two" placeholder="re-enter password" required="required" maxlength="50"/>
												<br>
												
												<button type="submit" class="button special small">Register</button>
												<button type="reset" class="button small">Reset</button>
												
										</form>
<?php } ?>									
										
									</div>
									
								</div>
							</section>

					<footer id="footer">
						
					</footer>

			</div>

	
</body></html>