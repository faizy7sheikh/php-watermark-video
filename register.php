<?php
include("config.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 670px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Register form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                            <h3 class="text-center text-info">Register</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Name:</label><br>
                                <input type="text" name="name" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Number:</label><br>
                                <input type="number" name="number" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Confirm-Password:</label><br>
                                <input type="text" name="c_password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="password" class="text-info">Authentication:</label><br>
                            <select name="usertype" class="form-control" id="">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right mt-5">
                                <a href="login.php" class="text-info">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
$error = [];

if(isset($_POST["submit"])){
$name = $_POST["name"];
$email=$_POST["email"];
$pass = $_POST["password"];
$cpass=$_POST["c_password"];
$usertype = $_POST["usertype"];
$number = $_POST["number"];

    if($pass==$cpass){
    $sql = "INSERT INTO register(name,number,email,password,usertype) VALUES('$name','$number','$email','$pass','$usertype')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Register Success full";
    }
    }else{
        array_push($error,'password doesnot match');
    }
}
?>