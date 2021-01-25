<?php
include 'dbconnect.php';

if(isset($_POST['submitted']))
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existsql = "select * from `User` where user_email = '$email'";
    $result = mysqli_query($conn,$existsql);
    // printf("error: %s\n", mysqli_error($conn));

    $numrows = mysqli_num_rows($result);

    if($numrows > 0)
    {
        // $error = "Email already in use";
        // header("Location:/forumajax/index.php?user already taken");
        exit('0');
    }
    else
		{
			if($password == $cpassword)
			{
				$hash = password_hash($password, PASSWORD_DEFAULT);

				$sql = "INSERT INTO `User` (`user_name`, `user_email`, `user_password`, `user_time`) VALUES ('$name', '$email', '$hash', current_timestamp())";


				$result = mysqli_query($conn,$sql);
				printf("error: %s\n", mysqli_error($conn));

				if($result)
				{
					exit('1');
				}

			}
			else
			{
                exit('2');
			}
		}

}


if(isset($_POST['loggedin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $existsql = "select * from `User` where user_email = '$email'";
    $result = mysqli_query($conn,$existsql);
   $numrows = mysqli_num_rows($result);


    if($numrows==1)
    {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['user_password']))
        {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['email'] = $row['user_email'];
            // echo $_SESSION['username'];
            // echo $_SESSION['email'];
            exit('1'); // successfull loggedd in
        }
        else
        {
            exit('0');      // invalid password
        }
    }
    else
    {
        exit('2');      // user does not exits

    }

}



if(isset($_POST['reviewed']))
{
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $showid = $_POST['movieid'];
    $showtype = $_POST['showtype'];
    $userid = $_POST['userid'];

    $sql = "INSERT INTO `Review` (`review_rating`, `review_desc`, `review_showid`, `review_showtype`, `review_userid`, `review_time`) VALUES ( '$rating', '$review', '$showid', '$showtype', '$userid', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
           // printf("error: %s\n", mysqli_error($conn));
        
        $sql = "SELECT `user_name` FROM `User` where user_id = $userid";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
                  // printf("error: %s\n", mysqli_error($conn));
        $username = $row['user_name'];

          $sql = "SELECT `review_rating`, `review_desc`, DATE_FORMAT(review_time,'%d-%m-%y') AS review_time  FROM `Review` order by review_id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
                    // printf("error: %s\n", mysqli_error($conn));
            $rating = $row['review_rating'];
            $review = $row['review_desc'];
            $posted = $row['review_time'];
                  echo '
                        <div class="card mb-3" >
                            <div class="card-body">
                                <h5 class="card-title">'.$review.'</h5>
                                <p>rating  : '.$rating.'</p>
                                <p class="card-text"><small class="text-muted"> ~ <strong> '.$username.'</strong> on '.$posted.'</small></p>
                            </div>
                        </div>
                       ';

        }
        else
        {
           exit(0);
        }
    exit();
}

if(isset($_POST['loadreviews']))
{
    $showid = $_POST['showid'];
    $sql = "SELECT `review_rating`, `review_desc`, `review_userid`, DATE_FORMAT(review_time,'%d-%m-%y') AS review_time  FROM `Review` where review_showid = $showid";
    $result = mysqli_query($conn,$sql);
    // printf("error: %s\n", mysqli_error($conn));
    $noresult = true;
    if($result)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $noresult = false;
        $rating = $row['review_rating'];
        $review = $row['review_desc'];
        $posted = $row['review_time'];
        $userid = $row['review_userid'];

          $namesql = "SELECT `user_name` FROM `User` where user_id = $userid";
          $nameresult = mysqli_query($conn,$namesql);
          $namerow = mysqli_fetch_assoc($nameresult);
          $username = $namerow['user_name'];


        echo '
            <div class="card mb-3" >
                <div class="card-body">
                    <h5 class="card-title">'.$review.'</h5>
                    <p>rating  : '.$rating.'</p>
                    <p class="card-text"><small class="text-muted"> ~ <strong> '.$username.'</strong> on '.$posted.'</small></p>
                </div>
            </div>
             ';
      }
    }

    if($noresult)
    {
      echo'
          <div class="card text-dark bg-light mb-3" id="noreview">
            <div class="card-header">No Review Found</div>
            <div class="card-body">
              <p class="card-text">Be the first to write a review</p>
            </div>
          </div>
          ';
    }
}



?>