<?php
session_start();
include('config.php');

$utype = $_SESSION['utype'];
if($utype=='user'){
  header("location:dashboard.php");
}else if($utype){

}else{
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code_Gama</title>
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
    <strong><?php echo $_SESSION['utype'];?></strong>
    <a href="logout.php">Logout</a>
  </div>
</nav>
<div class="container bg-light mt-5">
  <div id="login-row" class="row justify-content-center align-items-center">
      <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12 mt-4">
              <form id="login-form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                  <h3 class="text-center text-info">Upload Video</h3>
                  <div class="form-group">
                      <label for="username" class="text-info">Title:</label><br>
                      <input type="text" name="title" id="username" class="form-control"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                  </div>
                  <div class="form-group">
                      <label for="password" class="text-info">Description:</label><br>
                      <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                      <i class="fa fa-eye" aria-hidden="true"></i>
                  </div>
                  <div class="form-group">
                      <label for="password" class="text-info">Image:</label><br>
                      <input type="file" name="image" id="password" class="form-control">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                  </div>
                  <div class="form-group">
                      <label for="password" class="text-info">Video:</label><br>
                      <input type="file" name="video" id="password" class="form-control">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-info btn-md" value="Upload">
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
</body>
</html>
<?php
$allowimgExt = array("jpg","jpeg","gif");
$imgExtension = pathinfo($_FILES['image']['name']);

$allowvidExt = array("png","mp3","mp4");
$extension = pathinfo($_FILES['video']['name'],PATHINFO_EXTENSION);

$image = $_FILES["image"]["name"];
$img_type = $_FILES["image"]["type"];
$img_type = $_FILES["image"]["size"];
$temp_name = $_FILES["image"]["tmp_name"];


$video = $_FILES["video"]["name"];
$tmp_video = $_FILES["video"]["tmp_name"];
$bas=pathinfo($video,PATHINFO_FILENAME);


$command="ffmpeg -i " . $temp_name . " -s 128x128 image/$image";
  system($command);


$command="ffmpeg -i ".$tmp_video." -i image/$image -filter_complex \"overlay=20:20\" video/output.mp4";
 system($command);

if(isset($_POST["submit"])){
  $title = $_POST["title"];
  $description = $_POST["description"];
  $sql ="INSERT INTO videodata (title,description,image,video) VALUES('$title','$description','$image','$video')";
  $result = mysqli_query($con,$sql);
  if($result){
    echo "success to insert into database";
    
  }
}
?>