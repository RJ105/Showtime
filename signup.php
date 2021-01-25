<!DOCTYPE html>
<html>
<head>
    <title>signup</title>
</head>
<body>
    <?php
        include 'partials/header.php';
    ?>

    <br>
    <div class="container card col-md-6">
            
            <form >
                <div class="mb-3">
                    <label for="exampleInputname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="signupname" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="signupemail" name="email" aria-describedby="emailHelp" required>
                    <!-- <span class="text-danger" id="emailwarn"></span> -->
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signuppassword" name="password" autocomplete="false" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="signupcpassword" name="cpassword"  autocomplete="false" required>
                    <!-- <span id="passwordwarn"></span> -->

                </div>
                <p>
                <span class="text-danger" id="signupblankwarn"></span>
                </p>
                <button type="submit" class="btn btn-primary" id="signupsubmit" name="submit">Submit</button>
            </form>

            <div>

            </div>
    </div>

    <script>
    $(document).ready(function(){

            $("#signupsubmit").on('click',function(e){
                e.preventDefault();    // This prevents form from being sumbitted
                e.stopPropagation();
                // alert("hello");
                var name = $("#signupname").val();
                var email = $("#signupemail").val();
                var password = $("#signuppassword").val();
                var cpassword = $("#signupcpassword").val();
                if(name.length < 1 || email.length < 1 || password.length < 1 || cpassword.length < 1){
                    $("#signupblankwarn").text("Please fill the blanks !");
                }
                else{
                    $.ajax({
                    url : 'partials/phpaction.php',
                    method : 'POST',
                    dataType : 'text',
                    data : { submitted : 1, name : name, email: email, password : password, cpassword : cpassword },
                    success : function(response){
                        console.log(response);
                        if(response == '0'){
                            $("#signupblankwarn").text("Email already in use");
                        }
                        else if(response == '2') {
                            $("#signupblankwarn").text("password and confirm password doesnt match !!");
                        }
                        else{
                            window.location = 'index.php';
                        }
                    },
                    error: function(error) {
                    console.log(error);
                }
               });
                }
                
               return false;
            });
    });
    </script>

        <!-- id 4 ids and signupsubmit -->
</body>
</html>

