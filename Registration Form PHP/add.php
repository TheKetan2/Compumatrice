<?php
include('db.php');

$err_user=null;
$err_pass=null;
$err_pass_confirm=null;
$err_f_name=null;
$err_l_name=null;
$err_email=null;
$err_phone=null;
$err_location=null;

$valid_input = true;

if(isset($_POST['save']))
{
 // variables for input data
    
    
    
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password_confirmation'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    
    if(empty($username)){
        $err_user = "Enter Username";
        $valid_input = false;
    }
    if(empty($password)){
        $err_pass = "Enter Password";
        $valid_input = false;
    }
    
    if(strcmp($password,$confirm_password)!=0){
        $err_pass_confirm = "Both Password Did Not Match.";
        $valid_input = false;
    }
    if(empty($f_name)){
        $err_f_name = "Enter Name";
        $valid_input = false;
    }
    if(empty($l_name)){
        $err_l_name = "Enter Last";
        $valid_input = false;
    }
    if(empty($phone)){
        $err_phone = "Enter Phone Number";
        $valid_input = false;
    }
    if(empty($location)){
        $err_location = "Enter location";
        $valid_input = false;
    }    
    
    if(empty($email)){
        $err_email = "Enter email.";
        
        $valid_input = false;
    }
    else{
        if(strpos( $email, "@" ) !== 1){
            $err_email = "Enter valid email.";
        }
    }
    
    
    
    if($valid_input){
        $sql = "INSERT INTO customers(username,password,f_name,l_name,email,phone,location) VALUES('$username','$password','$f_name',
        '$l_name','$email','$phone','$location')";
        mysqli_query($con,$sql);
        header('Location: index.php');
        exit();
        
    }
    
        
 
}
if(isset($_POST['reset'])){
    header('Location : add.php');
    
    exit();
}




?>
<!DOCTYPE html>
<html>
<head>
  <title>Compumatrice</title>
  <link rel="stylesheet" media="all" href="./css/bootstrap.min.css"/>
  <link rel="stylesheet" media="all" href="./css/style.css"/>
<link rel="stylesheet" media="all" href="./css/font-awesome.css"/>
  </head>
<body class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="https://www.facebook.com/ketan.ramteke.794"><i class="fa fa-facebook-square" aria-hidden="true"></i> Ketan</a>
    </div>
      </div>
</nav>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <div class="panel panel-success">
        <div class="panel-heading"> 
<h1>Registration Form<a href="index.php" class="btn btn-success pull-right">Home</a> </h1>        
            </div>

<div class="panel-body">
    <form class="new_user" id="new_user" action="add.php" accept-charset="UTF-8" method="post">

  <div class="form-group">
    <label for="user_Username">Username</label><br>
    <input class="form-control" type="text" name="username" id="user_username" required
           oninvalid="this.setCustomValidity('Enter Username.')"
           oninput="setCustomValidity('')"
/>
  </div>
  <div class="form-group">
    <label for="user_Password">Password</label><br>
    <input class="form-control" type="password" name="password" id="user_password" required 
           oninvalid="this.setCustomValidity('Enter password.')"
           oninput="setCustomValidity('')"

/>
  </div>
  <div class="form-group">
    <label for="user_Confirm Password">Confirm password</label><br>
    <input class="form-control" type="password" name="password_confirmation" id="user_password_confirmation" required
           oninvalid="this.setCustomValidity('<?php echo $err_pass_confirm ?>')"
           oninput="setCustomValidity('')"

           />
    <span><?php echo $err_pass_confirm ?></span>
  </div>
  <div class="form-group">
    <label for="user_First Name">First name</label><br>
    <input class="form-control" type="text" name="f_name" id="user_f_name" required
           oninvalid="this.setCustomValidity('Enter First Name.')"
           oninput="setCustomValidity('')"
           />
  </div>
  <div class="form-group">
    <label for="user_Last Name">Last name</label><br>
    <input class="form-control" type="text" name="l_name" id="user_lname" required
           oninvalid="this.setCustomValidity('Enter Last.')"
           oninput="setCustomValidity('')"
           />
  </div>
  <div class="form-group">
    <label for="user_Email">Email</label><br>
    <input class="form-control" type="email" name="email" id="user_email" required
           oninvalid="this.setCustomValidity('Enter email.')"
           oninput="setCustomValidity('')"
           />
          <span><?php echo $err_email ?></span>

  </div>
  <div class="form-group">
    <label for="user_Phone No">Phone no</label><br>
    <input class="form-control" type="number" name="phone" id="user_phone" required
           oninvalid="this.setCustomValidity('Enter phone number.')"
           oninput="setCustomValidity('')"
           />
      
  </div>
  <div class="form-group">
    <label for="user_Location">Location</label><br>
    <input class="form-control" type="text" name="location" id="user_location" required
           oninvalid="this.setCustomValidity('Enter location.')"
           oninput="setCustomValidity('')"
           />
      
  </div>
  <div class="form-group">
    <input type="submit" name="save" value="Save" class="btn btn-success  pull-left col-md-2" />
    <!--input type="submit" name="reset" value="Reset" class="btn btn-success  pull-right col-md-2" /-->
    <a href="add.php" class="btn btn-success pull-right"> Reset</a>
</form>
</div>
                </div>
</div>
</div>
    </div>
</body>
</html>
