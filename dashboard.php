<?php
session_start();
include('config.php');
$sql = "SELECT * FROM videodata";
$result = mysqli_query($con,$sql);
if(!$_SESSION['utype']){
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Code Gama</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="#">Option</a>
      <a class="nav-link" href="#">About_Us</a>
    </div>
  </div>
  <div class="pull-right">
    <label for=""><?php echo $_SESSION['utype'];?></label>
    <a href="logout.php">Logout</a>
  </div>
</nav>
<div class="container bg-light mt-5">
    <div class="row">
    <?php
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <div class="col-md-12 mt-4">
            <div class="card">
            <div class="card-body h-50">
            
            <video width="100%" controls>
            <source src="video/output.mp4" type="video/mp4">
            </video>
            <div class="card-title"><?php echo $row['title'];?></div>
            <div class="card-title"><?php echo $row['description'];?></div>
            </div>
            </div>
        </div>
<?php }?>
    </div>
</div>
</body>
</html>