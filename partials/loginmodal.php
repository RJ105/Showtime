
<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Login </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

            
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="loginemail" name="email" aria-describedby="emailHelp"  >
                    <span class="text-danger fader" id="loginemailwarn"></span>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginpassword" name="password" autocomplete="off" >
                    <span class="text-danger fader" id="loginpasswordwarn"></span>
                </div>
                <p>
                <span class="text-danger fader" id="blankwarn"></span>
                </p>

                <button type="submit" class="btn btn-primary" name="submit" onclick="loginvalidation()" >Submit</button>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">

  function loginvalidation()
  {   
    //   alert("hello this is login modal");
      var email = $("#loginemail").val();
      var password = $("#loginpassword").val();
      if(email.length <1 || password <1){
        $("#blankwarn").text("Please fill the blank spaces");
      }   
       else
       {
                $.ajax({
                url : 'partials/phpaction.php',
                method : 'POST',
                dataType : 'text',
                data : { loggedin: 1, email: email, password: password},
                success : function(response){
                    console.log(response);
                    if(response == "1"){
                        window.location = window.location.href;
                    }
                    else if(response == "0"){
                        $("#loginpasswordwarn").text("Invalid password");
                    }
                    else if(response == "2"){
                        $("#loginemailwarn").text("Invalid email");
                    }
                }
            });
        } 

  }  
</script>

