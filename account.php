 <?php
include 'scripts/auth.php';
include 'scripts/vehicle.php';
include 'scripts/dbConn.php';
include 'scripts/removeVehicle.php';
include 'scripts/cancelBooking.php';

		
?>
<!DOCTYPE html>

<head>

    <head>
        <meta charset="utf-8">
        <!--Bootstrap viewport settings for mobile first devlopment-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="garage template booking website my account profile register vehicle delete record">
        <meta name="author" content="Shane Lucy">
        <title>
            <?php echo $_SESSION['username'];?>`s Account</title>

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
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">Services</a>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link justify-content-end" href="account.php">Account</a>
                        <span class="sr-only">(current)</span>
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
                <div class="col-sm-6" id="avatar">
                    <h2>Hi <?php echo $_SESSION['username'];?></h2>
                    <img src='<?= $_SESSION['avatar'] ?>'>
                    
                    <br>
                    <h5>Vehicles Registered With Us:</h5>
                    <?php include 'scripts/displayVehicles.php';?>
                        <hr>

                        <h5>Delete a Vehicle From Our Records:</h5>
                        <!--Form for deleting a vehicle-->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <label for="delete">Enter Number Plate Below:</label>
                            <br>
                            <?php  echo $messageError; echo $messageDelete;?>
                                <input type="text" class="form-control" id="delete" placeholder="Number Plate" data-toggle="tooltip" title="Check this matches a number plate above" name="delete">
                                <br>
                                <button type="submit" class="btn btn-primary" name="Delete">Remove Vehicle</button>
                        </form>

                        <hr>
                        <h5>Vehicles booked in for appointment:</h5>
                        <?php include 'scripts/displayBookings.php';?>
                        <hr>
                        
                        <h5> Cancel an Appointment:</h5>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <label for="delete">Enter Booking Ref Below:</label>
                            <br>
                            <?php echo $messageSuccess; echo $messageCancelError;?>
                           
                                <input type="text" class="form-control" id="cancel" data-toggle="tooltip" title="Check this matches a booking ref above" placeholder="Booking Ref" name="cancel">
                                <br>
                                <button type="submit" class="btn btn-primary" name="Cancel">Cancel Appointment</button>
                        </form>

                </div>

                <div class="col-sm-6">

                    <div class="jumbotron">
                        <h3>Register a Vehicle</h3>
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

                                <div class="col">
                                    <div class="form-group">
                                        <label for="make">Make: *</label>
                                        <input type="text" class="form-control" id="make" placeholder="Make" data-toggle="tooltip" title="May only contain letters" name="make" value="<?php echo $make; ?>">
                                        <span><?php echo $errors[make];?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="model">Model: *</label>
                                        <input type="text" class="form-control" id="model" placeholder="Model" data-toggle="tooltip" title="May only contain letters numbers and spaces" name="model" value="<?php echo $model; ?>">
                                        <span><?php echo $errors[model];?></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="colour">Colour: *</label>
                                        <input type="text" class="form-control" id="colour" placeholder="Colour" data-toggle="tooltip" title="May only contain letters" name="colour" value="<?php echo $colour; ?>">
                                        <span><?php echo $errors[colour];?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="yearOfManufacture">Year of Manufacture: *</label>
                                        <input type="text" class="form-control" id="yearOfManufacture" placeholder="Year of Manufacture"data-toggle="tooltip" title="May only contain 4 digits" name="yearOfManufacture" value="<?php echo $yearOfManufacture; ?>">
                                        <span><?php echo $errors[yearOfManufacture];?></span>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="fuel">Fuel: *</label>
                                        <select name="fuel" id="fuel" class="form-control">
                                            <option value="petrol">Petrol</option>
                                            <option value="diesel">Diesel</option>
                                            <option value="electric">Electric</option>
                                            <option value="hybrid">Hybrid</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="motRenewal">M.O.T Renewal Date: *</label>
                                        <input type="date" class="form-control" id="motRenewal" placeholder="M.O.T Renewal Date" name="motRenewal" value="<?php echo $motRenewal; ?>">
                                        <?php echo $errors[motRenewal];?>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="transmission">Transmission: *</label>
                                        <select name="transmission" id="transmission" class="form-control">
                                            <option value="manual">Manual</option>
                                            <option value="automatic">Automatic</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="Register">Submit</button>

                            <span><?php echo $message;?></span>

                        </form>
                    </div>
                    
               
                        
                        
                </div>
                
                 
            </div>

        </div>

        <!--Bootstrap jQuery, popper and javascript scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!--Script for editing html-->
        <script src="scripts/additional$.js"></script>
    </body>
