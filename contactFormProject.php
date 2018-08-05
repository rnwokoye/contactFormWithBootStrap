<?php
    //Here we do the server side validations. 

   $error =""; 
   $successMessage = ""; 
   
    //check to see if there is a post.
    if($_POST) {

        $error = ""; 

        if (!$_POST["email"]) {

            $error .= "<br>An email address is required."; 

        }
        if (!$_POST["subject"]) {

            $error .= "<br>Subject is required."; 
            
        }
        if (!$_POST["content"]) {

            $error .= "<br>Content cannot be empty."; 
            
        }
        //Check that the email address supplied is valid. Code was copied.
        if ($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $error .= "Email address is not valid! Try again!<br>";
           
        }
        //check if errors in our error string.

        if ($error != "") {

            $error = '<div class="alert alert-danger" role="alert"><strong>There were error(s) in your message:</strong>' . $error . '</div>'; 

        } else {

            $emailTo = "me@example.com";

            $subject = $_POST["subject"]; 

            $content = $_POST["content"]; 

            $headers = "From: ".$POST["email"]; 

            if (mail($emailTo, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert"><strong>Your message has been sent, we\'ll get back to you ASAP</div>';

            // if errors in sending message     
            } else {

                $error = '<div class="alert alert-danger" role="alert">Your message could not be sent. Pls try again later.</strong></div>';

            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Contact Form!</title>
  </head>
  <body>
    <div class="container">
        <h1>Get in Touch!</h1>

        <!-- we also include php tags so as to add our php server side error msges. -->
        <div id="error"><? echo $error.$successMessage; ?></div> 

        <form method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="content">What would you like to ask us?</label>
                <textarea class="form-control" id="content" name="content"rows="3"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <script type="text/javascript">
        // This code prevent form submit so we do our client side validation in jQuery
        $("form").submit(function(e){

            var error ="";

            if ($("#email").val() == "") {

                error+= "<br>The email field is required.";
            }

            if ($("#subject").val() == "") {

                error+= "<br>The subject field is required.";
            }
            if ($("#content").val() == "") {

                error+= "<br>The content field is required.";
            }
            
            //created an empty div for the error, and then set that div's inner html to the error variable. 
            
            if (error != "") {

                $("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s) in your message:</strong>' + error + '</div>'); 

                return false; 
                
            }  else {
                
                return true; 
             
            }
             });
        
        </script>
  </body>
</html>