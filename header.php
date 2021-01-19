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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  
  	<!-- axios -->
	 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="main_copy.css">

	 <script type="text/javascript" src="jscript.js"></script>



</head>
<body>
	
	<?php
	echo'
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
		<a class="navbar-brand mr-5" href="/showtime">Showtime</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="/showtime">Home <span class="sr-only">(current)</span></a>
			</li>

			

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="movie" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Movie
				</a>
				<div class="dropdown-menu" aria-labelledby="movie">
					<a class="dropdown-item" href="movie.php?filter=popular" >Popular</a>
					<a class="dropdown-item" href="movie.php?filter=now_playing" >Now Playing</a>
					<a class="dropdown-item" href="movie.php?filter=upcoming" >Upcoming</a>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="tvshows" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					TV shows
				</a>
				<div class="dropdown-menu" aria-labelledby="tvshows">
					<a class="dropdown-item" href="tvshow.php?filter=popular">Popular</a>
					<a class="dropdown-item" href="tvshow.php?filter=on_the_air">On Air</a>
					<a class="dropdown-item" href="tvshow.php?filter=top_rated">Top rated</a>
				</div>
			</li>
		</ul>
	</div>
  </nav>

		<div class="input-group mb-3 container">
			<div class="input-group-prepend">
				<button type="button" class="btn btn-outline-secondary" id="searching" >Search</button>
				<button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="sr-only">Toggle Dropdown</span>
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#" onclick="setfilter(1)">Movies</a>
					<a class="dropdown-item" href="#" onclick="setfilter(2)">Tv Shows</a>
					<a class="dropdown-item" href="#" onclick="setfilter(3)">Both</a>
				</div>
			</div>
			<input type="text" class="form-control col-md-4 col-sm-3" id="searchtext" aria-label="Text input with segmented dropdown button">
			<span id="searchwarn"></span>
		</div>
  ';

	?>
	<script>
	var media = 'multi';
	function setfilter(temptype){
		if (temptype == 1){ media = 'movie';}
		else if (temptype == 2) { media= 'tv';}
		else { media = 'multi';}
		console.log(media);
	}
		$(document).ready(() => {

			$('#searching').on('click', (e) => {
			// console.log("here");
			let searchText = $('#searchtext').val();
			if(searchText.length <1){
				$("#searchwarn").text("Input length should be more than 2 letters ");
			}
			// else if (media == 'unknown'){ 
			// 	$("#searchwarn").text("Please select a search option   ");
			// }
			else{
				sessionStorage.setItem('searchquery', searchText);
				window.location = 'search.php?filter='+media;

			}
			// getMovies(searchText);
			e.preventDefault();
			});
		});

	</script>

		<!-- ids : movie, tvshows -->
</body>

</html>
