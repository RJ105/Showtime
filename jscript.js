$(document).ready(() => {
  $('#searchform').on('submit', (e) => {
    let searchText = $('#searchtext').val();
   /* let searchText = "<?php echo $Search; ?> "*/
    getMovies(searchText);
    e.preventDefault();
  });
});

// getMovies("hello");
function getMovies(searchText){
  axios.get('https://api.themoviedb.org/3/movie/popular?api_key=71759a6f915d65cb83e083babbf19d3f&language=en-US')
    .then((response) => {
          console.log(response);
        let movies = response.data.results;
          let output = '';
          $.each(movies, (index, movie) => {
            output += `
              <div class="col-lg-3 col-md-3 col-sm-4 col-6 ">
                <div class="img-thumbnail text-center mt-5">
                  <a href="#"><img src="https://image.tmdb.org/t/p/original/${movie.poster_path}"></a>
                  <h5>${movie.title}</h5>
                </div>
              </div>
            `;
          });

          $('#movies').html(output);
      })

    .catch((err) => {
      console.log(err);
    });
  }
 

$(document).ready(function (){

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
  // console.log(dict["slider1"]);

    if (window.location.href == 'http://localhost/showtime/index.php'){
      showMovies_Tv();
      async function showMovies_Tv() {
          for(var key in dict) {
            var flag = 0; 
            if (dict[key].includes("movie")){
              flag = 1;
            }

            const sliders = document.getElementById(key);
            var result = await axios.get('https://api.themoviedb.org/3/'+dict[key]+'?api_key=71759a6f915d65cb83e083babbf19d3f');
          
            result = result.data.results;
          
            result.map(function (cur, index) {
              sliders.insertAdjacentHTML(
                "beforeend",
                `<a href="showpage.php" onclick="showSelected(${cur.id},${flag})" ><img class="img-${index} slider-img" src="http://image.tmdb.org/t/p/w185/${cur.poster_path}" /></a> `
              );
            });
         }
          
      }
        // console.log(window.location.href);

    }
    if(window.location.href == 'http://localhost/showtime/showpage.php'){
      getShowInfo();
    }

});




// adult: false
// backdrop_path: "/fQq1FWp1rC89xDrRMuyFJdFUdMd.jpg"
// genre_ids: (2) [10749, 35]
// id: 761053
// original_language: "en"
// original_title: "Gabriel's Inferno Part III"
// overview: "The final part of the film adaption of the erotic romance novel Gabriel's Inferno written by an anonymous Canadian author under the pen name Sylvain Reynard."
// popularity: 36.21
// poster_path: "/fYtHxTxlhzD4QWfEbrC1rypysSD.jpg"
// release_date: "2020-11-19"
// title: "Gabriel's Inferno Part III"
// video: false
// vote_average: 9.1
// vote_count: 610

// https://image.tmdb.org/t/p/original/[poster_path]

// poster_sizes": [
//   "w92",
//   "w154",
//   "w185",
//   "w342",
//   "w500",
//   "w780",
//   "original"
// ],






function showSelected(id, flag){
  sessionStorage.setItem('movieId', id);
  sessionStorage.setItem('showtype', flag);

  // window.location = 'showpage.php';
  return false;
}

function getShowInfo(){
  let movieId = sessionStorage.getItem('movieId');
  let showtype = sessionStorage.getItem('showtype');
  var temp = '';
  if (showtype == 1){
     temp = 'movie'
  }
  else{
    temp = 'tv';
  }

  axios.get('https://api.themoviedb.org/3/'+temp+'/'+movieId+'?api_key=71759a6f915d65cb83e083babbf19d3f')
    .then((response) => {
      console.log(response.data);
      let movie = response.data;

      let output =`
        <div class="card mb-3" >
          <div class="row g-0">
            <div class="col-md-4 p-2">
              <img src="https://image.tmdb.org/t/p/original/${movie.poster_path}" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">${movie.title}</h5>
                <p class="card-text">${movie.overview}</p>
                <p class="card-text"><small class="text-muted">${movie.release_date}</small></p>
              </div>
            </div>
          </div>
        </div>
      `;
      // https://api.themoviedb.org/3/movie/157336?api_key={api_key}&append_to_response=videos,images

      $('#movie').html(output);

    })
    .catch((err) => {
      console.log(err);
    });
}
