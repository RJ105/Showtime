<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
<br/>
    <div class="container ">        
        <div class="row" id="movies">
        </div>



        <div class="carousel">
            <h1>Trending</h1>
            <div class="carouselbox bg-light" id="slider1">
            </div>
        </div>

        
        <div class="carousel" style="margin-top: 150px">
            <h1>Popular</h1>
            <div class="carouselbox bg-light" id="slider2">
            </div>
        </div>

        <div class="carousel" style="margin-top: 150px">
            <h1>Now Playing</h1>
            <div class="carouselbox bg-light" id="slider3">
            </div>
        </div>

        <div class="carousel" style="margin-top: 150px">
            <h1>Upcoming</h1>
            <div class="carouselbox bg-light" id="slider4">
            </div>
        </div>

        <div class="carousel" style="margin-top: 150px">
            <h1>Trending TV Series</h1>
            <div class="carouselbox bg-light" id="slider5">
            </div>
        </div>

        <div class="carousel" style="margin-top: 150px">
            <h1>popular TV Series</h1>
            <div class="carouselbox bg-light" id="slider6">
            </div>
        </div>

        <div class="carousel" style="margin-top: 150px">
            <h1>On The Air  TV Series</h1>
            <div class="carouselbox bg-light" id="slider7">
            </div>
        </div>

        <div class="carousel" style="margin-top: 150px">
            <h1>Top Rated TV Series</h1>
            <div class="carouselbox bg-light" id="slider8">
            </div>
        </div>

    </div>

<script>
 var dict = {
    "slider1": "trending/movie/day",
    "slider2": "movie/popular",
    "slider3": "movie/now_playing",
    "slider4": "movie/upcoming",
    "slider5": "trending/tv/day",
    "slider6": "tv/popular",
    "slider7": "tv/on_the_air",
    "slider8": "tv/top_rated"
  };

  showMovies_Tv(dict);

</script>

        <!-- if (window.location.href == 'http://localhost/showtime/' || window.location.href == 'http://localhost/showtime/index.php'){ -->

    <!-- ids : movies, slider1 to slider8 -->
</body>
</html>
