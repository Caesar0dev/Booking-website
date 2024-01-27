 <?php
include 'scripts/auth.php';
include 'scripts/upload.php';
include 'scripts/downloads.php';
include 'scripts/booking.php';
?>

<!DOCTYPE html>
<head>
    <head>
    <meta charset="utf-8">
    <!--Bootstrap viewport settings for mobile first devlopment-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="garage template booking website local mechnaics friendly service competitve prices quality work">
    <meta name="author" content="Shane Lucy">
    <title>Homepage</title>

    <!-- Bootstrap css-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Custom styles for this page -->
    <link href="scripts/styles.css" rel="stylesheet">
 
</head>
<body>
<!-- Facebook profile javascript SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=565979043757060&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <nav class="navbar navbar-expand-sm">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="homepage.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactus.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
          </ul>
        </div>
          <ul class="navbar-nav">
      <li class="nav-item">
              <a class="nav-link justify-content-end" href="account.php">Account</a>
            </li> 
            <!--This is just for layout purposes-->
            <li class="nav-item">
            <a class="nav-link justify-content-end">|</a>
            </li>
            <li class="nav-item">
              <a class="nav-link justify-content-end" href="scripts/logout.php">Logout</a>
            </li>
            </ul>
      </div>
    </nav>
    <br>

 
   


<!-- Setting up bootstrap grid using rows and colums for layout-->
 <div class="container">
 
    <div class="row">
        <div class="col">
            <h1>Homepage</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

<button type="submit" class="btn btn-primary" name="Download" data-toggle="tooltip" title="This button won't be present in your download">Download Website</button>
</form>
        </div>
        </div>
        
 
        <div class="row">
            <div class="col">
                <p>Content goes here  <br>  Lorem ipsum dolor sit amet, ne eam vide quas aliquam, eos ei aperiri prompta, tota gloriatur temporibus eam ex. Vel viris vocibus epicuri ea. In nec sale labore, eirmod regione definiebas ex quo. Nam et impetus meliore. Ea case dicta theophrastus eum. Cum sale menandri an. Mei no tation nonumy sapientem. Pro no epicuri accusamus signiferumque, commodo constituto quo et, paulo omnes pri at. Sed ne impedit referrentur. Eam et dicunt sanctus fabellas, senserit consulatu torquatos est cu. Saepe possit sententiae at vel, ut mel soleat quaeque atomorum. Graece denique intellegam pro in, vel tibique dignissim an, vix nonumy tempor percipitur ex. Solum simul an pro.</p>
                

               
               
               <!--Booking Form-->
               <div class="jumbotron">
  <h3>Book an Appointment for your vehicle:</h3>
  <label>* Indicates a Required Field</label>
   <!--Post method used to prevent form data from appearing in the URL & htmlspecialchars to prevent XSS-->
              <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
              <div class="form-row">
                      <div class="col">
                          <div class="form-group">   
        <label for="numberPlate">Number Plate: *</label>
        <input type="text" class="form-control" id="numberPlate" placeholder="Number Plate" data-toggle="tooltip" title="May only contain letters numbers and spaces" name="numberPlate" value="<?php echo $numberPlate; ?>">
         <span><?php echo $errors[numberPlate];?></span>


        </div>
        </div>

        <div class="col"><div class="form-group">
        <label for="date">Appointment Date: *</label>
        <input type="date" class="form-control" id="date" placeholder="Appointment Date" name="date" value="<?php echo $dateOfAppointment; ?>">
         <span><?php echo $errors[date];?></span>

        </div>
                      </div>
                      </div>
              
              <div class="form-row">
              <div class="col">
              <div class="form-group">
                          <label for="time">Appointment Time: *</label>
        <input type="time" class="form-control" id="time" placeholder="Appointment Time"  name="time" value="<?php echo $timeOfAppointment; ?>">
                 <span><?php echo $errors[time];?></span>
                          


        </div>

        </div>
        <div class="col">
                          <div class="form-group">
        <label for="fault">Description of Fault: *</label> <br>
        <textarea rows="4" cols="50" name="fault" data-toggle="tooltip" title="May only contain letters spaces , and '" placeholder="Enter a description of your fault here"></textarea>
                 <span><?php echo $errors[fault];?></span>

                          
                          </div>
                          </div>

              
              </div>
                                       <button type="submit" class="btn btn-primary" name="Booking">Submit</button>
                                        <span><?php echo $message;?></span>


              </form>
              </div> <br>
                               
            </div>
                                                            <!-- Insert your facebook url here-->                                  <!--Delete these to remove from widget-->
            <div class="fb-page col-sm-3" data-href="https://www.facebook.com/FacebookUK/?ref=br_rs&brand_redir=20531316728" data-tabs="timeline,events,messages" data-small header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                  <!-- Insert your facebook url here-->                                     
            <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
             <!-- Insert your facebook url here-->     <!--Insert profile name here-->
            <a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
           
        </div>
    </div>
    </div>
    
         
    
    
    <!--Bootstrap jQuery, popper and javascript scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="scripts/additional$.js"></script>



</body>
