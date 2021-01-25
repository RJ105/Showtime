
// getMovies("hello");
function getSearchResult(filter){
  let searchquery = sessionStorage.getItem('searchquery');
  console.log(searchquery);
  console.log(filter);

  axios.get('https://api.themoviedb.org/3/search/'+filter+'?api_key=71759a6f915d65cb83e083babbf19d3f&language=en-US&include_adult=false&query='+searchquery)
    .then((response) => {
          console.log(response.data.results);
        let movies = response.data.results;
        var flag =1,name;
          let output = '';
          if (movies.length == 0){
            output = '<h1>No Result Found :(</h1> ';
          }
          $.each(movies, (index, movie) => {
            if(movie.title != null){
              flag = 1;
              name = movie.title;
            }
            else if (movie.original_name != null){
              flag = 0;
              name = movie.original_name;
            }
            output += `
              <div class="col-lg-3 col-md-3 col-sm-4 col-6 ">
                <div class="img-thumbnail text-center mt-5">
                  <a href="#" onclick="showSelected(${movie.id},${flag})"><img src="https://image.tmdb.org/t/p/original/${movie.poster_path}"></a>
                  <h5>${name}</h5>

                </div>
              </div>
            `;
          });

          $('#result').html(output);
      })

    .catch((err) => {
      console.log(err);
    });
  }
 

$(document).ready(function (){


    if(window.location.href == 'http://localhost/showtime/showpage.php'){
      var arr ;
      arr = getShowInfo();
    }

});


async function showMovies_Tv(dict) {
  for(var key in dict) {
    var flag = 0; 
    if (dict[key].includes("movie")){
      flag = 1;
    }

    const sliders = document.getElementById(key);
    var result = await axios.get('https://api.themoviedb.org/3/'+dict[key]+'?api_key=71759a6f915d65cb83e083babbf19d3f');
  
    result = result.data.results;
    // console.log(result)
    result.map(function (cur, index) {
      sliders.insertAdjacentHTML(
        "beforeend",
        `<a href="javascript:void(0)" onclick="showSelected(${cur.id},${flag})" ><img class="img-${index} slider-img" src="http://image.tmdb.org/t/p/w185/${cur.poster_path}" /></a> `
      );
    });
 }
  
}

function getMoviesByType(type, page){
  console.log(type,page);
  axios.get('https://api.themoviedb.org/3/movie/'+type+'?api_key=71759a6f915d65cb83e083babbf19d3f&language=en-US&page='+page)
  .then((response) => {
        console.log(response);
      let movies = response.data.results;
        let output = '';
        $.each(movies, (index, movie) => {
          output += `
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 ">
              <div class="img-thumbnail text-center mt-5">
                <a href="#" onclick="showSelected(${movie.id},1)"><img src="https://image.tmdb.org/t/p/original/${movie.poster_path}"></a>
                <h5>${movie.title}</h5>
              </div>
            </div>
          `;
        });

        $('#movielist').html(output);
    })

  .catch((err) => {
    console.log(err);
  });

}


function getTvshowByType(type, page){
  console.log(type,page);
  axios.get('https://api.themoviedb.org/3/tv/'+type+'?api_key=71759a6f915d65cb83e083babbf19d3f&language=en-US&page='+page)
  .then((response) => {
        console.log(response.data.results);
      let movies = response.data.results;
        let output = '';
        $.each(movies, (index, movie) => {
          output += `
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 ">
              <div class="img-thumbnail text-center mt-5">
                <a href="#" onclick="showSelected(${movie.id},0)"><img src="https://image.tmdb.org/t/p/original/${movie.poster_path}"></a>
                <h5>${movie.original_name}</h5>
              </div>
            </div>
          `;
        });

        $('#movielist').html(output);
    })

  .catch((err) => {
    console.log(err);
  });

}

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

  window.location = 'showpage.php';
  return false;
}

function getShowInfo(){
  let movieId = sessionStorage.getItem('movieId');
  let showtype = sessionStorage.getItem('showtype');
  var temp = '';
  if (showtype == 1){
     temp = 'movie'
  }
  else if (showtype == 0) {
    temp = 'tv';
  }
  

  axios.get('https://api.themoviedb.org/3/'+temp+'/'+movieId+'?api_key=71759a6f915d65cb83e083babbf19d3f')
    .then((response) => {
      console.log(response.data);
      let movie = response.data;
      var genre = [];
      var i;
      let output = '';
      for (i = 0; i < (movie.genres.length); i++) {
        genre.push(movie.genres[i].name);
      }
      let g = genre.join(', ');
      if (showtype==1){

       
             output =`
              <div class="card mb-3" >
                <div class="row g-0">
                  <div class="col-md-4 py-2 pl-4">
                    <img src="https://image.tmdb.org/t/p/original/${movie.poster_path}" alt="..." style="position: relative">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">${movie.title}</h5>
                      <p class="card-text">${movie.overview}</p>
                      <p class="card-text">Realease date :<small class="text-muted"> ${movie.release_date}</small></p>
                      <hr>
                      <p class="card-text">Genres : ${g}</p>
                      <p class="card-text">Runtime : ${movie.runtime} min</p>


                    </div>
                  </div>
                </div>
              </div>
            `;
        }

        else{
          output =`
          <div class="card mb-3" >
            <div class="row g-0">
              <div class="col-md-4 py-2 pl-4">
                <img src="https://image.tmdb.org/t/p/original/${movie.poster_path}" alt="..." style="position: relative">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">${movie.original_name}</h5>
                  <p class="card-text">${movie.overview}</p>
                  <p class="card-text">Released Date : <small class="text-muted">${movie.first_air_date}</small></p>
                  <hr>
                  <p class="card-text">Genres : ${g}</p>
                  <p class="card-text"> Total Seasons ${movie.number_of_seasons}</p>
                  <p class="card-text">Toatl Episodes ${movie.number_of_episodes}</p>


                </div>
              </div>
            </div>
          </div>
        `;
        }
      // https://api.themoviedb.org/3/movie/157336?api_key={api_key}&append_to_response=videos,images

      $('#moviedetails').html(output);

    })
    .catch((err) => {
      console.log(err);
    });

    return [movieId, showtype];
}



              // -------------------------------------------------------------------------------------




