<?php
session_start();
include 'scripts/signup.php';
include 'scripts/login.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <!--Bootstrap viewport settings for mobile first devlopment-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Garage template booking website login or create account">
    <meta name="author" content="Shane Lucy">
    <title>Login Or Create Account</title>

    <!--Bootstrap css-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="scripts/styles.css" rel="stylesheet">
    
</head> 
    <body>
        <div class="container" id="content">
        <div class="row">
        <h1>Local Mechanics</h1>
 <br><br>
        </div>
                   <!--This row contains the signup and login forms--> 
         <div class="row">
            <div class="col-sm-7">
            <div class="jumbotron">
  <h3>Create An Account</h3>
  <label>* Indicates a Required Field</label>
   <!--Post method used to prevent form data from appearing in the URL & htmlspecialchars to prevent XSS-->
              <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
  <!--Form is split into rows with each row containing 2 input fields-->
      <div class="form-row">
          <div class="col">
              <div class="form-group"><label for="fName">First Name: *</label>                              
     <input type="text" class="form-control" id="fName"  placeholder="Enter First Name" data-toggle="tooltip" title="May only contain letters" name="fName" value="<?php echo $fName; ?>">         
      <span><?php echo $errors[fName];?></span>
          </div>
              </div>

    
  <div class="col">
      <div class="form-group">
    <label for="sName">Surname: *</label>
    <input type="text" class="form-control" id="sName" placeholder="Enter Surname" data-toggle="tooltip" title="May only contain letters" name="sName" value="<?php echo $sName; ?>">
          <span><?php echo $errors[sName];?></span>
  </div>
      </div>
  
      </div>
                  <div class="form-row">
                      <div class="col">
                          <div class="form-group">
    <label for="Address">Address: *</label>
    <input type="text" class="form-control" id="Address"  placeholder="Enter Address" data-toggle="tooltip" title="May only contain letters, numbers and spaces" name="Address" value="<?php echo $Address; ?>">
            <span><?php echo $errors[Address];?></span>
  </div>
      </div>
                      <div class="col"><div class="form-group">
    <label for="County">County: *</label>
    <input type="text" class="form-control" id="County" placeholder="Enter County" data-toggle="tooltip" title="May only contain letters" name="County" value="<?php echo $County; ?>">
            <span><?php echo $errors[County];?></span>   
  </div>
                      </div>
                      </div>
      
  
  
                  <div class="form-row">
                      <div class="col">
                          <div class="form-group">
    <label for="Postcode">Postcode:</label>
    <input type="text" class="form-control" id="Postcode"  placeholder="Enter Postcode" data-toggle="tooltip" title="May only contain letters, numbers and spaces" name="Postcode" value="<?php echo $Postcode; ?>">
            <span><?php echo $errors[Postcode];?></span>
  </div>
                     </div>
                      <div class="col"><div class="form-group">
    <label for="contactNo">Contact Number: *</label>
    <input type="text" class="form-control" id="contactNo" placeholder="Enter Contact Number" data-toggle="tooltip" title="May only contain numbers" name="contactNo" value="<?php echo $contactNo; ?>">
            <span><?php echo $errors[contactNo];?></span>
  </div>
                      </div>
                      </div>
   
  
                  <div class="form-row">
                      <div class="col"><div class="form-group">
    <label for="Email">Email: *</label>
    <input type="email" class="form-control" id="Email"  placeholder="Enter Email" name="Email" value="<?php echo $Email; ?>">
            <span><?php echo $errors[Email];?></span>
  </div>
                      </div>
                      <div class="col"><div class="form-group">
    <label for="Password">Password: *</label>
    <input type="password" class="form-control" id="Password" placeholder="Enter Password" data-toggle="tooltip" title="Minimum 8 characters" name="Password">
            <span><?php echo $errors[Password];?></span>
  </div>
                      </div>
                      </div>
                  
                   <div class="form-row">
                      
                      <div class="col">
                          <div class="form-group"> 
                                                <button type="submit" class="btn btn-primary" name="Register">Submit</button>

                          </div>
                      </div>
                     
                      <div class="col">
                      <div class="form-group">
                      <label for="Avatar">Avatar:</label>
                          <input type="file" name="image" id="image">
                          <span><?php echo $errorsImage[ext]; echo $errorsImage[imageEmpty]; echo $errorsImage[image]; echo $errorsImage[size]; echo $errorsImage[width]; echo $errorsImage[height];?></span>
                      </div>
                      </div>
                          
                      
                      <?php echo $message;?>
                      
                    
                      </div>
    
  
                  
    

</form>
</div>
               
             </div>
             <div class="col-sm-5">
             
             <div class="jumbotron">
  <h3>Log In</h3>
  <label>* Indicates a Required Field</label>
  <form id="loginForm" method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                 <div class="form-row">
                     <div class="col">
                         <div class="form-group">
      <label for="loginEmail">Email: *</label>
        <input type="email" class="form-control" id="loginEmail" placeholder="Email" name="loginEmail">
        
       
      
    </div>
                     </div>
                 </div>
                 
                    <div class="form-row">
                    <div class="col"> 
                        <div class="form-group">
      <label for="loginPassword">Password: *</label>
    
        <input type="password" class="form-control" id="loginPassword" data-toggle="tooltip" title="Must Contain 8 Characters" placeholder="Password" name="loginPassword">
     
    </div>
                        </div>
                    </div>
    
   
   
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
      <span><?php echo $Error;?></span>
        <div class="col">
           <button type="submit" class="btn btn-primary" name="Login">Sign in</button>
           
           
           </div>
          
      </div>
           
    </div>
    
  </form>
 
</div>
                
  
 
             </div>
            </div>
        
  
</div>


<!--Bootstrap jQuery, popper and javascript scripts -->       
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
<script src="scripts/additional$.js"></script>
      
    </body>
