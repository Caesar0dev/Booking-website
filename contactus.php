 <?php
include 'scripts/auth.php';
include 'scripts/upload.php';
?>

<!DOCTYPE html>
<head>
    <head>
    <meta charset="utf-8">
    <!--Bootstrap viewport settings for mobile first devlopment-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="contact us email phone ">
    <meta name="author" content="Shane Lucy">
    <title>Contact Us</title>

    <!--Bootstrap css-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Custom styles for this page -->
    <link href="scripts/styles.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-sm">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="homepage.php">Home            
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactus.php">Contact Us</a>
                <span class="sr-only">(current)</span>
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
            <h1>Contact Us</h1>
        </div>
        </div>
        
 
        <div class="row">
            <div class="col-sm-4">
                <p>Content goes here  <br>  Lorem ipsum dolor sit amet, ne eam vide quas aliquam, eos ei aperiri prompta, tota gloriatur temporibus eam ex. Vel viris vocibus epicuri ea. In nec sale labore, eirmod regione definiebas ex quo. Nam et impetus meliore. Ea case dicta theophrastus eum. Cum sale menandri an. Mei no tation nonumy sapientem. Pro no epicuri accusamus signiferumque, commodo constituto quo et, paulo omnes pri at. Sed ne impedit referrentur. Eam et dicunt sanctus fabellas, senserit consulatu torquatos est cu. Saepe possit sententiae at vel, ut mel soleat quaeque atomorum. Graece denique intellegam pro in, vel tibique dignissim an, vix nonumy tempor percipitur ex. Solum simul an pro.</p>
               
               
               
               <p><strong>Opening Hours &#x27AF; Mon-Sat 8-5</strong><p> 
               <p><strong>Email &#x27AF; example@gmail.com</strong><p> 
               <p><strong>Mobile &#x27AF; 07749586738</strong><p> 
            </div>
            
            <div class="col-sm-8" id="map">
            
            </div>
           
        </div>
        
       
    </div>
    </div>
    <!-- Script for Initialising Google Maps-->
         <script>
      function initMap() {
                      //input lattitude and longitude your garage 
        var yourGarage = {lat: 54.471643, lng: -7.631828};
        var map = new google.maps.Map(document.getElementById('map'), {
          //change zoom to adjust the base zoom of the map
          zoom: 12,
          center: yourGarage
        });
        var marker = new google.maps.Marker({
          position: yourGarage,
          map: map
        });
      }
    </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEhHsH4DIr9SG7NmhAU9g9f50MnqY02r8&callback=initMap"></script>
    
    
    <!--Bootstrap jQuery, popper and javascript scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="scripts/additional$.js"></script>
</body>
