<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SHOWTIME</title>

	<link href="https://fonts.googleapis.com/css?family=Marck+Script|Open+Sans&display=swap" rel="stylesheet">


	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

   <!-- Option 1: Bootstrap Bundle with Popper, difference is it include collapse and popup like modal-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>

  <!--  jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
  	<!-- axios -->
	 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	 
	 <script type="text/javascript" src="jscript.js"></script>
	 <link rel="stylesheet" type="text/css" href="main_copy.css">



</head>
<body>
	<header class="header">
		<div class="logo1">
				<p class="title"><a href="index.php">Showtime</a></p>
			<nav class="right_tokens">
				<ul>
					<div class="dropdown1">
					 	<a href="#" class="dropbtn1">Movies</a>
					</div>
					<div class="dropdown2">
						<a href="#" class="dropbtn2">Web Series</a>
					</div>
					<div class="dropdown3">
					 	<a href="#" class="dropbtn3">Genre</a>
					</div>
				</ul>
			</nav>
			<nav class="bottom-header">
				<ul>
					<div class="bottom">

						<div class="login">
							<?php
								if(isset($_SESSION['u_name']))
									{
										echo'<form action="includes/logoutdb.php" method="POST">
										<button type="submit" name="submit">Logout</button>
									</form>';
									}
								
								else{

									echo '<form action="includes/logindb.php" method="POST">
										<input type="text" name="user_name" placeholder="Enter Name">
										<input type="password" name="user_password" placeholder="Enter Password">
										<button type="submit" name="submit">Log-in</button>
									</form>';
								}
							?>

						
						</div>


							<div  class="signup"><a href="signup.php"><?php
								if(!isset($_SESSION['u_name']))
								{	
									echo 'signup';
								}
						?></a></div>	



							
						<div  class="profile"><a href="profile.php"><?php
								if(isset($_SESSION['u_name']))
								{	
									echo $_SESSION['u_name'];
								}
						?></a></div>	
					</div>
				</ul>
			</nav>
		<!---------------------------------------search--------------------------->
			<div class="livesearch">
				<form  action="movie_page.php" method="POST" id="searchform" >
					 <input type="text" name="Search" placeholder="Search.." id="searchtext"  >
				</form>
			</div>
		</div>		
	</header>


	<div class="space"></div>

</body>

</html>
