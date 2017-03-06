<?php include('db.php');?> 
<?php 
    //create select query
    $sql = "SELECT * FROM customers ORDER BY id DESC";
    $result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Compumatrice</title>
  <link rel="stylesheet" media="all" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" media="all" href="./css/font-awesome.css"/>
  </head>
<body class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="https://www.facebook.com/ketan.ramteke.794"><i class="fa fa-facebook-square" aria-hidden="true"></i>  Ketan</a>
    </div>
      </div>
</nav>
<div class="row">
    <div class="col-md-8 col-md-offset-2">


<h1>Listing Users
    
    <a class="btn btn-primary pull-right" href="add.php">Add New User</a></h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Location</th>
      <th colspan="3"></th>
    </tr>
  </thead>
    
  <tbody>
      <?php while($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?php echo $row['f_name']?></td>
        <td><?php echo $row['l_name']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['phone']?></td>
        <td><?php echo $row['location']?></td>
        <td><a class="btn btn-success" href="update.php?id=<?php echo $row['id']?>">Edit</a></td>
        <td><td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']?>" >Delete</a></td>
      </tr>
      <?php endwhile; ?>
      
  </tbody>
</table>

<br>



</div>
    
    </div>
    
    
</body>
</html>
