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

    $id = (int)$_GET['id'];
     //echo $id;
    if(isset($_GET['id']))
    {
        
        $sql="SELECT * FROM customers WHERE id=$id";
        $result = mysqli_query($con,$sql);

        $row=mysqli_fetch_array($result);
    }
    
    

    if(isset($_POST['update'])){
 // variables for input data
    
    $id = $_POST['id'];
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
        if(strpos( $email, "@" ) < 1){
            $err_email = "Enter valid email.";
            $valid_input = false;
        }
    }
    
    if($valid_input){
        //
    $sql = "UPDATE `regform`.`customers` SET `username` = '$username', `password` = '$password', `f_name` = '$f_name',`l_name`='$l_name', `email` = '$email', `phone` = '$phone', `location` = '$location' WHERE `customers`.`id` = $id";

    mysqli_query($con,$sql);
    header('Location: index.php');
    exit();
        
    }
        else{            
            $id = $_POST['id'];            
            header('Location: update.php?id='.$id);
            
        }
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
            <h1>Update Details<a href="index.php" class="btn btn-success pull-right">Home</a></h1>    

        </div>


<form class="new_user" id="new_user" action="update.php" accept-charset="UTF-8" method="post">

    <div class="panel-body">
        <div class="form-group">
    <label for="user_Username" >Username</label>
    <input class="form-control form-control-lg" type="text" name="username" id="user_username" value="<?php echo $row['username'];?>" required
           oninvalid="this.setCustomValidity('Enter username.')"
           oninput="setCustomValidity('')"
           />
                  <span><?php echo $err_user ?></span>


  </div>
  <div class="form-group">
    <label for="user_Password" >Password</label>
    
    <input class="form-control form-control-lg" type="password" name="password" id="user_password" value="<?php echo $row['password']; ?>" required 
           oninvalid="this.setCustomValidity('Enter password.')"
           oninput="setCustomValidity('')"
           />
          <span><?php echo $err_pass ?></span>

  </div>
  <div class="form-group">
    <label for="user_Confirm Password">Confirm password</label>
    <input class="form-control" type="password" name="password_confirmation" id="user_password_confirmation" value="<?php echo $row['password']; ?>" required
           oninvalid="this.setCustomValidity('Confirm Password.')"
           oninput="setCustomValidity('')"
           />
      
          <span><?php echo $err_pass_confirm ?></span>

  </div>
  <div class="form-group">
    <label for="user_First Name">First name</label>
    <input class="form-control" type="text" name="f_name" id="user_f_name" value="<?php echo $row['f_name']; ?>" required
           oninvalid="this.setCustomValidity('Enter name.')"
           oninput="setCustomValidity('')"
           />
            <span><?php echo $err_f_name ?></span>

  </div>
  <div class="form-group">
    <label for="user_Last Name">Last name</label>
    <input class="form-control" type="text" name="l_name" id="user_lname" value="<?php echo $row['l_name'];?>" required
           oninvalid="this.setCustomValidity('Enter name.')"
           oninput="setCustomValidity('')"
           />
      
  </div>
  <div class="form-group">
    <label for="user_Email">Email</label>
    <input class="form-control" type="email" name="email" id="user_email" value="<?php echo $row['email']; ?>" required
           oninvalid="this.setCustomValidity('Enter email.')"
           oninput="setCustomValidity('')"
           />
            <span><?php echo $err_l_name ?></span>

  </div>
  <div class="form-group">
    <label for="user_Phone No">Phone no</label>
    <input class="form-control" type="number" name="phone" id="user_phone" value="<?php echo $row['phone'];?>" required
           oninvalid="this.setCustomValidity('Enter phone.')"
           oninput="setCustomValidity('')"
           />
            <span><?php echo $err_phone ?></span>

  </div>
  <div class="form-group">
    <label for="user_Location">Location</label>
    <input class="form-control" type="text" name="location" id="user_location" value="<?php echo $row['location']; ?>"
           required
           oninvalid="this.setCustomValidity('Enter location.')"
           oninput="setCustomValidity('')"
           />
      
            <span><?php echo $err_location ?></span>

  </div>
        <input name="id" type=hidden value="<?php echo $row['id'] ?>" required/>
  <div class="form-group">
    <!--a href="up.php?id=<?php echo $id ?>" class="btn btn-success">Update </a>
    <a href="index.php" class="btn btn-success"> Home</a-->
    <input type="submit" name="update" value="Update" class="btn btn-success  pull-left col-md-2" />
    <!--input type="submit" name="home" value="Home" class="btn btn-success  pull-right col-md-2" /-->
  
        
    </div>
    
</form>
</div>
</div>
    </div>
    </div>
    
    
    <footer>
        By Ketan D Ramteke.
    </footer>
</body>
</html>
