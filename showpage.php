<!DOCTYPE html>
<html>
<head>
	<title></title>
    <!--     font css -->
<link rel="stylesheet" type="text/css" href="css/all.css">

</head>
<body>
    <?php
        include 'partials/header.php';
        // function bookmark($userid,$showid){
        //     global $conn;
        //     echo gettype($userid);
        //     echo gettype($showid);
        //     $sql = " SELECT * FROM `Bookmark` where bookmark_userid = $userid and bookmark_showid = $showid";
        //     $result = mysqli_query($conn,$sql);
        //     printf("error: %s\n", mysqli_error($conn));
        //     $rows = mysqli_num_rows($result);
        //     echo $rows;
        //         if($rows > 0)
        //         {
        //           return true;
        //         } 
        //         else
        //         {
        //           return false;
        //         }
        //     }
    ?>

    <div class="container">
        <br>
        <div id="moviedetails">
        </div>

        
            <?php
            $user_id = 1;
            if(isset($_SESSION['username']))
            {
                $user_id = $_SESSION['user_id'];

                echo $showid = "<script>sessionStorage.getItem('movieId')</script>";
                $showid = (int)$showid;
                $user_id = (int)$user_id;
                // echo '<div>';
                // if(bookmark($user_id, $showid)) 
                //     echo'<a href="javascript:void(0)"><i class="fas fa-bookmark like-btn"   ></i></a>';
                // else echo'<a href="javascript:void(0)"><i class="far fa-bookmark like-btn" ></i></a>';
                // echo ' </div>';
                echo '
                    <div class="card card-body bg-light my-4 ">
                        <div>
                            <label  class="form-label"><h5>Enter Rating :</h5></label>
                            <input type="number" min="0" max="10" class="form-control col-md-2" id="rating" placeholder="between 1 and 10"></input>
                                <p id="ratingwarn" class="text-danger"></p>

                            <label  class="form-label"><h5>Write Review :</h5></label>
                            <textarea class="form-control my-2" id="review" rows="3" placeholder="Review should be more than 5 letters"></textarea>                        
                            <div id="reviewwarn" class="text-danger"></div>
                            <button type="submit" class="btn btn-primary mx-2" id="reviewpost">Submit</button>
                        </div>    
                    </div>
                <div id="postresponse"></div>
                ';
            }
        
            else
            {
                echo '<p class="alert alert-danger"  role="alert">please login to post a review</p>';
            }
            ?>

        <hr>
            <h2 class="text-center">Reviews</h2>
            <div id="loadreviews">
              
              </div>

        </div>

    <script>
            $(document).ready(function(){

                let movieid = sessionStorage.getItem('movieId');
                let showtype = sessionStorage.getItem('showtype');
                console.log(movieid, showtype);
                $("#loadreviews").load('partials/phpaction.php',{loadreviews: 1, showid: movieid});
          
            

            $("#reviewpost").on('click',function(){
            
            var rating = $("#rating").val();
            var review = $("#review").val();
            if(rating.length < 1){
                $("#ratingwarn").text("Please enter a number between 1 to 10 "); 
                return false;
            }
            else{
                rating = parseFloat(rating);
                if(rating<0 || rating >10){
                    $("#ratingwarn").text("Please enter a number between 1 to 10 "); 
                    return false;
                }
                else{
                    rating = rating.toFixed(1);
                }
            }

            if(review.length < 5)
            {
            $("#reviewwarn").text("Please check your input and increase its length !! ");
            }
            else{
                    if(review.search("'") != -1 )
                    {
                        $("#reviewwarn").text("Please remove ' (single quote) from the review ");
                    }

                else
                    {
                        var userid = <?php echo $user_id ?>;
                        console.log(movieid,userid,rating);
                        $.ajax({

                            url : 'partials/phpaction.php',
                            method : 'POST',
                            dataType : 'text',
                            data : { reviewed : 1,rating: rating, review: review, movieid: movieid, showtype: showtype, userid : userid },
                            success : function(response){
                                $("#rating").val("");
                                $("#review").val("");
                                $("#postresponse").html('<p class="alert alert-success"> Review posted Successfully !</p>');
                                $("#loadreviews").prepend(response);
                                $("#noreview").hide();
                            }
                        });
                    }
                }
            return false;
            });
     });
    </script>

    <!-- ids : moviedetails -->
</body>
</html>
